<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'added_by_role',
        'name',
        'sku_code',
        'brand',
        'tags',
        'color',
        'sizes',
        'short_description',
        'description',
        'price',
        'tags',
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
 public function brand()
 {
     return $this->belongsTo(Brand::class); 
    }

    // Accessor for full image path
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/products/' . $this->image) : asset('uploads/no-image.png');
    }
    // Get all image URLs
    public function getImageUrlsAttribute()
    {
        if (!$this->images) {
            return [];
        }
        return array_map(function($img) {
            return asset('uploads/products/' . $img);
        }, $this->images);
    }
    
public function reviews()
{
    return $this->hasMany(Review::class);
}

public function approvedReviews()
{
    return $this->hasMany(Review::class)->where('is_approved', true);
}

public function averageRating()
{
    return $this->approvedReviews()->avg('rating') ?? 0;
}

public function totalReviews()
{
    return $this->approvedReviews()->count();
}
}