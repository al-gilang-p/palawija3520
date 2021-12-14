<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetugasController extends Controller
{
    public function store(Request $request, Response $response)
    {
        $petugas = new Petugas;
        $petugas->kd_pcl = $request->input('kd_pcl');
        $petugas->username = $request->input('username');
        if ($petugas->save()) {
            return redirect()->route('admin.template_petugas')->with('success', 'Berhasil menambahkan username!');
        }
        return redirect()->route('admin.template_petugas')->with('error', 'Gagal menambahkan username!');
    }

    public function update(Request $request, Response $response, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->username = $request->input('username');
        if ($petugas->save()) {
            return redirect()->route('admin.template_petugas')->with('success', 'Berhasil memperbarui username!');
        }
    }

    public function destroy(Request $request, Response $response, $id)
    {
        $petugas = Petugas::findOrFail($id);
        if ($petugas->delete()) {
            return redirect()->route('admin.template_petugas')->with('success', 'Berhasil menghapus petugas!');
        }
    }
}