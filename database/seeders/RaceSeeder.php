<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('races')->insert([
            'name' => 'race_1',
            'latitude' => '41.141580',
            'longitude' => '-8.536235',
            'title' => 'CORRIDA DA REPÚBLICA 2024',
            'description' => 'Celebração do dia 5 de Outubro de 1910',
            'minimum_condition' => 'low',
            'start_time' => '16:00',
            'end_time' => '18:00',
            'date' => '2024-10-05',
            'has_accessibility' => true,
            'url' => 'https://www.cm-benavente.pt/',
        ]);
    }
}

 