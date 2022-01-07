<?php

namespace App\Http\Controllers;

use App\Imports\WilayahsImport;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class WilayahController extends Controller
{
    public function downloadTemplate()
    {
        $path = storage_path('app/public/template_wilayah.xlsx');
        return response()->download($path);
    }

    public function store(Request $request)
    {
        $request->validate([
            'temp_file' => 'bail|required|file|mimes:xlsx',
        ]);

        try {
            Excel::import(new WilayahsImport, request()->file('temp_file'));
            return redirect()->route('admin.template_wilayah')->with('success', 'Berhasil menambahkan wilayah!');
        } catch (ValidationException $e) {
            $failures = $e->failures();
            var_dump($failures);
            return redirect()->route('admin.template_wilayah')->with('error', 'Gagal menambahkan wilayah!');
        }
    }

    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->sr = $request->input('sr');
        $wilayah->kd_kec = $request->input('kd_kec');
        $wilayah->nm_kec = $request->input('nm_kec');
        $wilayah->kd_desa = $request->input('kd_desa');
        $wilayah->nm_desa = $request->input('nm_desa');
        $wilayah->nbs = $request->input('nbs');
        $wilayah->nks = $request->input('nks');
        $wilayah->id_segmen = $request->input('id_segmen');
        $wilayah->nm_lokasi = $request->input('nm_lokasi');
        $wilayah->ar = $request->input('ar');
        $wilayah->subsegmen = $request->input('subsegmen');
        $wilayah->bln_panen = $request->input('bln_panen');
        $wilayah->kd_pcl = $request->input('kd_pcl');
        $wilayah->nm_pcl = $request->input('nm_pcl');
        $wilayah->kd_pml = $request->input('kd_pml');
        $wilayah->nm_pml = $request->input('nm_pml');
        if ($wilayah->save()) {
            return redirect()->route('admin.template_wilayah')->with('success', 'Berhasil memperbarui wilayah!');
        }
    }

    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        if ($wilayah->delete()) {
            return redirect()->route('admin.template_wilayah')->with('success', 'Berhasil menghapus wilayah!');
        }
    }
}