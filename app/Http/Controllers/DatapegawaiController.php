<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatapegawaiController extends Controller
{
    public function data_pegawai()
    {
        return view('data_pegawai');
    }

    public function edit_data_pegawai()
    {
        return view('edit_data_pegawai');
    }
}
