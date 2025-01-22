<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employes_jobs')->insert([
            [
                'job_id' => 1,
                'job_title' => 'Software Engineer',
                'job_description' => 'Develop Software',
                'salary' => 10000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 2,
                'job_title' => 'Frontend Developer',
                'job_description' => 'Develop Application',
                'salary' => 8000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 3,
                'job_title' => 'Backend Developer',
                'job_description' => 'Develop Application',
                'salary' => 9000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 4,
                'job_title' => 'UI/UX Designer',
                'job_description' => 'Design Application',
                'salary' => 7000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 5,
                'job_title' => 'Project Manager',
                'job_description' => 'Manage Project',
                'salary' => 12000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 6,
                'job_title' => 'Sales Manager',
                'job_description' => 'Sale Product',
                'salary' => 11000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 7,
                'job_title' => 'Marketing Manager',
                'job_description' => 'Market Product',
                'salary' => 13000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 8,
                'job_title' => 'Finance Manager',
                'job_description' => 'Manage Finance',
                'salary' => 15000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 9,
                'job_title' => 'Operations Manager',
                'job_description' => 'Manage Operations',
                'salary' => 14000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'job_id' => 10,
                'job_title' => 'HR Manager',
                'job_description' => 'Manage Employees',
                'salary' => 13000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
