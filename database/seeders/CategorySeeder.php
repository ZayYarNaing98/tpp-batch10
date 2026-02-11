<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',
                'description' => 'Articles related to technology advancements and news.'
            ],
            [
                'name' => 'Health',
                'description' => 'Articles focusing on health tips and medical news.'
            ],
            [
                'name' => 'Travel',
                'description' => 'Travel guides, tips, and destination reviews.'
            ],
            [
                'name' => 'Food',
                'description' => 'Recipes, restaurant reviews, and food trends.'
            ],
            [
                'name' => 'Lifestyle',
                'description' => 'Articles on lifestyle, fashion, and personal development.'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
