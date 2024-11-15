<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_timbangan_umums', function (Blueprint $table) {
            $table->id('id_detail_timbangan');
            $table->unsignedBigInteger('id_laporan_hasil_kerja');
            $table->foreign('id_laporan_hasil_kerja')
                  ->references('id_laporan_hasil_kerja')
                  ->on('laporan_hasil_kerja_umums')
                  ->onDelete('cascade');
            $table->date('tanggal');
            $table->string('nama_pegawai');
            $table->integer('hasil_timbangan');
            $table->string('total_timbangan');
            $table->string('jenis_keranjang');
            $table->string('jumlah_keranjang');
            $table->string('total_potongan_keranjang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_timbangan_umums');
    }
};
