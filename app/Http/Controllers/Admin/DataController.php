<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Katagori;
use App\Models\Produk;
use App\Models\Suppliyer;
use Illuminate\Http\Request;

class DataController extends Controller
{
      public function adminkatagori()
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

    // public function produks()
    // {
    //     $produks   = Produk::with('katagori')->orderBy('nama','ASC');
    //     $produks->load('katagori');

    //     return datatables()->of($produks)
    //                     ->addColumn('katagori', function (Produk $model) {
    //                         return $model->katagori->nama_katagori;
    //                     })
    //                     ->addColumn('action','suppliyer.dataproduk.action')
    //                     ->addIndexColumn()
    //                     ->rawColumns(['action'])
    //                     ->toJson();

    // }
    

    public function suppliyer()
    {
        // return datatables()->of(Suppliyer::query())->toJson();
        $suppliyer = Suppliyer::orderBy('nama', 'ASC');
        
            return datatables()->of($suppliyer)
                       ->editColumn('foto', function ($row) {
                                return '<img with="80" height="80" src="' . url('admin/assets/covers/', $row->foto) . '">';
                            })
                        ->addColumn('action', 'admin.datasuppliyer.action')
                        ->addIndexColumn()
                        ->addColumns(['foto','action'])
                        ->toJson();
    }

     public function customer()
    {
        // return datatables()->of(Customer::query())->toJson();
        $customer  = Customer::orderBy('nama_customer','ASC');

                return datatables()->of($customer)
                ->editColumn('foto', function ($row) {
                                return '<img with="80" height="80" src="' . url('admin/assets/covers/', $row->foto) . '">';
                            })
                ->addColumn('action','admin.datacustomer.action')
                ->addIndexColumn()
                ->addColumns(['foto','action'])
                ->toJson();
    }

    // public function produk()
    // {
    //     return datatables()->of(Produk::query())->toJson();
    // }

   

   
}
