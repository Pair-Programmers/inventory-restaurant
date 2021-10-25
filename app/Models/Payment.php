<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'group',
        'type',
        'note',
        'customer_id',
        'vendor_id',
        'account_id',
        'created_by',
    ];
}
