<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
    'user_id',
    'order_number',
    'billing_name',
    'billing_email',
    'billing_phone',
    'billing_address',
    'billing_country',
    'billing_city',
    'billing_zip',
    'payment_method',
    'total_amount',
    'status',
];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
