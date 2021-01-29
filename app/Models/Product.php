<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Protect our table products and we avoid SQL injection
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'id_category',
        'product_image',
        'product_price',
        'product_discount',
        'product_stock',
        'product_description'
    ];
    // Hidden fields on API
    protected $hidden = ['created_at','updated_at'];
}
