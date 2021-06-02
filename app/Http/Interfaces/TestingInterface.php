<?php

namespace App\Http\Interfaces;

interface TestingInterface
{
    public function indexTesting();
    public function showTesting($id);
    public function createTesting();
    public function storeTesting($request);
    public function editTesting($id);
    public function updateTesting($request,$id);
    public function destroyTesting($id);
}
