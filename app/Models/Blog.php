<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
         'title',
    'content',
    'image',
    'status',
    'meta_title',
    'meta_description',
    'meta_tags',
    ];

    // Ensure timestamps (created_at, updated_at) are used
    public $timestamps = true;
}