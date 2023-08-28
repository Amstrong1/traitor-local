<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $append = [
        'user_name',
        'product_name',
        'formatted_delivery_date',
        'formatted_delivery_hour',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    public function getProductNameAttribute()
    {
        return $this->product->name;
    }    
    
    public function getFormattedDeleveryDateAttribute()
    {
        return getFormattedDate($this->delivery_date);
    }   
    
    public function getFormattedDeleveryHourAttribute()
    {
        return getFormattedTime($this->delivery_hour);
    }
}
