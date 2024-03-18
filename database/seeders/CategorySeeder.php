<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        $category = Category::create([
            'name' => 'Sapo',
            'slug' => 'sapo',
            'image' => '/assets/categories/sapo.jpg',
            'description' => 'Sapo.PT',
        ]);

        $category = Category::create([
            'name' => 'PT Runners',
            'slug' => 'pt_runners',
            'image' => '/assets/stories/categories/pro_runners.png',
            'description' => 'Sapo.PT',
        ]);
    }
}