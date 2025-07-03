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
        'discount',    // ✅ include discount if you're using it
        'quantity',
        'image',
        'category_id', // ✅ required for category relationship
    ];

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}