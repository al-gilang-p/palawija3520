<?php

use App\Http\Controllers\PetugasController;
use App\Http\Controllers\WilayahController;
use App\Models\Petugas;
use App\Models\Wilayah;
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

    $wilayahs = Wilayah::all()->toArray();
    return view('admin.pages.template_wilayah', ['wilayah' => $wilayahs]);

})->name('admin.template_wilayah');

Route::get('/wilayah/view/{id}', function ($id) {

    $wilayah = Wilayah::findOrFail($id)->toArray();
    return view('admin.pages.template_wilayah_view', ['wilayah' => $wilayah]);

})->name('admin.template_wilayah_view');

Route::get('/wilayah/edit/{id}', function ($id) {

    $wilayah = Wilayah::findOrFail($id)->toArray();
    return view('admin.pages.template_wilayah_edit', ['wilayah' => $wilayah]);

})->name('admin.template_wilayah_edit');

Route::post('/wilayah', [WilayahController::class, 'store'])->name('admin.store_wilayah');
Route::put('/wilayah/{id}', [WilayahController::class, 'update'])->name('admin.update_wilayah');
Route::delete('/wilayah/{id}', [WilayahController::class, 'destroy'])->name('admin.destroy_wilayah');

Route::get('/petugas', function () {
    $distinct_petugas = Petugas::rightJoin('wilayahs', function ($join) {
        $join->on('petugas.kd_pcl', '=', 'wilayahs.kd_pcl');
    })->whereNull('petugas.username')->distinct()->get(['wilayahs.kd_pcl', 'wilayahs.nm_pcl'])->toArray();
    $total_petugas = Wilayah::distinct()->count('kd_pcl');
    $assigned_petugas = Petugas::distinct()->count('kd_pcl');
    $unassigned_petugas = $total_petugas - $assigned_petugas;

    return view('admin.pages.template_petugas', ['distinct_petugas' => $distinct_petugas, 'assigned_petugas' => $assigned_petugas, 'unassigned_petugas' => $unassigned_petugas]);
})->name('admin.template_petugas');

Route::post('/petugas', [PetugasController::class, 'store'])->name('admin.store_petugas');