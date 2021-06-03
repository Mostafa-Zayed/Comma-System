<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use App\Http\Interfaces\EmployeeInterface;

class EmployeeRepository implements EmployeeInterface
{
    private $model;

    public function __construct(Employee $employeeModel)
    {
        $this->model = $employeeModel;
    }

    public function indexEmployee()
    {
        return view('employees.index');
    }

    public function showEmployee($id)
    {
        // TODO: Implement showEmployee() method.
    }

    public function createEmployee()
    {
        return view('employees.create');
    }

    public function storeEmployee($request)
    {
        // TODO: Implement storeEmployee() method.
    }

    public function editEmployee($id)
    {
        // TODO: Implement editEmployee() method.
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
