<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\MemberInterface;
use App\Models\Client;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\Type;
use Illuminate\Support\Str;

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
        $rows = $this->model::with(['type' => function($query){
            $query->select('id','name')->get();
        },'client' => function ($query) {
            $query->select('id','name')->get();
        }])->select('id','start','status','type_id','client_id','end','hours')->paginate(100);

        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]);
    }

    public function showMember($id)
    {
        // TODO: Implement showTesting() method.
    }

    public function createMember()
    {
        $types = Type::select('id','name')->where('status','on')->get()->toArray();
        $clients = Client::select('id','name')->get()->toArray();
        $memberTypes = MemberType::select('id','name')->where('status','on')->get()->toArray();
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
        dd($request->all());
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
}
