<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add any other fillable attributes here
        'description',
        'price',
        'quantity'
        // Add other attributes as needed
    ];
}
