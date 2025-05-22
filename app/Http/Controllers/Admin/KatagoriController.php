<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
         return view('admin.katagori.index', [
            'title'         => 'Data Katagori',
            'keterangan'    => 'Keterangan'
         ]);

        // $katagori = Katagori::orderBy('nama_katagori','ASC');
        // if ($request->ajax() )
        // {
        //     $data = Katagori::latest()->get();
        //      return datatables::of($katagori)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {

        //             $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
        //                 data-id="' . $row->id . '" 
        //                 data-title="' . $row->nama_katagori . '" 
        //                 data-keterangan="' . $row->keterangan . '" 
        //                 data-original-title="Edit" 
        //                 class="edit btn btn-primary btn-sm editKatagori">EDIT</a>';
        //             $btn .= '&nbsp;&nbsp;';
        //             $btn .= '&nbsp;&nbsp;';
        //             $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-katagori_id="'.$row->katagori_id .'" 
        //                                 data-original-title="Delete" class="btn btn-danger btn-sm deleteKatagori">Delete
        //                          </a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);

        // }
        // return view('admin.katagori.index',compact('katagori'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.katagori.create', [
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
        // Katagori::updateOrCreate(
        //     [
        //         'id'            => $request->id
        //     ],
        //     [
        //         'nama_katagori' => $request->nama_katagori,
        //         'keterangan'    => $request->keterangan
        //     ]
        //     );
        //     return response()->json();
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
        return view('admin.katagori.edit',[
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
