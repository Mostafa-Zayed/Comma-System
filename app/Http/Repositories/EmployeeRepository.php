<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use App\Http\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EmployeeRepository implements EmployeeInterface
{
    private $imagesType = ['jpeg,png,jpg,gif,svg'];
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
        if($request->hasFile('image')) {
            $imageName = $this->fileUpload($request,$this->viewName,'image');
            $this->model::create($request->except(['_token','create','image'])+['ssn' => str_shuffle(rand()),'image' => $imageName]);
            return redirect()->route($this->viewName.'.index');
        }
        $this->model::create($request->except(['_token','create'])+['ssn' => str_shuffle(rand())]);
        return redirect()->route($this->viewName.'.index');
    }

    public function editEmployee($employee)
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'row' => $employee
            ]);
    }

    public function updateEmployee($request, $employee)
    {
        $data = $request->except(['_token','_method','update','password']);
        // Check if request has Image and upload image
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request,$this->viewName,'image');
            $oldPath = public_path('uploads/'.$this->viewName.'/'.$employee->image);
            if (File::exists($oldPath)) {
                unlink($oldPath);
            }
        }
        // Chek if request has password and not null
        if($request->filled('password')) {
            $data['password'] = $request->whenFilled('password',function($input){
                return bcrypt($input);
            });
        }
        // Check if request has active field
//        if($request->filled('active')) {
//            $data['active'] = $request->whenFilled('active',function($input){
//                return "on";
//            });
//        }
        $data['active'] = $request->has('active') ? $request->active : 'off';

        $employee->update($data);
        return redirect()->route($this->viewName.'.edit',['employee' => $employee]);
    }

    public function destroyEmployee($employee)
    {
        $employee->delete();
        return redirect()->route($this->viewName.'.index');
    }

    private function fileUpload(&$resource,$folder,$key)
    {
        $imageName = rand().'.'.$resource->file($key)->getClientOriginalExtension();
        $resource->file($key)->move(public_path('uploads/'.$folder),$imageName);
        return $imageName;
    }
}
