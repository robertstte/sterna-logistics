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
            ['status' => 'Cancelled'],
            ['status' => 'Delayed'],
            ['status' => 'Delivered'],
            ['status' => 'Ongoing'],
            ['status' => 'Pending']
        ]);
    }
}