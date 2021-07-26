<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['start', 'end', 'employee_id', 'type_id', 'quantity', 'client_id', 'employee_id'];


    // RelationShip With Employee
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }

    // RelationShip With Type
    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }

    // RelationShip With Client
    public function client()
    {
        return $this->belongsTo('\App\Models\Client', 'client_id', 'id');
    }

    protected $dates = ['created_at', 'updated_at','start','end'];
}
