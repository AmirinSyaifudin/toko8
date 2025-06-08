<?php

namespace App\Http\Controllers\Suppliyer;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if ($request->ajax() )
        {
            $data   = Produk::select(
                'produk.id',
                'produk.kode',
                'produk.nama',
                'produk.harga_pembelian',
                'produk.harga_penjualan',
                'produk.stok',
                'produk.unit',
                'produk.keterangan',
                'katagori.id',
                'katagori.nama_katagori',
            )
            ->join('katagori','produk.katagori_id', '=', 'katagori.id')
            ->orderBy('created_at','desc');

            return datatables::of($data)
                    ->editColumn('foto', function ($row) {
                        return '<img with="80" height="80" src="' . url('admin/assets/covers/', $row->foto) . '">';
                    })
                    ->addColumn('action', function ($row) {
                    //EDIT
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                        data-id="' . $row->karyawan_id . '" 
                        data-no_ind="' . $row->no_induk . '"  
                        data-title="' . $row->nama . '"   
                        data-email_oke="' . $row->email . '"  
                        data-jenis_kelaminid="' . $row->jenis_kelamin . '" 
                        data-date="' . $row->tanggal_lahir . '"
                        data-date="' . $row->tanggal_bergabung . '"
                        data-alamat="' . $row->alamat . '" 
                    data-original-title="Edit" class="edit btn btn-info btn-sm editKaryawan">EDIT</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  
                        data-karyawan_id="' . $row->karyawan_id . '" 
                        data-original-title="Delete" 
                        class="btn btn-danger btn-sm deleteKaryawan">DETELE</a>';

                    return $btn;
                })
                ->rawColumns(['action','foto'])
                ->toJson();
                exit();
        }

        $katagori = Katagori::all();

        return view('suppliyer.dataproduk.index', compact('katagori'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suppliyer.dataproduk.create',[
            'kode'               =>'kode',
            'nama'               =>'nama',
            'foto'               =>'foto',
            'harga_pembelian'    =>'harga_pembelian',
            'harga_penjualan'    =>'harga_penjualan',
            'stok'               =>'stok',
            'unit'               =>'unit',
            'keterangan'         =>'keterangan',
            'katagori'           => Katagori::orderBy('nama_katagori','ASC')->get(),
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
        $produk                 = new Produk;
        $produk->kode           = $request->input('kode');
        $produk->nama           = $request->input('nama');
        $produk->katagori_id    = $request->input('katagori_id');
        $produk->harga_pembelian= $request->input('harga_pembelian');
        $produk->harga_penjualan= $request->input('harga_penjualan');
        $produk->stok           = $request->input('stok');
        $produk->unit           = $request->input('unit');
        $produk->keterangan     = $request->input('keterangan');

          if ($request->hasFile('foto')) {
            $file  = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/assets/covers/', $filename);
            $produk->foto = $filename;
        }

        $produk->save();

        return redirect()->route('suppliyerproduk')
        ->with('success','Data Produk Berhasil Di Tambahkab !!!');

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
    public function edit( $id)
    {
         $produk   = DB::table('produk')
                ->where('id', $id)
                ->first();

                return response()->json($produk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request,[
            'kode'              => 'required|min:3',
            'nama'              => 'required|min:3',
            'harga_penjualan'   => 'required|min:3',
            'harga_pembelian'   => 'required|min:3',
            'stok'              => 'required|min:3',
            'unit'              => 'required|min:3',
            'keterangan'        => 'required|min:3'
        ]);

        $produk->update($request->only(
            'nama',
            'kode',
            'harga_pembelian',
            'harga_penjualan',
            'stok',
            'unit',
            'keterangan'
        ));
        
        return redirect()->route('suppliyerproduk')
        ->with('info',' Data Produk Berhasil Di Update !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       Produk::where('katagori_id', $request->id)->delete();
        return response()->json();
    }
}
