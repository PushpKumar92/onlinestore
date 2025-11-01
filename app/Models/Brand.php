<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Brand extends Model
{
   

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

  

    // Auto-generate slug from name
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($brand) {
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
                
                // Make slug unique if it already exists
                $count = 1;
                $originalSlug = $brand->slug;
                while (static::where('slug', $brand->slug)->exists()) {
                    $brand->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
        
        static::updating(function ($brand) {
            if ($brand->isDirty('name') && empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
                
                // Make slug unique if it already exists
                $count = 1;
                $originalSlug = $brand->slug;
                while (static::where('slug', $brand->slug)->where('id', '!=', $brand->id)->exists()) {
                    $brand->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }

    // Relationship with products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Accessor for full image path
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/brands/' . $this->image) : asset('uploads/no-image.png');
    }
}