<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Nonaktifkan foreign key checks sementara supaya aman hapus data
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Product::query()->delete();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = ['KS Reguler', 'KS Cross', 'D91/92L', 'D26A H', 'D26A M', 'D26A L', 'D14N', 'D02A', 'D55L', 'D52 M', 'D52 H'];
        $cycle_time = [1.5, 1.5, 1.33, 1.09, 1.09, 1.09, 1.09, 1.09, 1.09, 1.09, 1.09];

        foreach ($products as $index => $product) {
            Product::create([
                'name' => $product,
                'cycle_time' => $cycle_time[$index]
            ]);
        }
    }
}
