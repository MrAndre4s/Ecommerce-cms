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
Route::resource('manufacturers', ManufacturerController::class);

