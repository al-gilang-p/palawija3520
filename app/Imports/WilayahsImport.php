<?php

namespace App\Imports;

use App\Models\Wilayah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WilayahsImport implements ToModel, WithHeadingrow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Wilayah([
            'sr' => $row['sr'],
            'kd_kec' => $row['kd_kec'],
            'nm_kec' => $row['nm_kec'],
            'kd_desa' => $row['kd_desa'],
            'nm_desa' => $row['nm_desa'],
            'nbs' => $row['nbs'],
            'nks' => $row['nks'],
            'id_segmen' => $row['id_segmen'],
            'subsegmen' => $row['subsegmen'],
            'responden' => $row['responden'],
            'nm_lokasi' => $row['nm_lokasi'],
            'bln_panen' => $row['bln_panen'],
            'komoditas' => $row['komoditas'],
            'ar' => $row['ar'],
            'kd_pcl' => $row['kd_pcl'],
            'nm_pcl' => $row['nm_pcl'],
            'kd_pml' => $row['kd_pml'],
            'nm_pml' => $row['nm_pml'],
        ]);
    }
}