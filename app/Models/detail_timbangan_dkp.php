<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_timbangan_dkp extends Model
{
    use HasFactory;

    protected $table = 'detail_timbangan_dkps';
    protected $primaryKey = 'id_detail_timbangan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_laporan_hasil_kerja',
        'nama_parer1',
        'nama_parer2',
        'nama_parer3',
        'tanggal',
        'hasil_timbangan',
        'total_timbangan',
        'jenis_keranjang',
        'jumlah_keranjang',
        'total_potongan_keranjang',
    ];

    public function laporanHasilKerjaDkp()
    {
        return $this->belongsTo(laporan_hasil_kerja_dkp::class, 'id_laporan_hasil_kerja', 'id_laporan_hasil_kerja');
    }
}
