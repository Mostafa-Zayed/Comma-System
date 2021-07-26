<?php

namespace App\Http\Interfaces;

interface TypeInterface
{
    public function indexType();
    public function showType($id);
    public function createType();
    public function storeType($request);
    public function editType($id);
    public function updateType($request,$id);
    public function destroyType($id);
}
