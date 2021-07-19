<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\TypeInterface;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    private $interface;
    private $modelName;

    public function __construct(TypeInterface $typeInterface)
    {
        $this->interface = $typeInterface;
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
    public function store(Request $request)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request,$type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($type);
    }

    private function getModuleName()
    {
        $data = explode('\\',__CLASS__);
        $controllerName = end($data);
        return substr($controllerName,0,strpos($controllerName,'Controller'));
    }
}
