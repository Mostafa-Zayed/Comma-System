<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RoomInterface;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomRepository implements RoomInterface
{
    private $imagesType = ['jpeg,png,jpg,gif,svg'];
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(Room $roomModel)
    {
        $this->model = $roomModel;
        $this->modelName = class_basename($roomModel);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }
    public function indexRoom()
    {
        $rows = $this->model::select('id','number','price','status')->get();
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]);
    }

    public function showRoom($id)
    {
        // TODO: Implement showRoom() method.
    }

    public function createRoom()
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName
            ]);
    }

    public function storeRoom($request)
    {
        $this->model::create($request->except(['_token']));

    }

    public function editRoom($id)
    {
        // TODO: Implement editRoom() method.
    }

    public function updateRoom($request, $id)
    {
        // TODO: Implement updateRoom() method.
    }

    public function destroyRoom($id)
    {
        // TODO: Implement destroyRoom() method.
    }
}
