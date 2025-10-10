<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'country',
        'city',
        'zip',
        'payment_method',
    ];
}