<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\MainInterface;
use App\Models\Session;

class MainRepository implements MainInterface
{
    private $modelName = 'Main';
    public function indexMain()
    {
        $rows = Session::select('id', 'start', 'type_id', 'client_id', 'created_at')->where('end', null)->paginate(10);
        return view(
            substr(__FUNCTION__, 0, strpos(__FUNCTION__, $this->modelName)),
            [
                'models' => 'Dashboard',
                'rows' => $rows
            ]
        );
    }

    public function showSessions()
    {
        // TODO: Implement showSessions() method.
    }
}
