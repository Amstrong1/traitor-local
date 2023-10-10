<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $append = ['product_city', 'formatted_nature'];

    public function traitor(): BelongsTo
    {
        return $this->belongsTo(Traitor::class);
    }  

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class);
    }   

    public function getProductCityAttribute()
    {
        return $this->traitor->city;
    }

    public function getFormattedNatureAttribute()
    {
        return $this->nature->name;
    }
}
