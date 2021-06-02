<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\TestingInterface;

class TestingController extends Controller
{
    private $interface;

    public function __construct(TestingInterface $testingInterface)
    {
      $this->interface = $testingInterface;
    }

    public function index()
    {
        return $this->interface->index();
    }
}
