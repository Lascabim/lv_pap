<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RaceSeeder::class,
            AbilitySeeder::class
        ]);

        \App\Models\User::factory(10)->create();
        // \App\Models\Race::factory(5)->create();
    }
}
