<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Roles extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['role' => 'Administrator'],
            ['role' => 'User']
        ]);
    }
}