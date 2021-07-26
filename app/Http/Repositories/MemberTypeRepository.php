<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\MemberTypeInterface;
use App\Models\MemberType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberTypeRepository implements MemberTypeInterface
{
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(MemberType $memberTypeModel)
    {
        $this->model = $memberTypeModel;
        $this->modelName = class_basename($this->model);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }

    public function indexMemberType()
    {
        $rows = $this->model::select('id', 'name', 'status', 'price', 'days')->paginate(100);
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]
        );
    }

    public function showMemberType($id)
    {
        // TODO: Implement showMemberType() method.
    }

    public function createMemberType()
    {
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName
            ]
        );
    }

    public function storeMemberType($request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'price' => 'required',
            'days' => 'required|integer',
            'status' => 'required|string|in:on,off'
        ]);
        $data = $request->except(['_token', 'create']);
        $data['employee_id'] = Auth::user()->id;
        $this->model::create($data);
        return redirect()->route('member-types.index')->with('success', 'Type Created Successfully');
    }

    public function editMemberType($memberType)
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'row' => $memberType
            ]);
    }

    public function updateMemberType($request, $memberType)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'price' => 'required',
            'days' => 'required|integer',
            'status' => 'required|string|in:on,off'
        ]);
        return ($memberType->update($request->except(['_token','_method','edit']))) ? redirect()->route('member-types.edit',['member_type' => $memberType])->with('success',$this->modelName.' '.ucfirst($memberType->name).' : Update Successfully'): abort('404');
    }

    public function destroyMemberType($membetType)
    {
        return ($membetType->delete()) ? redirect()->route('member-types.index')->with('success', $this->modelName . ' ' . ucfirst($membetType->name) . ' : Deleted Successfully') : abort('404');
    }
}
