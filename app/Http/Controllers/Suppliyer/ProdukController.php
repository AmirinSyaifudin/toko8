<?php

namespace App\Http\Controllers\Suppliyer;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Produk;
use Carbon\Carbon;
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
    public function index()
    {
        $suppliyerproduk = Produk::all();

        return view('suppliyer.dataproduk.index', compact('suppliyerproduk'));
        // return view('suppliyer.dataproduk.index',[
        //     'kode'               =>'kode',
        //     'nama'               =>'nama',
        //     'harga_pembelian'    =>'harga_pembelian',
        //     'harga_penjualan'    =>'harga_penjualan',
        //     'stok'               =>'stok',
        //     'unit'               =>'unit',
        //     'keterangan'         =>'keterangan'
        // ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tanggal  = Carbon::now();
        // $thnBulan = $now->year . $now->month;
        // $kodeBarang = Produk::generateKodeBarang();
         $kodeBarang = Produk::generateKode();
         $defaultHarga = 0;
         $hargaFormatted = formatRupiah($defaultHarga);
         $katagori   = Katagori::all();
       
        return view('suppliyer.dataproduk.create', compact('kodeBarang', 'katagori','hargaFormatted','defaultHarga'));
        // return view('suppliyer.dataproduk.create',[
        //     'kode'               =>'kode',
        //     'nama'               =>'nama',
        //     'foto'               =>'foto',
        //     'harga_pembelian'    =>'harga_pembelian',
        //     'harga_penjualan'    =>'harga_penjualan',
        //     'stok'               =>'stok',
        //     'unit'               =>'unit',
        //     'keterangan'         =>'keterangan',
        //     'katagori'           => Katagori::orderBy('nama_katagori','ASC')->get(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'kode'              => 'required|min:3',
        //     'nama'              => 'required|min:3',
        //     'harga_pembelian'   => 'required|min:3',
        //     'harga_penjualan'   => 'required|min:3',
        //     'stok'              => 'required|min:3',
        //     'unit'              => 'required|min:3',
        //     'keterangan'        => 'required|min:3'
        // ]);
    // Konversi dari format Rupiah ke angka
        $harga = str_replace(['Rp', '.', ' '], '', $request->harga);
        $harga = (int)$harga;

        $produk                 = new Produk;
        $produk->kode           = $request->input('kode');
        $produk->nama           = $request->input('nama');
        $produk->katagori_id    = $request->input('katagori_id');
        // $produk->harga_pembelian= $request->input('harga_pembelian');
        // $produk->harga_penjualan= $request->input('harga_penjualan');

        $produk->harga_pembelian= $harga;
        $produk->harga_penjualan= $harga;
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
     public function edit($id)
    {
        $katagori = Katagori::all();
        $produk  = Produk::findOrFail($id);
        return view('suppliyer.dataproduk.edit', compact('produk','katagori'));
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
        // $this->validate($request,[
        //     'kode'              => 'required|min:3',
        //     'nama'              => 'required|min:3',
        //     'harga_penjualan'   => 'required|min:3',
        //     'harga_pembelian'   => 'required|min:3',
        //     'stok'              => 'required|min:3',
        //     'unit'              => 'required|min:3',
        //     'keterangan'        => 'required|min:3'
        // ]);

        $filename = '';
        if ($request->hasFile('foto')) {
            $file  = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/assets/covers/', $filename);

            
        }

        DB::table('produk')
            ->where('katagori_id', $request->id)
            ->update([
                'kode'            => $request->kode,
                'nama'            => $request->nama,
                'katagori_id'     => $request->katagori_id,
                'harga_pembelian' => $request->harga_pembelian,
                'harga_penjualan' => $request->harga_penjualan,
                'stok'            => $request->stok,
                'unit'            => $request->unit,
                'keterangan'      => $request->keterangan,
            ]);

        // $produk->update($request->only(
        //     'nama',
        //     'kode',
        //     'harga_pembelian',
        //     'harga_penjualan',
        //     'stok',
        //     'unit',
        //     'keterangan'
        // ));
        
        return redirect()->route('suppliyerproduk')
        ->with('info',' Data Produk Berhasil Di Update !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk,Request $request)
    {
        $produk->delete();
        //  Produk::where('katagori_id', $request->id)->delete();
         
        return redirect()->route('suppliyerproduk')
        ->with('danger','Data Katagori Berhasil di Hapus !!!');
        
    }
}

 // public function index(Request $request)
    // {        
    //     if ($request->ajax() )
    //     {
    //         $data   = Produk::select(
    //             'produk.id',
    //             'produk.kode',
    //             'produk.nama',
    //             'produk.harga_pembelian',
    //             'produk.harga_penjualan',
    //             'produk.stok',
    //             'produk.unit',
    //             'produk.keterangan',
    //             'katagori.katagori_id',
    //             'katagori.nama_katagori',
    //         )
    //         ->join('katagori','produk.katagori_id', '=', 'katagori.id')
    //         ->orderBy('created_at','desc');

    //         return datatables::of($data)
    //                 ->editColumn('foto', function ($row) {
    //                     return '<img with="80" height="80" src="' . url('admin/assets/covers/', $row->foto) . '">';
    //                 })
    //                 ->addIndexColumn()
    //                 ->addColumn('action', function ($row) {
    //                   $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
    //                     data-id="' . $row->id . '" 
    //                     data-title="' . $row->nama . '" 
    //                     data-original-title="Edit" 
    //                     class="edit btn btn-primary btn-sm editProduk">EDIT</a>';
    //                 $btn .= '&nbsp;&nbsp;';
    //                 $btn .= '&nbsp;&nbsp;';

    //                 $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id .'" 
    //                                     data-original-title="Delete" class="btn btn-danger btn-sm deleteProduk">Delete
    //                             </a>';
    //                 return $btn;
    //             })
    //             ->rawColumns(['action','foto'])
    //             ->toJson();
    //             exit();
    //     }

    //     $katagori = Katagori::all();

    //     return view('suppliyer.dataproduk.index', compact('katagori'));   
    // }


    // public function edit(Produk $produk, $id)
    // {
    //     $produk   = DB::table('produk')
    //             ->where('id', $id)
    //             ->first();

    //             return response()->json($produk);
    // }

    //   public function edit(Produk $produk)
    // {
    //     return view('suppliyer.dataproduk.edit', [
    //         // 'kode' => 'Ubah data kode',
    //         // 'nama' => 'Ubah data nama',
    //         // 'harga_pembelian' => 'Ubah data harga_pembelian',
    //         // 'harga_penjualan' => 'Ubah data harga_penjualan',
    //         // 'stok' => 'Ubah data stok',
    //         // 'unit' => 'Ubah data unit',
    //         // 'keterangan' => 'Ubah data keterangan',
    //         'title' => 'Ubah data produk',
    //         'produk' => $produk,
    //         'katagori' => Katagori::orderBy('nama_katagori', 'ASC')->get(),
    //     ]);
    // }


    //   public function index()
    // {
    //     return view('suppliyer.dataproduk.index',[
    //         'kode'               =>'kode',
    //         'nama'               =>'nama',
    //         'harga_pembelian'    =>'harga_pembelian',
    //         'harga_penjualan'    =>'harga_penjualan',
    //         'stok'               =>'stok',
    //         'unit'               =>'unit',
    //         'keterangan'         =>'keterangan'
    //     ]);
    // }


    //  public function edit(Produk $produk, $id)
    // {
    //     $produk   = DB::table('produk')
    //             ->where('id', $id)
    //             ->first();

    //             return response()->json($produk);

    //     // return view('suppliyer.dataproduk.edit',[
    //     //     'kode'              => 'Edit kode',
    //     //     'nama'              => 'Edit Data Nama',
    //     //     'harga_pembelian'   => 'Edit harga_pembelian',
    //     //     'harga_penjualan'   => 'Edit harga_penjualan',
    //     //     'stok'              => 'Edit stok',
    //     //     'unit'              => 'Edit unit',
    //     //     'keterangan'        => 'Edit keterangan',
    //     //     'produk'            => $produk
    //     // ]);
    // }