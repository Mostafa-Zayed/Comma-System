<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\MemberInterface;
use App\Models\Client;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MemberRepository implements MemberInterface
{
    private $model;
    private $modelName;
    private $viewName;

    public function __construct(Member $memberModel)
    {
        $this->model = $memberModel;
        $this->modelName = class_basename($this->model);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }

    public function indexMember()
    {
        $rows = $this->model::with(['type' => function ($query) {
            $query->select('id', 'name')->get();
        }, 'client' => function ($query) {
            $query->select('id', 'name')->get();
        }])->select('id', 'start', 'status', 'type_id', 'client_id', 'end', 'hours','time_in','time_out')->get();
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]
        );
    }

    public function showMember($id)
    {
        // TODO: Implement showTesting() method.
    }

    public function createMember()
    {
        $types = Type::select('id', 'name')->where('status', 'on')->get()->toArray();
        $clients = Client::select('id', 'name')->get()->toArray();
        $memberTypes = MemberType::select('id', 'name', 'days')->where('status', 'on')->get()->toArray();
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'clients' => $clients,
                'types' => $types,
                'memberTypes' => $memberTypes,
                'model' => $this->modelName,
                'models' => $this->viewName
            ]
        );
    }

    public function storeMember($request)
    {
        $data = $request->except(['_token', 'create']);
        $request->validate([
            'type_id' => 'required',
            'member_type_id' => 'required',
            'client_id' => 'required',
            'start_day' => 'required',
            'start_hour' => 'required',
            'end_day' => 'required',
            'end_hour' => 'required',
            'hours' => 'required',
            'price' => 'nullable',
        ]);
        $data['start'] = $request->start_day . " " . $request->start_hour;
        $data['end'] = $request->end_day . " " . $request->end_hour;
        $data['time_in'] = $request->hours;
        $data['employee_id'] = Auth::user()->id;
        $data['client_id'] = $this->validClient($request->client_id);
        unset($data['start_day'], $data['start_hour'], $data['end_day'], $data['end_hour']);
        $this->model::create($data);
        return redirect()->route($this->viewName.'.index');
    }

    public function editMember($id)
    {
        // TODO: Implement editTesting() method.
    }

    public function updateMember($request, $id)
    {
        // TODO: Implement updateTesting() method.
    }

    public function destroyMember($id)
    {
        // TODO: Implement destroyTesting() method.
    }

    private function validClient(array $client_id)
    {
        return (count($client_id) > 1) ? ($client_id[0] == $client_id[1] ? $client_id[0] : false) : $client_id[0];
    }
}
