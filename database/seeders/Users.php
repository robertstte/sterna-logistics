<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Users extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Verlie.Strada',
                'email' => 'verliestrada@sterna.com',
                'password' => Hash::make('Wu385ctZdIHMEi0'),
                'role_id' => 1,
                'notifications' => true ,
                'lang' => 'es'
            ],
            [
                'username' => 'Rebecca.Willson',
                'email' => 'rebeccawillson@sterna.com',
                'password' => Hash::make('9Yi2YnlLgrQ_V8b'),
                'role_id' => 1,
                'notifications' => true,
                'lang' => 'en'
            ],
            [
                'username' => 'Mozelle.Collier',
                'email' => 'mozellecollier@yahoo.com',
                'password' => Hash::make('13kUG80vTm56rzc'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'en'
            ],
            [
                'username' => 'Elinor.Wiegand',
                'email' => 'elinorwiegand@hotmail.com',
                'password' => Hash::make('aSptKyD18pwV6pw'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'en'
            ],
            [
                'username' => 'Maggie.Zulauf',
                'email' => 'maggiezulauf@gmail.com',
                'password' => Hash::make('7y85aS3sD8GJbAk'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'en'
            ],
            [
                'username' => 'Lew.Paucek',
                'email' => 'lewpaucek@gmail.com',
                'password' => Hash::make('oxf6j_WcaHiREWe'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'en'
            ],
            [
                'username' => 'Michaela.Gleason',
                'email' => 'michaelagleason@hotmail.com',
                'password' => Hash::make('07mmnJkUm8UJCVM'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'es'
            ],
            [
                'username' => 'Isaac.Sevilla',
                'email' => 'isaacsevilla@yahoo.com',
                'password' => Hash::make('oHQqwvwI7kA1vzu'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'en'
            ],
            [
                'username' => 'Alicia.Bosco',
                'email' => 'aliciabosco@gmail.com',
                'password' => Hash::make('qyuN6WqmDEj6Pk0'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'es'
            ],
            [
                'username' => 'Mateo.Marquardt',
                'email' => 'mateomarquardt@gmail.com',
                'password' => Hash::make('lfVL_6UvF29qe55'),
                'role_id' => 2,
                'notifications' => true,
                'lang' => 'es'
            ]
        ]);
    }
}