<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    // Tests data fields for products table
    public function run()
    {
        // Insert test data
        DB::table('products')->insert([
            [
                'product_name' => 'Refresco',
                'id_category' => 1,
                'product_image' => null,
                'product_price' => 12.50,
                'product_discount' => 5,
                'product_stock' => 100,
                'product_description' => 'Refresco sabor cereza'
            ],
            [
                'product_name' => 'Pelota',
                'id_category' => 2,
                'product_image' => null,
                'product_price' => 62.00,
                'product_discount' => 0,
                'product_stock' => 25,
                'product_description' => 'Pelota de rayas'
            ]
        ]);
    }
}
