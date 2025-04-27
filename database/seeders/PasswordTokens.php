<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasswordTokens extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('password_tokens')->insert([
                'user_id' => $i,
                'token' => Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'expires_at' => Carbon::now()->addMonth(),
                'used' => false
            ]);
        }
    }
}