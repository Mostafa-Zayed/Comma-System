<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\MainInterface;

use Illuminate\Http\Request;

class MainController extends Controller
{
    private $interface;
    private $modelName;

    public function __construct(MainInterface $mainInterface)
    {
        $this->interface = $mainInterface;
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

     private function getModuleName()
     {
         $data = explode('\\',__CLASS__);
         $controllerName = end($data);
         return substr($controllerName,0,strpos($controllerName,'Controller'));
     }
}
