<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['start','end','employee_id','type_id','quantity'];


    // RelationShip With Employee
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id','id');
    }

    // RelationShip With Type
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id','id');
    }
}
