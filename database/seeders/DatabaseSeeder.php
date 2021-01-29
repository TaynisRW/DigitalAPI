<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Execute Seeders
    public function run()
    {
        $this->call(ProductsSeeder::class);
    }
}
