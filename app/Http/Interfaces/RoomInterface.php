<?php

namespace App\Http\Interfaces;

interface RoomInterface
{
    public function indexRoom();
    public function showRoom($id);
    public function createRoom();
    public function storeRoom($request);
    public function editRoom($id);
    public function updateRoom($request,$id);
    public function destroyRoom($id);
}
