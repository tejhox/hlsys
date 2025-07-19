<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lines = ['ER 01', 'ER 02', 'ER 03', 'ER 150'];

        foreach ($lines as $line) {
            Line::create(['name' => $line]);
        }
    }
}
