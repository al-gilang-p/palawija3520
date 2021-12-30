<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $fillable = ['jum_petak', 'pjgsisi_bt', 'pjgsisi_us', 'rand_hal', 'rand_bar', 'rand_kol', 'randterpilih_bt', 'randterpilih_us', 'tgl_ubin', 'jenis_lahan', 'luas_ubin', 'benih', 'pupuk_urea', 'pupuk_tsp', 'pupuk_kcl', 'pupuk_npk', 'pupuk_padat', 'pupuk_cair', 'pupuk_za', 'berat_ubin', 'rumpun', 'opt_thnini', 'alas_perontokan', 'wilayah_id'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
