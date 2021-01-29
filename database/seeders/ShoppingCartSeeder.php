<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingCartSeeder extends Seeder
{
    // Tests data fields for shopping_carts table
    public function run()
    {
        // Insert test data
        DB::table('products')->insert([
            [
                'product_id' => 1,
                'customer_id' => 1,
                'payment_method_id' => 2,
                'shopping_cart_payment' => 98.10,
                'shopping_cart_description' => 'La compra será en el cuarto 26 del Hotel'
            ],
            [
                'product_id' => 3,
                'customer_id' => 1,
                'payment_method_id' => 1,
                'shopping_cart_payment' => 66.90,
                'shopping_cart_description' => 'Quiero la pelota color azul'
            ]
        ]);
    }
}
