<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employes')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'male',
                "email" => "jhon@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 1,
                "job_id" => 1,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'female',
                "email" => "jane@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 1,
                "job_id" => 2,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Joe',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'male',
                "email" => "joe@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 1,
                "job_id" => 3,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Mary',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'female',
                "email" => "mary@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 1,
                "job_id" => 4,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'male',
                "email" => "bob@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 1,
                "job_id" => 5,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'female',
                "email" => "alice@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 3,
                "job_id" => 6,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Tom',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'male',
                "email" => "tom@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 4,
                "job_id" => 7,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Sara',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'female',
                "email" => "sara@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 5,
                "job_id" => 8,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'male',
                "email" => "mike@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => null,
                "division_id" => 6,
                "job_id" => 9,
                'created_at' => now(),
                'updated_at' => now()                
            ],
            [
                'first_name' => 'Lily',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'female',
                "email" => "lily@example.com",
                "address" => "123 Main St",
                "hire_date" => "2022-01-01",
                "termination_date" => '2023-01-01',
                "division_id" => 2,
                "job_id" => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
