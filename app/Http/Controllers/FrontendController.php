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
        // $produk  = Produk::where('katagori_id', $id)
        //             ->with('katagori');

        $produk = DB::table('produk')
                ->join('katagori', 'produk.katagori_id', '=', 'katagori.id')
                ->where('katagori.id', 20)
                ->select('produk.*', 'katagori.nama_katagori')
                ->get();

        // $produk = Produk::where('katagori_id', 1)
        //   ->orderBy('harga_penjualan', 'desc')
        //   ->with('katagori')
        //   ->get();

        // $katagori = Katagori::findOrFail($id);
                    
        dd($katagori, $produk);

       

        // dd($data);
        return view('frontend.produk.katalogproduk', compact('katagori','produk'));
        //  return view('frontend.produk.katalogproduk', $data);
    }

    public function frontdetailproduk($id)
    {
        $katagori   = Katagori::all();
        $produk      = Produk::findOrFail($id);

        return view('frontend.produk.detail', compact('katagori','produk'));
        // return view('frontend.produk.detail');
    }

    public function frontkontak()
    {
        return view('frontend.kontak.inde');
    }

}
