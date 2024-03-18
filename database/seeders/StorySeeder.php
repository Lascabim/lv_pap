<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stories')->delete();

        $story = Story::create([
            'title' => 'As abelhas são importantes',
            'slug' => 'abelhas_importantes'
        ]);

        $story = Story::create([
            'title' => 'Ganhamos dois pontos ao SLB',
            'slug' => '2_slb'
        ]);
    }
}