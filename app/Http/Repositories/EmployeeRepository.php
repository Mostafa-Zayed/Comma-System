<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use App\Http\Interfaces\EmployeeInterface;
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
        $rows = $this->model::select('id', 'name', 'email', 'type', 'active')->paginate(3);
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]
        );
    }

    public function showEmployee($id)
    {
    }

    public function createEmployee()
    {
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName
            ]
        );
    }

    public function storeEmployee($request)
    {
        if ($request->hasFile('image')) {
            $imageName = $this->fileUpload($request, $this->viewName, 'image');
            $this->model::create($request->except(['_token', 'create', 'image']) + ['ssn' => str_shuffle(rand()), 'image' => $imageName]);
            return redirect()->route($this->viewName . '.index');
        }
        $this->model::create($request->except(['_token', 'create']) + ['ssn' => str_shuffle(rand())]);
        return redirect()->route($this->viewName . '.index')->with('success', 'Account For Employee <strong>' . ucfirst($request->name) . '</strong> Created Succfuley');
    }

    public function editEmployee($employee)
    {
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'row' => $employee
            ]
        );
    }

    public function updateEmployee($request, $employee)
    {

        $data = $request->except(['_token', '_method', 'update', 'password']);

        // Check if request has Image and upload image
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request, $this->viewName, 'image');
            $path = 'uploads/' . $this->viewName . '/' . $employee->image;
            if ($employee->image && File::exists($path)) {
                unlink($path);
            }
        }

        // Chek if request has password and not null
        if ($request->filled('password')) {
            $data['password'] = $request->whenFilled('password', function ($input) {
                return bcrypt($input);
            })->with('success', 'Account For Employee <strong>' . ucfirst($employee->name) . '</strong> Upadated Succfuley');
        }

        $data['active'] = $request->has('active') ? $request->active : 'off';

        $employee->update($data);
        return redirect()->route($this->viewName . '.edit', ['employee' => $employee]);
    }

    public function destroyEmployee($employee)
    {
        return ($employee->delete()) ? redirect()->route($this->viewName . '.index')->with('success', $this->modelName . ' ' . ucfirst($employee->name) . ' : Deleted Successfully') : abort('404');
    }



    private function fileUpload(&$resource, $folder, $key)
    {
        $imageName = rand() . '.' . $resource->file($key)->getClientOriginalExtension();
        $resource->file($key)->move(public_path('uploads/' . $folder . '/'), $imageName);
        return $imageName;
    }
}
