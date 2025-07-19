<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Mengosongkan tabel dengan aman
        DB::table('shifts')->truncate();

        // Mengaktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $shifts = ['1', '2', '3'];

        foreach($shifts as $shift) {
            Shift::create(['shift' => $shift]);
        }

    }
}
