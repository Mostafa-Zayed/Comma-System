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
        $rows = $this->model::select('id','name','email','phone','status')->paginate(10);
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
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName
            ]);
    }

    public function storeClient($request)
    {
        $this->model::create($request->except(['_token','create'])+['ssn' => str_shuffle(rand())]);
        return redirect()->route($this->viewName.'.index')->with('success','Client :<strong>'.$request->name.'</strong> Added Successfully');
    }

    public function editClient($client)
    {
        return view($this->viewName.'.'.substr(__FUNCTION__,0,strpos(__FUNCTION__,$this->modelName)),
            [
                'model' => $this->modelName,
                'models' => $this->viewName,
                'row' => $client
            ]);
    }

    public function updateClient($request, $client)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:70',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'nullable|max:25',
            'job' => 'nullable|max:255',
        ]);

        $data = $request->except(['_token','_method','update']);
        if (! $request->filled('status')) {
            $data['status'] = 'off';
        }

        $client->update($data);
        return redirect()->route($this->viewName.'.edit',[strtolower($this->modelName) => ${strtolower($this->modelName)}]);
    }

    public function destroyClient($client)
    {
        return ($client->delete()) ? redirect()->route($this->viewName.'.index')->with('success',$this->modelName.' '.ucfirst($client->name).' : Deleted Successfully') : abort('404');
    }
}
