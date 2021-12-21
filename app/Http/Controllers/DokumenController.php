<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function store(Request $request) 
    {
        $dokumen = new Dokumen();

        $dokumen->jum_petak = $request->input('jum_petak');
        $dokumen->pjgsisi_bt = $request->input('pjgsisi_bt');
        $dokumen->pjgsisi_us = $request->input('pjgsisi_us');
        $dokumen->rand_hal = $request->input('rand_hal');
        $dokumen->rand_bar = $request->input('rand_bar');
        $dokumen->rand_kol = $request->input('rand_kol');
        $dokumen->randterpilih_bt = $request->input('randterpilih_bt');
        $dokumen->randterpilih_us = $request->input('randterpilih_us');
        $dokumen->tgl_ubin = $request->input('tgl_ubin');
        $dokumen->jenis_lahan = $request->input('jenis_lahan');
        $dokumen->luas_ubin = $request->input('luas_ubin');
        $dokumen->benih = $request->input('benih');
        $dokumen->pupuk_urea = $request->input('pupuk_urea');
        $dokumen->pupuk_tsp = $request->input('pupuk_tsp');
        $dokumen->pupuk_kcl = $request->input('pupuk_kcl');
        $dokumen->pupuk_npk = $request->input('pupuk_npk');
        $dokumen->pupuk_padat = $request->input('pupuk_padat');
        $dokumen->pupuk_cair = $request->input('pupuk_cair');
        $dokumen->pupuk_za = $request->input('pupuk_za');
        $dokumen->berat_ubin = $request->input('berat_ubin');
        $dokumen->rumpun = $request->input('rumpun');
        $dokumen->opt_thnini = $request->input('opt_thnini');
        $dokumen->alas_perontokan = $request->input('alas_perontokan');
        $dokumen->wilayah_id = $request->input('wilayah_id');

        if ($dokumen->save()) {
            return redirect()->route('admin.dokumen')->with('success', 'Berhasil mengentry dokumen!');
        }
    }
}
