<?php

namespace App\Http\Interfaces;

interface EmployeeInterface
{
    public function indexEmployee();
    public function showEmployee($id);
    public function createEmployee();
    public function storeEmployee($request);
    public function editEmployee($id);
    public function updateEmployee($request,$id);
    public function destroyEmployee($id);
}
