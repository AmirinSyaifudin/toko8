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
        $supkatagori = Katagori::all();

        return view('suppliyer.katagori.index', compact('supkatagori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('suppliyer.katagori.create');
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

        return redirect()->route('suppliyerkatagori')
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
    public function edit(Katagori $katagori, $id)
    {
        $supkatagori  = Katagori::findOrFail($id);

         return view('suppliyer.katagori.edit', compact('supkatagori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'nama_katagori'  => 'required|min:3',
            'keterangan'     => 'required|min:3'
        ]);

        $data = $request->all();
        $supkatagori = Katagori::findorfail($id);
        $supkatagori->update($data);
       
        return redirect()->route('suppliyerkatagori')
         ->with('info','Data Katagori Berhasil di Update !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katagori $katagori, $id)
    {
        Katagori::findOrFail($id)->delete();

        return redirect()->back()
        ->with('danger','Data Katagori Berhasil di Hapus !!!');

        // $katagori->delete();
        // return redirect()->route('suppliyerkatagori')
        // ->with('danger','Data Katagori Berhasil di Hapus !!!');
        
    }
}
