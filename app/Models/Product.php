<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
    ];
    public function category()
{
    return $this->belongsTo(\App\Models\Category::class);
}
}