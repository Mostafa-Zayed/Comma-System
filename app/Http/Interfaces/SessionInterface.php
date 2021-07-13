<?php

namespace App\Http\Interfaces;

interface SessionInterface
{
    public function indexSession();
    public function showSession($id);
    public function createSession();
    public function storeSession($request);
    public function editSession($id);
    public function updateSession($request, $id);
    public function destroySession($id);
    public function endSession($request, $id);
}
