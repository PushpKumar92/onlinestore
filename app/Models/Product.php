<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

 
   protected $fillable = [
    'name',
    'description',
    'price',
    'discount',
    'quantity',
    'image',
    'category_id',
    'is_approved',
    'added_by',
    'added_by_role',
];
public function vendor()
{
    return $this->belongsTo(Vendor::class, 'added_by');
}

public function admin()
{
    return $this->belongsTo(Admin::class, 'added_by');
}
}

