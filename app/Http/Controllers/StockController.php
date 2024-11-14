<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function kopra_kering()
    {
        return view('card_stock.kopra_kering');
    }

    public function kopra_basah()
    {
        return view('card_stock.kopra_basah');
    }

    public function dkp()
    {
        return view('card_stock.dkp');
    }

    public function minyak_kelapa()
    {
        return view('card_stock.minyak_kelapa');
    }

    public function kulit_ari_kering()
    {
        return view('card_stock.kulit_ari_kering');
    }

    public function tempurung_basah()
    {
        return view('card_stock.tempurung_basah');
    }
}
