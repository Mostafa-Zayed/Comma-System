<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\MainInterface;
use App\Models\Session;

class MainRepository implements MainInterface
{
    private $modelName = 'Main';
    public function indexMain()
    {
<<<<<<< HEAD
        $rows = Session::select('id', 'start', 'type_id', 'client_id', 'created_at')->where('end', null)->paginate(10);
=======
        $rows = Session::select('id', 'start', 'type_id', 'client_id', 'created_at')->where('end', null)->get();
>>>>>>> c62ae79d58813761918c3412791ebde5b5237b6e
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
