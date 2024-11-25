<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_laporan extends Model
{
    use HasFactory;

    protected $table = 'jenis_laporans';
    protected $primaryKey = 'id_jenis_laporan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_jenis_laporan', 
    ];

    public function laporanHasilKerjaUmums()
    {
        return $this->hasMany(laporan_hasil_kerja_umum::class, 'id_jenis_laporan', 'id_jenis_laporan');
    }
}
