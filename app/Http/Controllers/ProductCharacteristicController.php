<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCharacteristic\StoreRequest;
use App\Http\Requests\ProductCharacteristic\UpdateRequest;
use App\Models\ProductCharacteristic;

class ProductCharacteristicController extends Controller
{
    public function index()
    {
        $productCharacteristics = ProductCharacteristic::orderByDesc('id')->paginate(20);
        return view('product-characteristic.index', compact('productCharacteristics'));
    }

    public function create()
    {
        return view('product-characteristic.create');
    }

    public function store(StoreRequest $request)
    {
        $productCharacteristic = ProductCharacteristic::create($request->validated());
        return redirect()->route('product-characteristics.index');
    }

    public function show(ProductCharacteristic $productCharacteristic)
    {
        //
    }

    public function edit(ProductCharacteristic $productCharacteristic)
    {
        return view('product-characteristic.edit', compact('productCharacteristic'));
    }

    public function update(UpdateRequest $request, ProductCharacteristic $productCharacteristic)
    {
        $productCharacteristic->update($request->validated());
        return redirect()->route('product-characteristics.edit', $productCharacteristic);
    }

    public function destroy(ProductCharacteristic $productCharacteristic)
    {
        $productCharacteristic->delete();
        return redirect()->route('product-characteristics.index');
    }

    public function deleted()
    {
        $deletedProductCharacteristics = ProductCharacteristic::onlyTrashed()->orderByDesc('deleted_at')->paginate(20);
        return view('product-characteristic.deleted', compact('deletedProductCharacteristics'));
    }

    public function restore(ProductCharacteristic $productCharacteristic)
    {
        $productCharacteristic->restore();
        return redirect()->route('product-characteristics.deleted');
    }

    public function forceDelete(ProductCharacteristic $productCharacteristic)
    {
        $productCharacteristic->forceDelete();
        return redirect()->route('product-characteristics.deleted');
    }
}
