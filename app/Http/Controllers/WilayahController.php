<?php

namespace App\Http\Controllers;

use App\Imports\WilayahsImport;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class WilayahController extends Controller
{
    public function store(Request $request, Response $response)
    {
        $request->validate([
            'temp_file' => 'bail|required|file|mimes:xlsx',
        ]);

        try {
            Excel::import(new WilayahsImport, request()->file('temp_file'));
            return redirect()->route('admin.template_wilayah')->with('success', 'Berhasil menambahkan wilayah!');
        } catch (ValidationException $e) {
            $failures = $e->failures();
            return redirect()->route('admin.template_wilayah')->with('error', 'Gagal menambahkan wilayah!');
        }
    }

    public function destroy(Request $request, Response $response, $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        if ($wilayah->delete()) {
            return redirect()->route('admin.template_wilayah')->with('success', 'Berhasil menghapus wilayah!');
        }
    }
}