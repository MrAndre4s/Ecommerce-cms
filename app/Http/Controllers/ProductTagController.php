<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTag\StoreRequest;
use App\Http\Requests\ProductTag\UpdateRequest;
use App\Models\ProductTag;

class ProductTagController extends Controller
{

    public function index()
    {
        $productTags = ProductTag::orderByDesc('id')->paginate(20);
        return view('product-tag.index', compact('productTags'));
    }

    public function create()
    {
        return view('product-tag.create');
    }

    public function store(StoreRequest $request)
    {
        $productTag = ProductTag::create($request->validated());
        return redirect()->route('product-tags.index');
    }

    public function show(ProductTag $productTag)
    {
        dd('product-tags.show');
    }

    public function edit(ProductTag $productTag)
    {
        return view('product-tag.edit', compact('productTag'));
    }

    public function update(UpdateRequest $request, ProductTag $productTag)
    {
        $productTag->update($request->validated());
        return redirect()->route('product-tags.edit', $productTag);
    }

    public function destroy(ProductTag $productTag)
    {
        $productTag->delete();
        return redirect()->route('product-tags.index');
    }

    public function deleted()
    {
        $deleteProductTags = ProductTag::onlyTrashed()->orderByDesc('deleted_at')->paginate(20);
        return view('product-tag.deleted', compact('deleteProductTags'));
    }

    public function restore(ProductTag $productTag)
    {
        $productTag->restore();
        return redirect()->route('product-tags.deleted');
    }

    public function forceDelete(ProductTag $productTag)
    {
        $productTag->forceDelete();
        return redirect()->route('product-tags.deleted');
    }
}
