<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            Countries::class,
            CustomerTypes::class,
            TransportTypes::class,
            CountryLocations::class,
            Roles::class,
            Statuses::class,
            Plans::class,
            Users::class,
            PasswordTokens::class,
            Customers::class,
            Orders::class,
            PackageTypes::class,
            Transports::class,
            OrderDetails::class
        ]);
    }
}