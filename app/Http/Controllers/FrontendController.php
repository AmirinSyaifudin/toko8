<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function homepage()
    {
        $katagori   = Katagori::all();
        // $produk      = Produk::all();
        $produk      = Produk::paginate(15);

         return view('frontend.templates.homepage', compact('katagori','produk'));
    }

    public function frontendproduk()
    {

        return view('frontend.produk.index');
    }

    public function katalogproduk($id)
    {
        $katagori   = Katagori::all();
        $produk     = Produk::where('katagori_id', $id)
                            ->with('katagori')
                            ->get();

        // dd($katagori, $produk);
        return view('frontend.produk.katalogproduk', compact('katagori','produk'));
    }

    public function frontdetailproduk($id)
    {
        $katagori   = Katagori::all();
        $produk     = Produk::findOrFail($id);

        return view('frontend.produk.detail', compact('katagori','produk'));
    }

    public function frontkontak()
    {
        return view('frontend.kontak.inde');
    }

}
