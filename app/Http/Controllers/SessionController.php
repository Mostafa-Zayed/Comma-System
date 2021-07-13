<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Interfaces\SessionInterface;

class SessionController extends Controller
{
    private $interface;
    private $modelName;

    public function __construct(SessionInterface $interface)
    {
        $this->interface = $interface;
        $this->modelName = $this->getModuleName();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}($id);
    }

    // End Method 
    public function end(Request $request, $id)
    {
        return $this->interface->{__FUNCTION__ . ucfirst($this->modelName)}($request, $id);
    }
    private function getModuleName()
    {
        $data = explode('\\', __CLASS__);
        $controllerName = end($data);
        return substr($controllerName, 0, strpos($controllerName, 'Controller'));
    }
}
