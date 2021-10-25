<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'opening_qty',
        'available_qty',
        'type',
        'unit',
        'images',
        'colors',
        'description',
        'brand',
        'product_category_id',
        'product_subcategory_id',
        'created_by',
    ];
}
