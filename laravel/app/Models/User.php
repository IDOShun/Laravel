<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'CRUD', 'role_id'
    ];

    public function role()
    {
        return $this->hasOne('app/Models/Role');
    }
}
