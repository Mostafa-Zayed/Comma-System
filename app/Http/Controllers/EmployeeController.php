<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\EmployeeInterface;

use App\Http\Requests\Employess\Store;
use App\Http\Requests\Employess\Update;
use App\Http\Traits\HelperTrait;
use App\Models\Employee;

class EmployeeController extends Controller
{
    use HelperTrait;
    private $interface;
    private $modelName;

    public function __construct(EmployeeInterface $employeeInterface)
    {
        $this->interface = $employeeInterface;
        $this->modelName = $this->getModuleName();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->interface->{__FUNCTION__.$this->modelName}();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        dd($employee);
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee  $employee)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Employee $employee)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request,$employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($employee);
    }

     private function getModuleName()
     {
         $data = explode('\\',__CLASS__);
         $controllerName = end($data);
         return substr($controllerName,0,strpos($controllerName,'Controller'));
     }
}
