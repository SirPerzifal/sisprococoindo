<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_laporans', function (Blueprint $table) {
            $table->id('id_jenis_laporan');
            $table->string('nama_jenis_laporan');
            $table->timestamps();
            $table->primary('id_jenis_laporan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_laporans');
    }
};
