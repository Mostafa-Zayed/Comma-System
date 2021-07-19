<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name','status','price'];


    // RelationShip with Session
    public function sessions()
    {
        return $this->hasMany('App\Models\Session','type_id','id');
    }
}
