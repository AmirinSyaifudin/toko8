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
        return datatables()->of(Produk::query())->toJson();
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
