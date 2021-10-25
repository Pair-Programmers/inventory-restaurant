<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'ammount',
        'no_of_items',
        'no_of_products',
        'date',
        'discount',
        'reference_no',
        'description',
        'type',
        'customer_id',
        'vendor_id',
        'created_by',
    ];
}
