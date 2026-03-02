<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'profile_id'
    ];

    protected $hidden = ['senha'];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}