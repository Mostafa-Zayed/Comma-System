<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\EmployeeInterface;

use App\Http\Requests\Employess\Store;
use App\Http\Requests\Employess\Update;
use App\Http\Traits\HelperTrait;
use Illuminate\Http\Request;

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
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}();
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
    public function show($id)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($id);
    }

//     private function getModuleName()
//     {
//         $data = explode('\\',__CLASS__);
//         $controllerName = end($data);
//         return substr($controllerName,0,strpos($controllerName,'Controller'));
//     }
}
