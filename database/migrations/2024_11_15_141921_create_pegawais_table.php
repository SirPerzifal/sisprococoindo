<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama');
            $table->date('tgl_join');
            $table->date('tgl_out')->nullable();
            $table->string('posisi');
            $table->string('departemen');
            $table->string('status');
            $table->string('email')->unique();
            $table->timestamps();
            $table->primary('id_pegawai');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
