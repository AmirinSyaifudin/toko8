<?php

namespace App\Http\Controllers\Suppliyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katagori;
use Illuminate\Support\Facades\DB;
use DataTables;

use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;


class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suppliyer.katagori.index', [
            'title'         => 'Data Katagori',
            'keterangan'    => 'Keterangan'
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('suppliyer.katagori.create', [
            'title' => 'Tambah Data Katagori',
            'keterangan'    => 'Keterangan'
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
            'nama_katagori' => 'required|min:3',
            'keterangan'    => 'required|min:3'
        ]);

        Katagori::create($request->only(
            'nama_katagori',
            'keterangan'
        ));

        return redirect()->route('katagori')
        ->with('success','Data Katagori Berhasil di Tambahkan !!!');
      
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
    public function edit(Katagori $katagori)
    {
         return view('suppliyer.katagori.edit',[
            'nama_katagori'  => 'Edit Data Katagori',
            'keterangan'     => 'Edit Data Keterangan',
            'katagori' => $katagori,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Katagori $katagori)
    {
        $this->validate($request,[
            'nama_katagori'  => 'required|min:3',
            'keterangan'     => 'required|min:3'
        ]);

        $katagori->update($request->only('nama_katagori','keterangan'));

        return redirect()->route('katagori')
        ->with('info','Data Katagori Berhasil di Update !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katagori $katagori)
    {
        $katagori->delete();

        return redirect()->route('katagori')
        ->with('danger','Data Katagori Berhasil di Hapus !!!');
        
    }
}
