<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapController extends Controller
{
    //
    public function dkp()
    {
        return view('rekap_laporan.dkp');
    }
    public function kulitari()
    {
        return view('rekap_laporan.kulit_ari');
    }
    // Tambahkan fungsi untuk halaman lain jika perlu

    public function air_kelapa()
    {
        return view('rekap_laporan.air_kelapa');
    }
    public function serabut_kelapa()
    {
        return view('rekap_laporan.serabut_kelapa');
    }

    public function tempurung()
    {
        return view('rekap_laporan.tempurung');
    }

   
}


