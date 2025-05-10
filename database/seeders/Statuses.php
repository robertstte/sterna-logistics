<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Statuses extends Seeder
{
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'status' => 'Cancelled',
                'color' => '#FF3737'
            ],
            [
                'status' => 'Delayed',
                'color' => '#7B5FF1'
            ],
            [
                'status' => 'Delivered',
                'color' => '#118433'
            ],
            [
                'status' => 'Ongoing',
                'color' => '#FF8B37'
            ],
            [
                'status' => 'Pending',
                'color' => '#A3A2A6'
            ]
        ]);
    }
}