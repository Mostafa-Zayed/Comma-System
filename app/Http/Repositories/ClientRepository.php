<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ClientInterface;
use App\Models\Client;
use Illuminate\Support\Str;

class ClientRepository implements ClientInterface
{
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(Client $clientModel)
    {
        $this->model = $clientModel;
        $this->modelName = class_basename($this->model);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }

    public function indexClient()
    {
        $rows = $this->model::select('id','name','email','status','ssn')->get();
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]);
    }

    public function showClient($id)
    {
        // TODO: Implement showClient() method.
    }

    public function createClient()
    {
        // TODO: Implement createClient() method.
    }

    public function storeClient($request)
    {
        // TODO: Implement storeClient() method.
    }

    public function editClient($id)
    {
        // TODO: Implement editClient() method.
    }

    public function updateClient($request, $id)
    {
        // TODO: Implement updateClient() method.
    }

    public function destroyClient($id)
    {
        // TODO: Implement destroyClient() method.
    }
}
