<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use App\Models\Produk;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        $katagori   = Katagori::all();
        $produk      = Produk::all();

        // return view('frontend.templates.default', compact('katagori','produk'));
         return view('frontend.templates.homepage', compact('katagori','produk'));
    }

    public function frontendproduk()
    {

        return view('frontend.produk.index');
    }

    public function frontdetailproduk()
    {
        $katagori   = Katagori::all();
        $produk      = Produk::all();

        return view('frontend.produk.detail', compact('katagori','produk'));
        // return view('frontend.produk.detail');
    }

    public function frontkontak()
    {
        return view('frontend.kontak.inde');
    }

}
