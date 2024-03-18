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
            'name' => 'Cidadania e Desenvolvimento',
            'slug' => 'ced',
        ]);

        $category = Category::create([
            'name' => 'Interculturalidade',
            'slug' => 'interculturalidade',
        ]);

        $category = Category::create([
            'name' => 'Saúde',
            'slug' => 'saude',
        ]);
    }
}