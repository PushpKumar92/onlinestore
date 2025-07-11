<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'discount',
        'quantity',
        'status',
        'image',
        'added_by_type',
        'added_by_id',
    ];
public function category() {
        return $this->belongsTo(Category::class);
    }

    // Admin or Vendor relationship (polymorphic)
    public function addedBy()
    {
        return $this->morphTo(null, 'added_by_type', 'added_by_id');
    }
}