<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CustomerTypes::class,
            Roles::class,
            Statuses::class,
            Countries::class,
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