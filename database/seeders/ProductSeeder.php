<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Колбаса',
                'amount' => 0,
            ],
            [
                'name' => 'Пармезан',
                'amount' => 0,
            ],
            [
                'name' => 'Левый носок',
                'amount' => 0,
            ],
        ];

        foreach ($products as $product)
        {
            Product::create($product);
        }
    }
}
