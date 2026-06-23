<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'store_id', 'driver_id', 'customer_name', 'customer_phone', 
        'status', 'total_amount', 'delivery_fee', 
        'pickup_latitude', 'pickup_longitude', 'delivery_latitude', 'delivery_longitude'
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(User::class, 'store_id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}