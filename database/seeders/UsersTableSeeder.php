<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'nim' => '2103040600',
                'password' => Hash::make('password123'),
                'name' => 'Mente User',
                'role' => 'mente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nim' => '2003040001',
                'password' => Hash::make('123password'),
                'name' => 'Mentor User',
                'role' => 'mentor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nim' => '1234567890',
                'password' => Hash::make('password123'),
                'name' => 'LPPI User',
                'role' => 'lppi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
