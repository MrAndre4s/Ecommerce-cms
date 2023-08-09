<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCharacteristic;
use App\Models\ProductTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()->count(100)->create();

        foreach ($products as $product) {
            $productTags = ProductTag::get()->random(5)->pluck('id');
            $productCharacteristics = ProductCharacteristic::get()->random(10)->pluck('id');

            $product->productTags()->attach($productTags);
            $product->productCharacteristics()->attach($productCharacteristics);
        }
    }
}
