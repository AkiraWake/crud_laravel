<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    protected $fillable = [
        'perfil_nome'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}