<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'original_price',
        'image_path',
        'description',
        'specs',
        'features',
        'rating',
        'shopee_link',
        'tokopedia_link',
        'is_featured'
    ];

    protected $casts = [
        'specs' => 'array',
        'features' => 'array',
        'is_featured' => 'boolean',
        'price' => 'integer',
        'original_price' => 'integer'
    ];
}
