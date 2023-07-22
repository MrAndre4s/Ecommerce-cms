<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\Manufacturer\StoreRequest;
use App\Http\Requests\Manufacturer\UpdateRequest;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::orderByDesc('id')->paginate(20);
        $postStatus = PostStatus::asArray();
        return view('manufacturer.index', compact('manufacturers', 'postStatus'));
    }

    public function create()
    {
        $postStatus = PostStatus::asArray();
        return view('manufacturer.create', compact('postStatus'));
    }

    public function store(StoreRequest $request)
    {
        $manufacturer = Manufacturer::create($request->validated());
        return redirect()->route('manufacturers.index');
    }

    public function show(Manufacturer $manufacturer)
    {
        dd('manufacturers.show');
    }

    public function edit(Manufacturer $manufacturer)
    {
        $postStatus = PostStatus::asArray();
        return view('manufacturer.edit', compact('manufacturer', 'postStatus'));
    }

    public function update(UpdateRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->validated());
        return redirect()->route('manufacturers.edit', $manufacturer);
    }

    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return redirect()->route('manufacturers.index');
    }

    public function deleted()
    {
        $deleteManufacturers = Manufacturer::onlyTrashed()->paginate(20);
        return view('manufacturer.deleted', compact('deleteManufacturers'));
    }

    public function restore(Manufacturer $manufacturer)
    {
        $manufacturer->restore();
        return redirect()->route('manufacturers.deleted');
    }

    public function forceDelete(Manufacturer $manufacturer)
    {
        $manufacturer->forceDelete();
        return redirect()->route('manufacturers.deleted');
    }
}
