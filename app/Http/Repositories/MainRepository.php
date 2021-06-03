<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\MainInterface;

class MainRepository implements MainInterface
{

    public function indexMain()
    {
        return view('welcome');
    }
}
