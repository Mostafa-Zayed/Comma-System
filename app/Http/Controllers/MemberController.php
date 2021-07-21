<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Interfaces\MemberInterface;

class MemberController extends Controller
{
    private $interface;
    private $modelName;

    public function __construct(MemberInterface $memberInterface)
    {
        $this->interface = $memberInterface;
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
    public function show(Member $member)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($request,$member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        return $this->interface->{__FUNCTION__.ucfirst($this->modelName)}($member);
    }

    private function getModuleName()
    {
        $data = explode('\\',__CLASS__);
        $controllerName = end($data);
        return substr($controllerName,0,strpos($controllerName,'Controller'));
    }
}
