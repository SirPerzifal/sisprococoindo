<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_timbangan_umum extends Model
{
    use HasFactory;

    protected $table = 'detail_timbangan_umums';
    protected $primaryKey = 'id_detail_timbangan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_laporan_hasil_kerja',
        'tanggal',
        'nama_pegawai',
        'hasil_timbangan',
        'total_timbangan',
        'jenis_keranjang',
        'jumlah_keranjang',
        'total_potongan_keranjang',
    ];

    public function laporanHasilKerjaUmum()
    {
        return $this->belongsTo(laporan_hasil_kerja_umum::class, 'id_laporan_hasil_kerja', 'id_laporan_hasil_kerja');
    }
}
