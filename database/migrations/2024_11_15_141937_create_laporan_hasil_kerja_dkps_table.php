<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_hasil_kerja_dkps', function (Blueprint $table) {
            $table->id('id_laporan_hasil_kerja');
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('nama_sheller');
            $table->string('nama_parer1');
            $table->string('nama_parer2');
            $table->string('nama_parer3');
            $table->string('hasil_kerja_parer1');
            $table->string('hasil_kerja_parer2');
            $table->string('hasil_kerja_parer3');
            $table->string('hasil_kerja_sheller');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_hasil_kerja_dkps');
    }
};
