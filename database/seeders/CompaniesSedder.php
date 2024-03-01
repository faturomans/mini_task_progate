<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompaniesSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'company_id' => '01',
            'company_name' => 'PT Intec Persada 1',
            'company_email' => 'intecpersada1@gmail.com',
            'company_address' => 'Jakarta',
            'company_phone' => '081381735217',
        ]);
    }
}
