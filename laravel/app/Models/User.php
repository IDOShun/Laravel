<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'CRUD', 'role_id'
    ];

    // use HasFactory;
    public function role()
    {
        return $this->hasOne('app/Models/Role');
    }
}
