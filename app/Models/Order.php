<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'queue_code', 'receipt_code', 'payment_method', 'payment_status',
        'total', 'expires_at', 'confirmed_at', 'payment_proof'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
