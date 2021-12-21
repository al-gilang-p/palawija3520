<?php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\WilayahController;
use App\Models\Dokumen;
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

Route::get('/login', function () {
    return view('login');
})->name('login');

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
    $petugas = Petugas::leftJoin('wilayahs', function ($join) {
        $join->on('petugas.kd_pcl', '=', 'wilayahs.kd_pcl');
    })->distinct()->get(['petugas.id', 'petugas.kd_pcl', 'wilayahs.nm_pcl', 'petugas.username'])->toArray();

    return view('admin.pages.template_petugas', ['petugas' => $petugas, 'distinct_petugas' => $distinct_petugas, 'assigned_petugas' => $assigned_petugas, 'unassigned_petugas' => $unassigned_petugas]);
})->name('admin.template_petugas');

Route::get('/petugas/view/{id}', function ($id) {
    $petugas = Petugas::leftJoin('wilayahs', function ($join) {
        $join->on('petugas.kd_pcl', '=', 'wilayahs.kd_pcl');
    })->where('petugas.id', '=', $id)->distinct()->get(['petugas.id', 'petugas.kd_pcl', 'wilayahs.nm_pcl', 'petugas.username'])->toArray();
    return view('admin.pages.template_petugas_view', ['petugas' => $petugas[0]]);
})->name('admin.template_petugas_edit');

Route::get('/petugas/edit/{id}', function ($id) {
    $petugas = Petugas::leftJoin('wilayahs', function ($join) {
        $join->on('petugas.kd_pcl', '=', 'wilayahs.kd_pcl');
    })->where('petugas.id', '=', $id)->distinct()->get(['petugas.id', 'petugas.kd_pcl', 'wilayahs.nm_pcl', 'petugas.username'])->toArray();
    return view('admin.pages.template_petugas_edit', ['petugas' => $petugas[0]]);
})->name('admin.template_petugas_edit');

Route::post('/petugas', [PetugasController::class, 'store'])->name('admin.store_petugas');
Route::put('/petugas/{id}', [PetugasController::class, 'update'])->name('admin.update_petugas');
Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('admin.destroy_petugas');

Route::get('/dokumen', function () {
    $wilayah = Wilayah::leftJoin('dokumens', function ($join) {
        $join->on('wilayahs.id', '=', 'dokumens.wilayah_id');
    })->get(['wilayahs.*', 'dokumens.id as dokumen_id'])->toArray();

    return view('admin.pages.dokumen', ['wilayah' => $wilayah]);
})->name('admin.dokumen');

Route::get('/dokumen/entry/{id}', function ($id) {
    $wilayah = Wilayah::findOrFail($id)->first();

    return view('admin.pages.dokumen_entry', ['wilayah' => $wilayah]);
})->name('admin.dokumen_entry');

Route::get('/dokumen/view/{id}', function ($id) {
    $dokumen = Dokumen::findOrFail($id)->first();

    return view('admin.pages.dokumen_view', ['dokumen' => $dokumen]);
})->name('admin.dokumen_view');

Route::get('/dokumen/edit/{id}', function ($id) {
    $dokumen = Dokumen::findOrFail($id)->first();

    return view('admin.pages.dokumen_edit', ['dokumen' => $dokumen]);
})->name('admin.dokumen_edit');

Route::post('/dokumen', [DokumenController::class, 'store'])->name('admin.store_dokumen');
Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('admin.update_dokumen');
Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('admin.destroy_dokumen');