<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCharacteristic;
use App\Models\ProductTag;
use App\Services\Product\Service;

class ProductController extends Controller
{
    private Service $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderbyDesc('created_at')->paginate(20);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postStatus = PostStatus::asArray();
        $manufacturers = Manufacturer::all();
        $productTags = ProductTag::all();
        $productCategories = ProductCategory::all();
        $productCharacteristics = ProductCharacteristic::all();

        return view('products.create', compact('postStatus', 'manufacturers', 'productTags', 'productCategories', 'productCharacteristics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $postStatus = PostStatus::asArray();
        $manufacturers = Manufacturer::all();
        $productTags = ProductTag::all();
        $productCategories = ProductCategory::all();
        $productCharacteristics = ProductCharacteristic::all();
        return view('products.edit', compact('product', 'postStatus', 'manufacturers', 'productTags', 'productCategories', 'productCharacteristics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $this->service->update($product, $data);

        return redirect()->route('products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function deleted()
    {
        $deleteProducts = Product::onlyTrashed()->paginate(20);
        return view('products.deleted', compact('deleteProducts'));
    }

    public function restore(Product $product)
    {
        $product->restore();
        return redirect()->route('products.deleted');
    }

    public function forceDelete(Product $product)
    {
        $product->forceDelete();
        return redirect()->route('products.deleted');
    }
}
