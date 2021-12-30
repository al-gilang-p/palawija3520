<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $fillable = ['sr', 'kd_kec', 'nm_kec', 'kd_desa', 'nm_desa', 'nbs', 'nks', 'id_segmen', 'nm_lokasi', 'ar', 'subsegmen', 'bln_panen', 'kd_pcl', 'nm_pcl', 'kd_pml', 'nm_pml'];

    public function dokumen()
    {
        return $this->hasOne(Dokumen::class);
    }
}
