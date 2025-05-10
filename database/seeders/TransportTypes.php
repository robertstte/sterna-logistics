<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransportTypes extends Seeder
{
    public function run(): void
    {
        DB::table('transport_types')->insert([
            ['type' => 'Air'],
            ['type' => 'Maritime'],
            ['type' => 'Land']
        ]);
    }
}