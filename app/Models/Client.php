<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected  $fillable = ['name','ssn','email','status','job','employee_id','phone'];

    public function session(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('\App\Models\Session','client_id','id');
    }

    // RelationShip with Member
    public function members()
    {
        return $this->hasMany('\App\Models\Client','client_id','id');
    }
}
