<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Customers extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'user_id' => 3,
                'address' => '330 Rue de Rivoli',
                'name' => 'Mozelle Collier',
                'email' => 'mozellecollier@yahoo.com',
                'phone' => '+33 1 23 45 67 89',
                'country_id' => 74,
                'customer_type_id' => 1,
                'plan_id' => 1
            ],
            [
                'user_id' => 4,
                'name' => 'Elinor Wiegand',
                'email' => 'elinorwiegand@hotmail.com',
                'address' => '111 Unter den Linden',
                'phone' => '+49 30 18245012',
                'country_id' => 81,
                'customer_type_id' => 2,
                'plan_id' => 1
            ],
            [
                'user_id' => 5,
                'name' => 'Maggie Zulauf',
                'email' => 'maggiezulauf@gmail.com',
                'address' => '13 Grafton Street',
                'phone' => '+353 1 937 1835',
                'country_id' => 105,
                'customer_type_id' => 1,
                'plan_id' => 1
            ],
            [
                'user_id' => 6,
                'name' => 'Lew Paucek',
                'email' => 'lewpaucek@gmail.com',
                'address' => '25 Nerudova',
                'phone' => '+420 382 945 910',
                'country_id' => 58,
                'customer_type_id' => 1,
                'plan_id' => 1
            ],
            [
                'user_id' => 7,
                'name' => 'Michaela Gleason',
                'email' => 'michaelagleason@hotmail.com',
                'address' => '36 Maple Street',
                'phone' => '+1 416 555 5492',
                'country_id' => 39,
                'customer_type_id' => 2,
                'plan_id' => 1
            ],
            [
                'user_id' => 8,
                'name' => 'Isaac Sevilla',
                'email' => 'isaacsevilla@yahoo.com',
                'address' => '15 Calle Larios',
                'phone' => '+34 95 829 1284',
                'country_id' => 204,
                'customer_type_id' => 2,
                'plan_id' => 1
            ],
            [
                'user_id' => 9,
                'name' => 'Alicia Bosco',
                'email' => 'aliciabosco@gmail.com',
                'address' => 'Avenida de la Estación',
                'phone' => '+34 965 14 00 21',
                'country_id' => 204,
                'customer_type_id' => 1,
                'plan_id' => 1
            ],
            [
                'user_id' => 10,
                'name' => 'Mateo Marquardt',
                'email' => 'mateomarquardt@gmail.com',
                'address' => 'Rue Mouassine',
                'phone' => '+212 06 82 89 42 78',
                'country_id' => 149,
                'customer_type_id' => 1,
                'plan_id' => 1
            ]
        ]);
    }
}