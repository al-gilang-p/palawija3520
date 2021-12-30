<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $fillable = ['kd_pcl', 'username', 'password'];

    public function dokumen()
    {
        return $this->hasOne('Dokumen::class', 'petugas_id');
    }
}
