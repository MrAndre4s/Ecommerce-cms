<?php

namespace App\Services\Product;

use App\Models\Product;
use DB;
use Exception;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $productsTags = [];
            $productCharacteristics = [];

            if (isset($data['product_tags'])) {
                $productsTags = $data['product_tags'];
                unset($data['product_tags']);
            }
            if (isset($data['product_characteristics'])) {
                $productCharacteristics = $this->getProductCharacteristics($data['product_characteristics']);
                unset($data['product_characteristics']);
            }

            $product = Product::create($data);
            $product->productCharacteristics()->attach($productCharacteristics);
            $product->productTags()->attach($productsTags);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }

    }

    public function update(Product $product, $data)
    {
        try {
            DB::beginTransaction();
            $productsTags = [];
            $productCharacteristics = [];
            if (isset($data['product_tags'])) {
                $productsTags = $data['product_tags'];
                unset($data['product_tags']);
            }
            if (isset($data['product_characteristics'])) {
                $productCharacteristics = $this->getProductCharacteristics($data['product_characteristics']);
                unset($data['product_characteristics']);
            }
            $product->update($data);
            $product->productCharacteristics()->sync($productCharacteristics);
            $product->productTags()->sync($productsTags);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function destroy(Product $product)
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
