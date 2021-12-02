<?php

use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name('admin.dashboard');

Route::get('/wilayah', function () {
    return view('admin.pages.template_wilayah');
})->name('admin.template_wilayah');

Route::post('/wilayah', [WilayahController::class, 'store'])->name('admin.store_wilayah');

Route::get('/petugas', function () {
    return view('admin.pages.template_wilayah');
})->name('admin.template_petugas');