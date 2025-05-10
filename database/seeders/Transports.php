<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Transports extends Seeder
{
    public function run(): void
    {
        DB::table('transports')->insert([
            [
                'type_id' => 1,
                'cost_per_km' => 4.35,
                'capacity' => 20000.00,
                'license_plate' => 'EI-GXY',
                'country_id' => 105
            ],
            [
                'type_id' => 1,
                'cost_per_km' => 8.50,
                'capacity' => 440000.00,
                'license_plate' => 'OK-RFG972',
                'country_id' => 58
            ],
            [
                'type_id' => 1,
                'cost_per_km' => 5.00,
                'capacity' => 70000.00,
                'license_plate' => 'C-FJDI',
                'country_id' => 39
            ],
            [
                'type_id' => 1,
                'cost_per_km' => 6.20,
                'capacity' => 155000.00,
                'license_plate' => 'EC_JPR',
                'country_id' => 204
            ],
            [
                'type_id' => 1,
                'cost_per_km' => 8.40,
                'capacity' => 427500.00,
                'license_plate' => 'EC-FKT',
                'country_id' => 204
            ],
            [
                'type_id' => 2,
                'cost_per_km' => 2.35,
                'capacity' => 999999.99,
                'license_plate' => 'MA-45972',
                'country_id' => 149
            ],
            [
                'type_id' => 2,
                'cost_per_km' => 2.35,
                'capacity' => 999999.99,
                'license_plate' => 'FR-95271',
                'country_id' => 74
            ],
            [
                'type_id' => 2,
                'cost_per_km' => 2.35,
                'capacity' => 999999.99,
                'license_plate' => 'HH-4263',
                'country_id' => 81
            ],
            [
                'type_id' => 2,
                'cost_per_km' => 2.35,
                'capacity' => 999999.99,
                'license_plate' => 'MLT-87492',
                'country_id' => 136
            ],
            [
                'type_id' => 2,
                'cost_per_km' => 2.35,
                'capacity' => 999999.99,
                'license_plate' => 'PR-47519',
                'country_id' => 178
            ],
            [
                'type_id' => 3,
                'cost_per_km' => 1.20,
                'capacity' => 20000.00,
                'license_plate' => 'AOG 830',
                'country_id' => 127
            ],
            [
                'type_id' => 3,
                'cost_per_km' => 1.35,
                'capacity' => 19200.00,
                'license_plate' => 'ZG 176-AA',
                'country_id' => 55
            ],
            [
                'type_id' => 3,
                'cost_per_km' => 1.10,
                'capacity' => 42000.00,
                'license_plate' => '01-DRC-4',
                'country_id' => 155
            ],
            [
                'type_id' => 3,
                'cost_per_km' => 1.70,
                'capacity' => 16400.00,
                'license_plate' => 'KHFH37',
                'country_id' => 230
            ],
            [
                'type_id' => 3,
                'cost_per_km' => 1.00,
                'capacity' => 32300.00,
                'license_plate' => 'MH 01 AB 7815',
                'country_id' => 101
            ]
        ]);
    }
}