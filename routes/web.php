<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\ManufacturerController;
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


