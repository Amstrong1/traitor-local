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
        'formatted_status',
        'formatted_paid'
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

    public function getFormattedDeliveryDateAttribute()
    {
        return getFormattedDate($this->delivery_date);
    }

    public function getFormattedStatusAttribute()
    {
        if ($this->status === 'allowed') {
            $status = 'Confirmée';
        } elseif ($this->status === 'pending') {
            $status = 'En attente';
        } else {
            $status = 'Refusée';
        }

        return $status;
    }

    public function getFormattedPaidAttribute()
    {
        if ($this->paid === 0) {
            $paidStatus = 'Non';
        } else {
            $paidStatus = 'Oui';
        }

        return $paidStatus;
    }
}
