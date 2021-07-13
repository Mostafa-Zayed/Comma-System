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
        $rows = $this->model::select('id','name','status')->get();
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
        // TODO: Implement storeType() method.
    }

    public function editType($id)
    {
        // TODO: Implement editType() method.
    }

    public function updateType($request, $id)
    {
        // TODO: Implement updateType() method.
    }

    public function destroyType($id)
    {
        // TODO: Implement destroyType() method.
    }
}
