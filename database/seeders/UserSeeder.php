<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hashedPassword = Hash::make('123123123');

        DB::table('users')->insert([
            'name' => 'Lascabim',
            'username' => 'lascabim',
            'runner_type' => 'guia',
            'profile_photo_path' => 'https://i.imgur.com/jOcbP68.png',
            'email' => 'ze@gmail.com',
            'password' => $hashedPassword,
            'created_at' => now(),
        ]);
    }
}

 