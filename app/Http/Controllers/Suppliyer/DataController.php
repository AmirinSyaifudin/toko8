<?php

namespace App\Http\Controllers\Suppliyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Katagori;

class DataController extends Controller
{
    public function produk()
    {
        $produk   = Produk::with('katagori')->orderBy('nama','ASC');
        // $produk  = Produk::orderBy('nama','ASC');
        // $produk->load('katagori');
        
        return datatables()->of($produk)
                        // ->editColumn(
                        //     'foto', function (Produk $model) {
                        //         return '<img src= "' . $model->getFoto() .'" height="300px">';

                        //     })
                        ->editColumn('foto', function ($row) {
                                return '<img with="80" height="80" src="' . url('admin/assets/covers/', $row->foto) . '">';
                            })
                        //  ->addColumn('katagori', function (Produk $model) {
                        //         return $model->katagori->nama_katagori; // untuk memanggil relasi dan mengubah tampilan id angga menjadi nama author
                        //     })
                        ->addColumn('action','suppliyer.dataproduk.action')
                        ->addIndexColumn()
                        ->rawColumns(['foto','action'])
                        ->toJson();

    }

     public function katagori()
    {
        //  return datatables()->of(Katagori::orderBy('nama_katagori','ASC'))
        //                                 ->toJson();

           $katagori = Katagori::orderBy('nama_katagori', 'ASC');      
           return datatables()->of($katagori)
                        ->addColumn('action', 'suppliyer.katagori.action')
                        ->addIndexColumn() // membuat no urut
                        ->rawColumns(['action'])
                        ->toJson();
    }
}
