<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            [
                'id' => 1,
                'division_name' => 'IT',
                'created_at' => now(),
                'updated_at' => now()
            ], 
            [
                'id' => 2,
                'division_name' => 'HR',
                'created_at' => now(),
                'updated_at' => now()
            ], 
            [
                'id' => 3,
                'division_name' => 'Sales',
                'created_at' => now(),
                'updated_at' => now()
            ], 
            [
                'id' => 4,
                'division_name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now()
            ], 
            [
                'id' => 5,
                'division_name' => 'Finance',
                'created_at' => now(),
                'updated_at' => now()
            ], 
            [
                'id' => 6,
                'division_name' => 'Operations',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
