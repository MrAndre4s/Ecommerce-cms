<?php

namespace Database\Seeders;

use App\Models\ProductCharacteristic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCharacteristic::factory()->count(100)->create();
    }
}
