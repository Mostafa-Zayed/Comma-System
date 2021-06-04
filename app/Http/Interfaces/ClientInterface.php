<?php

namespace App\Http\Interfaces;

interface ClientInterface
{
    public function indexClient();
    public function showClient($id);
    public function createClient();
    public function storeClient($request);
    public function editClient($id);
    public function updateClient($request,$id);
    public function destroyClient($id);
}
