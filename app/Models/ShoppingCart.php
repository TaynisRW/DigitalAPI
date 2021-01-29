<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    // Protect our table products and we avoid SQL injection
    protected $table = 'shopping_carts';
    // Fields on the table shopping_carts fillable
    protected $fillable = [
        'id_shopping_cart',
        'product_id',
        'customer_id',
        'payment_method_id',
        'shopping_cart_payment',
        'shopping_cart_description'
    ];
    // Hidden fields on API
    protected $hidden = ['created_at','updated_at'];
}
