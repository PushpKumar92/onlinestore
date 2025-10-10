<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_image',
        'price',
        'quantity',
    ];
    public function product()
{
    return $this->belongsTo(Product::class);
}
}