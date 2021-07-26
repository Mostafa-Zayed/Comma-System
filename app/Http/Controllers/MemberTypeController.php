<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\MemberTypeInterface;

use App\Models\MemberType;
use Illuminate\Http\Request;

class MemberTypeController extends Controller
{
    private $interface;
    private $modelName;

    public function __construct(MemberTypeInterface $memberTypeInterface)
    {
        $this->interface = $memberTypeInterface;
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
     * @param  MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function show(MemberType $memberType)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($memberType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberType $memberType)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($memberType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberType $memberType)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request,$memberType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MemberType $memberType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberType $memberType)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($memberType);
    }

    private function getModuleName()
    {
        $data = explode('\\',__CLASS__);
        $controllerName = end($data);
        return substr($controllerName,0,strpos($controllerName,'Controller'));
    }
}
