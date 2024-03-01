<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'full_name' => 'fatur',
            'company' => 'PT Intec Persada 1',
            'dapartement' => 'IT',
            'email' => 'fatur1@gmail.com',
            'phone' => '085718446992',
        ]);

    }
}
