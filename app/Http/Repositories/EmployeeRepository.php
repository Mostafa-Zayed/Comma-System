<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use App\Http\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeRepository implements EmployeeInterface
{
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(Employee $employeeModel)
    {
        $this->model = $employeeModel;
        $this->modelName = class_basename($employeeModel);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }

    public function indexEmployee()
    {
        $rows = $this->model::select('id',DB::raw("CONCAT(firstname,' ',lastname) as fullname"),'email','type','active')->get();
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
        [
            'model' => $this->modelName,
            'models' => $this->viewName,
            'rows' => $rows
        ]);
    }

    public function showEmployee($id)
    {
        // TODO: Implement showEmployee() method.
    }

    public function createEmployee()
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
        [
            'model' => $this->modelName,
            'models' => $this->viewName
        ]);
    }

    public function storeEmployee($request)
    {
        $this->model::create($request->except(['_token','create'])+['ssn' => str_shuffle(rand())]);
        return redirect()->route($this->viewName.'.index');
    }

    public function editEmployee($id)
    {

    }

    public function updateEmployee($request, $id)
    {
        // TODO: Implement updateEmployee() method.
    }

    public function destroyEmployee($id)
    {
        // TODO: Implement destroyEmployee() method.
    }

}
