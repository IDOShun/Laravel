<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{

    public function user(): BelongsTo
    {
        // return $this->belongsTo(User::class, 'foreign_key', 'other_key');
        // return $this->belongsTo('App\Models\User');
    }
}
