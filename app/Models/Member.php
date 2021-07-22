<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['start','end','time_out','time_in','price','client_id','employee_id','member_type_id','status','hours'];

    protected $dates = ['start','end'];

    // RelationShips Mapping

    // Type RelationShip
    public function type()
    {
        return $this->belongsTo('\App\Models\Type','type_id','id');
    }

    // RelationShip With Client
    public function client()
    {
        return $this->belongsTo('\App\Models\Client','client_id','id');
    }
}
