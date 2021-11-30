<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WilayahController extends Controller
{
    public function store(Request $request, Response $response)
    {
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xlsx'
        ]);

        $file = $request->file('temp_file');

        try {
            $reader = new Xlsx();
            $spreadsheet = $reader->load($file->getRealPath());

            $sheetData = $spreadsheet->getSheet(0)->toArray();
            unset($sheetData[0]);

            $successCounter = 0;
            foreach ($sheetData as $key => $value) {
                $wilayah = new Wilayah();
                $wilayah->sr = $value[0];
                $wilayah->kd_kec = $value[1];
                $wilayah->nm_kec = $value[2];
                $wilayah->kd_desa = $value[3];
                $wilayah->nm_desa = $value[4];
                $wilayah->nbs = $value[5];
                $wilayah->nks = $value[6];
                $wilayah->id_segmen = $value[7];
                $wilayah->nm_lokasi = $value[8];
                $wilayah->ar = $value[9];
                $wilayah->subsegmen = $value[10];
                $wilayah->bln_panen = $value[11];
                $wilayah->kd_pcl = $value[12];
                $wilayah->nm_pcl = $value[13];
                $wilayah->kd_pml = $value[14];
                $wilayah->nm_pml = $value[15];
                if ($wilayah->save()) {
                    $successCounter++;
                }
            }
            $status = 'ok';
            if (count($sheetData) - $successCounter > 0) {
                $status = 'error';
            }
            $payload = array('status' => $status, 'content' => $successCounter . ' wilayah sukses ditambahkan! ' . count($sheetData) - $successCounter . ' wilayah gagal ditambahkan!');
            return redirect('admin_template_wilayah')->with('msg', $payload);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data! Code:' . $error_code);
        }
    }
}