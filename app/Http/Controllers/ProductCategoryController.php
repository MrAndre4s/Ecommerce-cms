<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategory\StoreRequest;
use App\Http\Requests\ProductCategory\UpdateRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::orderByDesc('id')->paginate(20);
        return view('product-category.index', compact('productCategories'));
    }

    public function create()
    {
        return view('product-category.create');
    }

    public function store(StoreRequest $request)
    {
        $productCategory = ProductCategory::create($request->validated());
        return redirect()->route('product-categories.index');
    }

    public function show(ProductCategory $productCategory)
    {
        //
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('product-category.edit', compact('productCategory'));
    }

    public function update(UpdateRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->validated());

        return redirect()->route('product-categories.edit', $productCategory);
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('product-categories.index');
    }

    public function deleted()
    {
        $deletedProductCategories = ProductCategory::onlyTrashed()->orderByDesc('deleted_at')->paginate(20);
        return view('product-category.deleted', compact('deletedProductCategories'));
    }

    public function restore(ProductCategory $productCategory)
    {
        $productCategory->restore();
        return redirect()->route('product-categories.deleted');
    }

    public function forceDelete(ProductCategory $productCategory)
    {
        $productCategory->forceDelete();
        return redirect()->route('product-categories.deleted');
    }
}
