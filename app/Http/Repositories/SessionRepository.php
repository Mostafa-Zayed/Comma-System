<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SessionInterface;
use App\Models\Client;
use App\Models\Session;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SessionRepository implements SessionInterface
{
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(Session $model)
    {
        $this->model = $model;
        $this->modelName = class_basename($model);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }
    public function indexSession()
    {
        $rows = $this->model::with(['type' => function ($query) {
            $query->select('name', 'id');
        }])->select('id', 'start', 'end', 'created_at', 'type_id')->get();
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]
        );
    }

    public function showSession($id)
    {
        // TODO: Implement showSession() method.
    }

    public function createSession()
    {
        $types = Type::select('id', 'name')->get();
        $clients = Client::select('id', 'ssn', 'name')->where('status', 'on')->get();
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'types' => $types,
                'clients' => $clients
            ]
        );
    }

    public function storeSession($request)
    {
        $data = $request->except(['_token']);

        if ($request->has('client_id')) {
            $data['client_id'] = $this->validClient($request->client_id);
            $data['employee_id'] = 1;
            $data['start'] = $request->input('day')." ".$request->hour;
            $this->model::create($data);
            return redirect()->route('index');
        } elseif ($request->filled('name')) {
            $client = Client::create(['name' => $request->name, 'ssn' => str_shuffle(rand())]);
            $data['start'] = $request->input('day')." ".$request->hour;
            $data['client_id'] = $client->id;
            $data['employee_id'] = 1;
            $this->model::create($data);
            return redirect()->route('index');
        }
        return abort('404');
    }

    public function editSession($id)
    {
        // TODO: Implement editSession() method.
    }

    public function updateSession($request, $id)
    {
        // TODO: Implement updateSession() method.
    }

    public function destroySession($id)
    {
        // TODO: Implement destroySession() method.
    }

    public function endSession($request, $id)
    {
        if ($row = Session::find($id)) {
            $hours = $this->calculateHours($row,15);
            $total =(float) ((int) ($hours) * 10) + (int) $request->input('product');
            $row->product = $request->input('product');
            $row->quantity = $hours;
            $row->end = date('Y-m-d H:i:s');
            $row->status = 'finished';
            $row->total = $total;
            $row->save();
            session()->flash('cart',[
                'client' => $row->client->name,
                'hours' => $hours,
                'products' => $row->product,
                'total' => $total
            ]);
            return redirect()->route('index');
        }
        return abort('404');
    }
    private function validClient(array $client_id)
    {
        return (count($client_id) > 1) ? ($client_id[0] == $client_id[1] ? $client_id[0] : false) : $client_id[0];
    }

    private function calculateHours(Session $item, int $limit)
    {
        $hours = 0;
        $startTime = Carbon::parse($item->start);
        $endTime   = Carbon::parse(date('Y-m-d H:i:s'));
        $minutes = $endTime->diffInMinutes($startTime);
        if ($minutes > $limit) {
            $hours = $endTime->diffInHours($startTime);
            $minutes = $minutes % 60 ;
            if ($minutes > 15) {
                $hours++;
            }
        } else {
            return "0 : ".$endTime->diffInMinutes($startTime)." : M";
        }
        return $hours ." : H";
    }

    private function changeAmToPm(string $time)
    {
        $times = explode(':',$time);
        return ((int) $times[0] + 12).":".$times[1].":".$times[2];
    }
}
