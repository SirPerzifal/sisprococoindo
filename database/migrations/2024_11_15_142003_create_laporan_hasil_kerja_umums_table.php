<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_hasil_kerja_umums', function (Blueprint $table) {
            $table->id('id_laporan_hasil_kerja');
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis_laporan');
            $table->foreign('id_jenis_laporan')->references('id_jenis_laporan')->on('jenis_laporans')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('nama_sheller');
            $table->enum('posisi', ['sheller', 'parer']);
            $table->string('bruto');
            $table->string('potongan_keranjang');
            $table->string('hasil_kerja_netto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_hasil_kerja_umums');
    }
};
