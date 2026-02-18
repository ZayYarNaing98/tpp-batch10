<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop',
                'description' => 'A high-performance laptop for work and gaming.',
                'price' => 1200,
            ],
            [
                'name' => 'Smartphone',
                'description' => 'A latest model smartphone with advanced features.',
                'price' => 800,
            ],
            [
                'name' => 'Headphones',
                'description' => 'Noise-cancelling headphones for immersive sound experience.',
                'price' => 150,
            ],
            [
                'name' => 'Smartwatch',
                'description' => 'A stylish smartwatch with fitness tracking features.',
                'price' => 200,
            ],
            [
                'name' => 'Tablet',
                'description' => 'A lightweight tablet for entertainment and productivity.',
                'price' => 500,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
