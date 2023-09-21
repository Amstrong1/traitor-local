<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Traitor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'traitor';

    protected $guarded = [];

   
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
