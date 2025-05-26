<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('customer.index');
    }

    public function dataproduk()
    {
        // 
        return view('customer.dataproduk');
    }

    public function profil()
    {
        $user           = User::where('id', auth()->user()->id)->first();
        $dataprofil     = Customer::where('user_id', auth()->user()->id)->first();
        // dd($user);
        //  dd($dataprofil);
        // dd($user, $dataprofil);
        if ($dataprofil == null ) {
            return view('customer.profil.profil', compact('user','dataprofil'));
        } else {
            return view('customer.profil.profil', compact('user','dataprofil'));
            // return view('customer.index');
        }
        // return view('customer.profil.profil');
    }

    public function editprofil()
    {

        return view('customer.profil.editcustomer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.profil.settingprofil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'foto'           => 'image|max:300|required',
        //     'user_id'        => 'required',
        //     'nama_customer'  => 'required',
        //     'tgl_lahir'      => 'required',
        //     'tmpt_lahir'     => 'required',
        //     'alamat'         => 'required',
        //     'no_telpon'      => 'required',
        //     'email'          => 'required',
        //     'keterangan'    => 'required'
        // ]);

        $customer                   = new Customer;
        $customer->nama_customer    = $request->input('nama_customer');
        $customer->user_id          = $request->input('user_id');
        $customer->tgl_lahir        = $request->input('tgl_lahir');
        $customer->tmpt_lahir       = $request->input('tmpt_lahir');
        $customer->email            = $request->input('email'); 
        $customer->no_telpon        = $request->input('no_telpon');
        $customer->alamat           = $request->input('alamat');
        $customer->keterangan       = $request->input('keterangan');
       
            if ($request->hasFile('foto')) {
                $file  = $request->file('foto');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('admin/assets/covers/', $filename);
                $customer->foto = $filename;
        }

        $customer->save();

        return redirect()->route('profilcustomer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::findOrFail($id);
        // dd($data);

        return view('customer.profil.editcustomer', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'nama_customer' => 'required',
        ]);

        $data  = $request->all();
        $customer  = Customer::findorfail($id);
        $customer->update($data);

        return redirect()->route('infocustomer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
