<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->text(),
            'manufacturer_id' => Manufacturer::get()->random()->id,
            'product_category_id' => ProductCategory::get()->random()->id,
            'sku' => $this->faker->isbn13(),
            'price' => $this->faker->randomFloat(2),
            'discount_price' => (rand(0, 2) == 1) ? $this->faker->randomFloat(2) : null,
            'stock' => $this->faker->randomNumber(),
            'rating' => $this->faker->randomFloat(2, 0, 10),
            'is_recommended' => $this->faker->boolean(),
        ];
    }
}
