<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SessionInterface;
use App\Models\Client;
use App\Models\Session;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SessionRepository implements SessionInterface
{
    private $model;
    private $modelName;
    private $viewName;
    public function __construct(Session $model)
    {
        $this->model = $model;
        $this->modelName = class_basename($model);
        $this->viewName = strtolower(Str::plural($this->modelName));
    }
    public function indexSession()
    {
        $rows = $this->model::with(['type' => function ($query) {
            $query->select('name', 'id');
        }])->select('id', 'start', 'end', 'created_at', 'type_id')->get();
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'rows' => $rows
            ]
        );
    }

    public function showSession($id)
    {
        // TODO: Implement showSession() method.
    }

    public function createSession()
    {
        $types = Type::select('id', 'name')->get();
        $clients = Client::select('id', 'ssn', 'name')->where('status', 'on')->get();
        return view(
            $this->viewName . '.' . substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'types' => $types,
                'clients' => $clients
            ]
        );
    }

    public function storeSession($request)
    {
        if ($request->client_id[0] === $request->client_id[1]) {
            $this->model::create($request->ecept(['__token']));
            return redirect()->route('index');
        } else {
            dd('error');
        }
        // if ($request->client_id[0])
        // $this->model::create([])
    }

    public function editSession($id)
    {
        // TODO: Implement editSession() method.
    }

    public function updateSession($request, $id)
    {
        // TODO: Implement updateSession() method.
    }

    public function destroySession($id)
    {
        // TODO: Implement destroySession() method.
    }
}
