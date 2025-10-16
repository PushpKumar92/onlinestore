<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'added_by_role',
        'name',
        'sku_code',
        'brand',
        'color',
        'sizes',
        'description',
        'price',
        'discount',
        'quantity',
        'image',
        'is_approved',
        'status',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   public function admin()
{
    return $this->belongsTo(Admin::class, 'added_by');
}

    // Accessor for full image path
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/products/' . $this->image) : asset('uploads/no-image.png');
    }
}






