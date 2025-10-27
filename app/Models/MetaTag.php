<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'meta_title',
        'meta_tags',
        'meta_description',
        'meta_keywords',
    ];
}
