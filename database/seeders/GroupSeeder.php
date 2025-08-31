<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Mengosongkan tabel dengan aman
        // DB::table('groups')->truncate();

        // Mengaktifkan kembali foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $groups = ['1', '2', '3'];

        foreach ($groups as $group) {
            Group::create(['group' => $group]);
        }

    }
}
