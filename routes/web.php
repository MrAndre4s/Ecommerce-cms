<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductTagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', IndexController::class)->name('main.index');

Route::resource('attachments', AttachmentController::class);

Route::get('manufacturers/deleted', [ManufacturerController::class, 'deleted'])->name('manufacturers.deleted');
Route::delete('manufacturers/deleted/{manufacturer}', [ManufacturerController::class, 'forceDelete'])->withTrashed()->name('manufacturers.force_delete');
Route::post('manufacturers/restore/{manufacturer}', [ManufacturerController::class, 'restore'])->withTrashed()->name('manufacturers.restore');
Route::resource('manufacturers', ManufacturerController::class);

Route::get('product-tags/deleted', [ProductTagController::class, 'deleted'])->name('product-tags.deleted');
Route::delete('product-tags/deleted/{productTag}', [ProductTagController::class, 'forceDelete'])->withTrashed()->name('product-tags.force_delete');
Route::post('product-tags/restore/{productTag}', [ProductTagController::class, 'restore'])->withTrashed()->name('product-tags.restore');
Route::resource('product-tags', ProductTagController::class);


