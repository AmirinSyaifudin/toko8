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

    public function suppliyer()
    {
        // return datatables()->of(Suppliyer::query())->toJson();
        $suppliyer = Suppliyer::orderBy('nama', 'ASC');
            return datatables()->of($suppliyer)
                        //   ->editColumn(
                        //         'cover',
                        //         function (Suppliyer $model) {
                        //             return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
                        //         }
                        //     )
                        ->addColumn('action', 'admin.datasuppliyer.action')
                        ->addIndexColumn()
                        ->addColumns(['action'])
                        ->toJson();
    }

     public function customer()
    {
        // return datatables()->of(Customer::query())->toJson();
        $customer  = Customer::orderBy('nama_customer','ASC');
                return datatables()->of($customer)
                ->addColumn('action','admin.datacustomer.action')
                ->addIndexColumn()
                ->addColumns(['action'])
                ->toJson();
    }

    public function produk()
    {
        return datatables()->of(Produk::query())->toJson();
    }

   

   
}
