<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_hasil_kerja_dkp extends Model
{
    use HasFactory;

    protected $table = 'laporan_hasil_kerja_dkps';
    protected $primaryKey = 'id_laporan_hasil_kerja';
    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'nama_sheller',
        'nama_parer1',
        'nama_parer2',
        'nama_parer3',
        'hasil_kerja_parer1',
        'hasil_kerja_parer2',
        'hasil_kerja_parer3',
        'hasil_kerja_sheller',
    ];
    public $incrementing = false;
    protected $keyType = 'string';

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function laporanHasilKerjaDkp()
    {
        return $this->belongsTo(detail_timbangan_dkp::class, 'id_laporan_hasil_kerja', 'id_laporan_hasil_kerja');
    }
}
