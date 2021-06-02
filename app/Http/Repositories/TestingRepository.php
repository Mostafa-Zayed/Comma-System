<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TestingInterface;

class TestingRepository implements TestingInterface
{
    public function index()
    {
        return 'testing';
    }
}
