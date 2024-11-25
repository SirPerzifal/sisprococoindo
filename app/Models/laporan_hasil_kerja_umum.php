<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_hasil_kerja_umum extends Model
{
    use HasFactory;

    protected $table = 'laporan_hasil_kerja_umums';
    protected $primaryKey = 'id_laporan_hasil_kerja';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pegawai',
        'id_jenis_laporan',
        'tanggal',
        'nama_sheller',
        'posisi',
        'bruto',
        'potongan_keranjang',
        'hasil_kerja_netto',
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function jenisLaporan()
    {
        return $this->belongsTo(jenis_laporan::class, 'id_jenis_laporan', 'id_jenis_laporan');
    }

    public function detailTimbanganUmums()
    {
        return $this->hasMany(detail_timbangan_umum::class, 'id_laporan_hasil_kerja', 'id_laporan_hasil_kerja');
    }
}
