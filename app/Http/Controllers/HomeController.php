<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Models\Customer as ModelsCustomer;
use App\Models\Katagori as ModelsKatagori;
use App\Models\Katagori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
       // return view('admin.templates.default');
        
        if(auth()->user()->role == 'customer') {
            $data = ModelsCustomer::all();
            return view('customer.home', compact('data'));
            // return view('admin.templates.default');
        } elseif (auth()->user()->role == 'admin') {
            $katagori = ModelsKatagori::all();
            return view('admin.templates.default', compact('katagori'));
        } else {
            return view('admin.templates.default');
        }
    } 
}
