<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $append = ['product_city'];

    public function traitor(): BelongsTo
    {
        return $this->belongsTo(Traitor::class);
    }   

    public function getProductCityAttribute()
    {
        return $this->traitor->city;
    }
}
