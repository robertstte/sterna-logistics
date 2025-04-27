<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerTypes extends Seeder
{
    public function run(): void
    {
        DB::table('customer_types')->insert([
            ['type' => 'Company'],
            ['type' => 'Particular']
        ]);
    }
}