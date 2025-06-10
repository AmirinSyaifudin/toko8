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
        $produk      = Produk::all();

        // return view('frontend.templates.default', compact('katagori','produk'));
         return view('frontend.templates.homepage', compact('katagori','produk'));
    }

    public function frontendproduk()
    {

        return view('frontend.produk.index');
    }

    public function katalogproduk($id)
    {
        $katagori   = Katagori::all();
        // $produk  = Produk::all();
        // dd($katagori, $produk);

        // $produk = DB::table('produk')
        //     ->join('katagori', 'produk.katagori_id', '=', 'katagori.id')
        //     ->select(
        //         'produk.*',
        //         'produk.kode',
        //         'produk.nama',
        //         'produk.foto',
        //         'produk.harga_pembelian',
        //         'produk.harga_penjualan',
        //         'produk.unit',
        //         'produk.stok',
        //         'produk.keterangan',
        //         'katagori.id',
        //         'katagori.nama_katagori'
        //     )
        //     ->where('katagori.katagori_id', $id)
        //     ->get();
        //     dd($produk, $katagori);
            
        // $katagori = DB::table('katagori')
        //     ->orderBy('nama_katagori', 'ASC')
        //     ->get();
        // $data = array(
        //     'produk'    => $produk,
        //     'katagori'   => $katagori
        // );

        // dd($data);
        return view('frontend.produk.katalogproduk', compact('katagori'));
        //  return view('frontend.produk.katalogproduk', $data);
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
