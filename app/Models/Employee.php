<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'type', 'active', 'ssn', 'image'];

    // RelationShip Session
    public function sessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Session', 'employee_id', 'id');
    }
}
