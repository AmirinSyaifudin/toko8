<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suppliyer;
use Illuminate\Http\Request;

class SuppliyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datasuppliyer.index', [
            'nama'              => 'nama',
            'tgl_lahir'         => 'tgl_lahir',
            'tmpt_lahir'        => 'tmpt_lahir',
            'email'             => 'email',
            'kontak_suplier'   => 'kontak_suplier',
            'no_telpon'         => 'no_telpon',
            'alamat'            => 'alamat',
            'keterangan'        => 'keterangan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datasuppliyer.create', [
            'nama'              => 'nama',
            'tgl_lahir'         => 'tgl_lahir',
            'tmpt_lahir'        => 'tmpt_lahir',
            'email'             => 'email',
            'kontak_suplier'   => 'kontak_suplier',
            'no_telpon'         => 'no_telpon',
            'alamat'            => 'alamat',
            'keterangan'        => 'keterangan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nama'              => 'required|min:3',
            'foto'              => 'file|image', // dalam bentuk file format image
            'tgl_lahir'         => 'required',
            'tmpt_lahir'        => 'required',
            'email'             => 'required',
            'kontak_suplier'    => 'required',
            'no_telpon'         => 'required',
            'alamat'            => 'required',
            'keterangan'        => 'required'
        ]);

        //   if ($request->hasFile('foto')) {
        //     $file  = $request->file('foto');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('assets/covers/', $filename);
        //     $suppliyer->foto = $filename;
        // }


        Suppliyer::create([
            'nama'             => $request->nama,
            'foto'             => $foto,
            'tgl_lahir'        => $request->tgl_lahir,
            'tmpt_lahir'       => $request->tmpt_lahir,
            'email'            => $request->email,
            'kontak_suplier'   => $request->kontak_suplier,
            'no_telpon'        => $request->no_telpon,
            'alamat'           => $request->alamat,
            'keterangan'       => $request->keterangan
        ]);

        return redirect()->route('datasuppliyer')
        ->with('success', 'Data Suppliyer Berhasil di Tambahkan !!!');
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
        //
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
