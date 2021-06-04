<?php

namespace App\Http\Traits;

Trait HelperTrait{

    private function getModuleName()
    {
        $data = explode('\\',__CLASS__);
        $controllerName = end($data);
        return substr($controllerName,0,strpos($controllerName,'Controller'));
    }
}
