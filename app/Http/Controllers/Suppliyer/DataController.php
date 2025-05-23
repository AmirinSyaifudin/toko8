<?php

namespace App\Http\Controllers\Suppliyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class DataController extends Controller
{
    public function produk()
    {
        return datatables()->of(Produk::query())->toJson();
    }
}
