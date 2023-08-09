<?php

namespace App\Services\Product;

use App\Models\Product;

class Service
{
    public function store($data)
    {
        $productsTags = [];
        $productCharacteristics = [];

        if (isset($data['product_tags'])) {
            $productsTags = $data['product_tags'];
            unset($data['product_tags']);
        }
        if (isset($data['product_tags'])) {
            $productCharacteristics = $this->getProductCharacteristics($data['product_characteristics']);
            unset($data['product_characteristics']);
        }

        $product = Product::create($data);

        $product->productCharacteristics()->attach($productCharacteristics);
        $product->productTags()->attach($productsTags);
    }

    public function update($data)
    {

    }

    public function destroy()
    {

    }

    private function getProductCharacteristics($characteristics): array
    {
        $productCharacteristics = [];
        if (empty($characteristics)) return $productCharacteristics;
        foreach ($characteristics as $characteristic) {
            $productCharacteristics[$characteristic['product_characteristic_id']] = ['value' => $characteristic['value']];
        }
        return $productCharacteristics;
    }
}
