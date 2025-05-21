<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Katagori;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function katagori()
    {
     
        //  return datatables()->of(Katagori::orderBy('nama_katagori','ASC'))
        //                                 ->toJson();

           $katagori = Katagori::orderBy('nama_katagori', 'ASC');
           
           return datatables()->of($katagori)
                        ->addColumn('action', 'admin.katagori.action')
                        ->addIndexColumn() // membuat no urut
                        ->rawColumns(['action'])
                        ->toJson();
    }

    public function produk()
    {
        return datatables()->of(Produk::query())->toJson();
    }

    public function customer()
    {
        return datatables()->of(Customer::query())->toJson();
    }

    public function supplier()
    {
        return datatables()->of(Supplier::query())->toJson();
    }
}
