<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Orders extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'id' => '202501150000000001',
                'customer_id' => 2,
                'status_id' => 1,
                'created_at' => '2025-01-15',
                'updated_at' => '2025-02-19'
            ],
            [
                'id' => '202501240000000001',
                'customer_id' => 5,
                'status_id' => 5,
                'created_at' => '2025-01-24',
                'updated_at' => '2025-01-28'
            ],
            [
                'id' => '202502100000000001',
                'customer_id' => 6,
                'status_id' => 1,
                'created_at' => '2025-02-10',
                'updated_at' => '2025-02-24'
            ],
            [
                'id' => '202502100000000002',
                'customer_id' => 3,
                'status_id' => 3,
                'created_at' => '2025-02-10',
                'updated_at' => '2025-02-12'
            ],
            [
                'id' => '202503030000000001',
                'customer_id' => 1,
                'status_id' => 4,
                'created_at' => '2025-03-03',
                'updated_at' => '2025-04-11'
            ],
            [
                'id' => '202503200000000001',
                'customer_id' => 4,
                'status_id' => 2,
                'created_at' => '2025-03-20',
                'updated_at' => '2025-06-09'
            ],
            [
                'id' => '202504040000000001',
                'customer_id' => 7,
                'status_id' => 1,
                'created_at' => '2025-04-04',
                'updated_at' => '2025-04-11'
            ],
            [
                'id' => '202504040000000002',
                'customer_id' => 8,
                'status_id' => 5,
                'created_at' => '2025-04-04',
                'updated_at' => '2025-04-15'
            ]
        ]);
    }
}