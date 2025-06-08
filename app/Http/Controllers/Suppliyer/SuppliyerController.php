<?php

namespace App\Http\Controllers\Suppliyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Suppliyer;

class SuppliyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('suppliyer.index');
    }

    public function profil()
    {
        $user           = User::where('id', auth()->user()->id)->first();
        $dataprofil      = Suppliyer::where('user_id', auth()->user()->id)->first();

        if ($dataprofil == null ) {
            return view('suppliyer.profil.profil', compact('user','dataprofil'));
        } else {
            return view('suppliyer.profil.profil', compact('user','dataprofil'));
        }
        
        return view('suppliyer.profil.profil');
    }

    // public function supliyerproduk()
    // {

    //     return view('suppliyer.dataproduk.index');
    // }

    public function editprofil()
    {
        return view('suppliyer.profil.editprofil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suppliyer.profil.setting');
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

        $suppliyer                   = new Suppliyer;
        $suppliyer->nama             = $request->input('nama');
        $suppliyer->user_id          = $request->input('user_id');
        $suppliyer->tgl_lahir        = $request->input('tgl_lahir');
        $suppliyer->tmpt_lahir       = $request->input('tmpt_lahir');
        $suppliyer->email            = $request->input('email'); 
        $suppliyer->no_telpon        = $request->input('no_telpon');
        $suppliyer->kontak_suplier   = $request->input('kontak_suplier ');
        $suppliyer->alamat           = $request->input('alamat');
        $suppliyer->keterangan       = $request->input('keterangan');
    
        if ($request->hasFile('foto')) {
                $file  = $request->file('foto');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('admin/assets/covers/', $filename);
                $suppliyer->foto = $filename;
        }

        $suppliyer->save();

        return redirect()->route('profilsuppliyer');
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
        $data  = Suppliyer::findOrFail($id);
        return view('suppliyer.profil.editprofil', compact('data'));
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
        //
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
