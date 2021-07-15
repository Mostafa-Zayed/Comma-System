<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TypeInterface;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeRepository implements TypeInterface
{
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(Type $typeModel)
    {
        $this->model = $typeModel;
        $this->modelName = class_basename($typeModel);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }
    public function indexType()
    {
        $rows = $this->model::select('id','name','price','status')->get();
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]);
    }

    public function showType($id)
    {
        if ($type = $this->model::find($id)) {
           return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
               [
                   'model' => $this->modelName,
                   'models' => $this->viewName,
                   'row' => $type
               ]);
        }
    }

    public function createType()
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName
            ]);
    }

    public function storeType($request)
    {
        $request->validate([
           'name' => 'required|string|min:3|max:50',
           'price' => 'required',
           'status' => 'required|string|in:on,off'
        ]);
        $this->model::create($request->only(['name','status']));
        return redirect()->route($this->viewName.'.index')->with('success','Type Created Succfully');
    }

    public function editType($type)
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'row' => $type
            ]);
    }

    public function updateType($request, $type)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'price' => 'required',
            'status' => 'required|string|in:on,off'
        ]);

        $type->update($request->except(['_token','_method','update']));
        return redirect()->route($this->viewName.'.edit',[strtolower($this->modelName) => ${strtolower($this->modelName)}])->with('success',$this->modelName.' '.ucfirst($type->name).' : Update Successfully');
    }

    public function destroyType($type)
    {
        return ($type->delete()) ? redirect()->route($this->viewName.'.index')->with('success',$this->modelName.' '.ucfirst($type->name).' : Deleted Successfully') : abort('404');
    }
}
