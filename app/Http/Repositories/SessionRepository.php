<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SessionInterface;
use App\Models\Client;
use App\Models\Session;
use Illuminate\Support\Facades\Session as laravelSession;
use App\Models\Type;
use Illuminate\Support\Str;
use Carbon\Carbon;


class SessionRepository implements SessionInterface
{
    private $model;
    private $modelName;
    private $viewName;
    private $data = [];
    private $price = 0;
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
        },'client' => function($q) {
            $q->select('name','id');
        }])->select('id', 'start', 'end', 'created_at', 'type_id','client_id','product','total')->paginate(10);
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
        $this->data = $request->except(['_token','create']);
        $this->price = (Type::select('price')->where('id',$request->type_id)->get()->toArray())[0]['price'];
        if ($request->has('client_id')) {
            $this->data['client_id'] = $this->validClient($request->client_id);
            $this->data['employee_id'] = 1;
            $this->data['start'] = $request->input('day')." ".$request->hour;
            unset($this->data['day'],$this->data['hour'],$this->data['name']);
            $session = $this->model::create($this->data);
            \Illuminate\Support\Facades\Session::put('client_'.$session->id,$this->price);
            return redirect()->route('index');
        } elseif ($request->filled('name')) {
            $this->data['start'] = $request->input('day')." ".$request->hour;
            unset($this->data['day'],$this->data['hour']);
            $client = Client::create(['name' => $request->name, 'ssn' => str_shuffle(rand())]);
            $this->data['client_id'] = $client->id;
            $this->data['employee_id'] = 1;
            $session = $this->model::create($this->data);
            \Illuminate\Support\Facades\Session::put('client_'.$session->id,$this->price);
            return redirect()->route('index');
        }
        return abort('404');
    }

    public function editSession($session)
    {
        $types = Type::select('id','name')->get();
        $session = $session::with(['type' => function($query) {
            $query->select('id','name','price')->get();
        }])->find($session->id);
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'row' => $session,
                'types' => $types
            ]);
    }

    public function updateSession($request, $id)
    {
        // TODO: Implement updateSession() method.
    }

    public function destroySession($session)
    {
        return ($session->delete()) ? redirect()->route($this->viewName.'.index')->with('success',$this->modelName.' '.ucfirst($session->name).' : Deleted Successfully') : abort('404');
    }

    public function endSession($request, $session)
    {
        if ($session) {
            $this->price = laravelSession::has('client_'.$session->id) ? laravelSession::get('client_'.$session->id) : $this->getTypePrice($session->type->id);
            $request->session()->forget('client_'.$session->id);
            $hours = $this->calculateHours($session,15);
            $total = (float) ((int) ($hours) *  $this->getPrice() + (float) $request->input('product'));
            $session->product = $request->input('product');
            $session->quantity = $hours;
            $session->end = date('Y-m-d H:i:s');
            $session->status = 'finished';
            $session->total = $total;
            $session->save();
            session()->flash('cart',[
                'client' => $session->client->name,
                'hours' => $hours,
                'products' => $session->product,
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

    private function getPrice()
    {
        return ! empty($this->price) ? (int) $this->price : 0;
    }

    private function getTypePrice(int $id)
    {
        return Type::select('price')->where('id','=',$id)->first()['price'];
    }
}
