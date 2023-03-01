<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Колбаса',
                'amount' => 300,
            ],
            [
                'name' => 'Пармезан',
                'amount' => 100,
            ],
            [
                'name' => 'Левый носок',
                'amount' => 250,
            ],
        ];

        foreach ($products as $product)
        {
            Product::create($product);
        }
    }
}
