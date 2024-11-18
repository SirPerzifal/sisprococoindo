<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais'; // Nama tabel
    protected $primaryKey = 'id_pegawai'; // Primary key

    // Mengizinkan field diisi secara massal
    protected $fillable = [
        'nama',
        'tgl_join',
        'tgl_out',
        'posisi',
        'departemen',
        'status',
        'email',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function laporanHasilKerjaDKPs()
    {
        return $this->hasMany(laporan_hasil_kerja_dkp::class, 'id_pegawai', 'id_pegawai');
    }

    public function laporanHasilKerjaUmums()
    {
        return $this->hasMany(laporan_hasil_kerja_umum::class, 'id_pegawai', 'id_pegawai');
    }

}
