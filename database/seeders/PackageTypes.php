<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageTypes extends Seeder
{
    public function run(): void
    {
        DB::table('package_types')->insert([
            ['type' => 'Chemical'],
            ['type' => 'Electronic'],
            ['type' => 'Explosive'],
            ['type' => 'Heavy'],
            ['type' => 'Organic'],
            ['type' => 'Perishables'],
            ['type' => 'Sensible'],
            ['type' => 'Textile']
        ]);
    }
}