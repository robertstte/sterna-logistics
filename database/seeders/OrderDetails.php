<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderDetails extends Seeder
{
    public function run(): void
    {
        DB::table('order_details')->insert([
            [
                'order_id' => '202504040000000001',
                'origin' => 101,
                'destination' => 154,
                'departure_date' => '2025-04-16',
                'arrival_date' => '2025-04-18',
                'departure_location' => 25,
                'arrival_location' => 9,
                'distance_km' => 1200.00,
                'transport_id' => 15,
                'total_cost' => 1200.00,
                'weight' => 28000.00,
                'package_type_id' => 8,
                'description' => 'Textile products such as fabrics, garments or accessories related to the textile industry.'
            ],
            [
                'order_id' => '202502100000000002',
                'origin' => 204,
                'destination' => 31,
                'departure_date' => '2025-02-11',
                'arrival_date' => '2025-02-12',
                'departure_location' => 19,
                'arrival_location' => 13,
                'distance_km' => 7640.00,
                'transport_id' => 4,
                'total_cost' => 47368.00,
                'weight' => 120000.00,
                'package_type_id' => 4,
                'description' => 'Load composed of solar panels and wind components, designed for renewable energy projects.'
            ],
            [
                'order_id' => '202501150000000001',
                'origin' => 136,
                'destination' => 108,
                'departure_date' => '2025-02-21',
                'arrival_date' => '2025-02-21',
                'departure_location' => 30,
                'arrival_location' => 33,
                'distance_km' => 781.00,
                'transport_id' => 9,
                'total_cost' => 1835.35,
                'weight' => 24000.00,
                'package_type_id' => 2,
                'description' => 'Integrated circuits and electronic components.'
            ],
            [
                'order_id' => '202501240000000001',
                'origin' => 81,
                'destination' => 229,
                'departure_date' => '2025-01-25',
                'arrival_date' => '2025-01-28',
                'departure_location' => 36,
                'arrival_location' => 39,
                'distance_km' => 1033.00,
                'transport_id' => 8,
                'total_cost' => 2427.55,
                'weight' => 30000.00,
                'package_type_id' => 1,
                'description' => 'Speciality chemicals and laboratory materials.'
            ],
            [
                'order_id' => '202503030000000001',
                'origin' => 55,
                'destination' => 113,
                'departure_date' => '2025-04-11',
                'arrival_date' => '2025-05-13',
                'departure_location' => 23,
                'arrival_location' => 24,
                'distance_km' => 4.035,
                'transport_id' => 12,
                'total_cost' => 5447.25,
                'weight' => 6500.00,
                'package_type_id' => 3,
                'description' => 'Refined petroleum oils.'
            ],
            [
                'order_id' => '202504040000000002',
                'origin' => 149,
                'destination' => 177,
                'departure_date' => '2025-04-14',
                'arrival_date' => '2025-04-14',
                'departure_location' => 25,
                'arrival_location' => 26,
                'distance_km' => 550.00,
                'transport_id' => 6,
                'total_cost' => 1375.00,
                'wieght' => 22000.00,
                'package_type_id' => 4,
                'description' => 'Heavy construction machinery.'
            ],
            [
                'order_id' => '202503200000000001',
                'origin' => 74,
                'destination' => 62,
                'departure_date' => '2025-04-10',
                'arrival_date' => '2025-04-26',
                'departure_location' => 27,
                'arrival_location' => 28,
                'distance_km' => 7176.00,
                'transport_id' => 7,
                'total_cost' => 25116.00,
                'weight' => 150000.00,
                'package_type_id' => 5,
                'description' => 'Agricultural products and implements.'
            ],
            [
                'order_id' => '202502100000000001',
                'origin' => 105,
                'destination' => 230,
                'departure_date' => '2025-02-27',
                'arrival_date' => '2025-02-28',
                'departure_location' => 29,
                'arrival_location' => 30,
                'distance_km' => 6650.00,
                'transport_id' => 1,
                'total_cost' => 28927.50,
                'weight' => 8000.00,
                'package_type_id' => 6,
                'description' => 'Dairy products.'
            ]
        ]);
    }
}