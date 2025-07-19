<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Product::truncate();

        $products = ['KS Reguler', 'KS Cross', 'D91/92L', 'D26A H', 'D26A M', 'D26A L', 'D14N', 'D02A', 'D55L'];

        foreach ($products as $product) {
            Product::create(['name' => $product]);
        }
    }
}
