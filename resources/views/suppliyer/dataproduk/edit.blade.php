@extends('admin.templates.default')
@section('content')
 <div class="box">
        <div class="box-header">
            <h2 class="box-title">EDIT DATA PRODUK</h2>
        </div>
            <div class="box-body">
                <form action="{{ route('suppliyerproduk.update', $produk->id) }}" 
                    method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    @if ($supplier != null)
                        <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">
                    @endif
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    {{-- <div class="control-group">
                            <label for="autosize" class="control-label"> Foto Profile <i>
                                <span style="color: red"> <br /> *</span>
                                <span style="color: red"> Max: 300 Kb</span></i>
                            </label>
                            <div class="controls">
                                <input type="file" name="foto" id="text1"
                                    class="span6 input-tooltip @error('foto') is-invalid @enderror"
                                    data-original-title="Masukkan Foto Profile" data-placement="bottom" />
                                <img width="150" src="{{ asset($produk->foto) }}" alt="">
                            </div>
                        @error('foto')
                            <div class="alert alert-danger">Upload foto profil Anda, Ukuran gambar tidak
                                boleh lebih dari
                                300kb!
                            </div>
                        @enderror
                    </div> --}}
                    <div class="control-group">
                        <label for="autosize" class="control-label">FOTO <br> <b
                                style="color:red; font-size:12px">*</b><b style="font-size:12px"><i>Max
                                    Size 300kb</i></b></label>
                        <div class="controls">
                            <input type="file" name="foto" id="text1"
                                class="span6 input-tooltip @error('foto') is-invalid @enderror"
                                data-original-title="Masukkan Foto" data-placement="bottom" />
                            <img width="150" src="{{ url ('/admin/assets/covers/'. $produk->foto) }}" alt="">
                            @error('foto')
                                <div class="alert alert-danger">Maaf, Ukuran gambar tidak boleh lebih dari
                                    300kb!
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group @error('katagori') has-error @enderror">
                        <label for="">KATAGORI PRODUK</label>
                        <select name="katagori_id" id="" class="form-control select2">
                            @foreach ($katagori as $kt)
                                    <option value="{{ $kt->id}}">{{ $kt->nama_katagori}}</option>
                            @endforeach
                        </select>
                        @error('katagori')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('kode_barang') has-error @enderror">
                         <label for="">KODE PRODUK</label>
                            <input type="text" name="kode_barang" class="form-control" placeholder=""
                            value="{{ $produk->kode_barang  }}">
                            @error('kode_barang')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('nama') has-error @enderror">
                         <label for="">NAMA PRODUK</label>
                            <input type="text" name="nama" class="form-control" placeholder=""
                            value="{{ $produk->nama  }}">
                            @error('nama')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('harga_pembelian') has-error @enderror">
                         <label for="">HARGA PEMBELIAN</label>
                            <input type="number" name="harga_pembelian" class="form-control" placeholder="Masukkan harga pembelian"
                            value="{{ old('harga_pembelian') ?? $produk->harga_pembelian }}">
                            @error('harga_pembelian')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('harga_penjualan') has-error @enderror">
                         <label for="">HARGA PENJUALAN</label>
                            <input type="number" name="harga_penjualan" class="form-control" placeholder="Masukkan harga penjualan"
                            value="{{ old('harga_penjualan') ?? $produk->harga_penjualan }}">
                            @error('harga_penjualan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('stok') has-error @enderror">
                         <label for="">QUANTITY</label>
                            <input type="text" name="stok" class="form-control" placeholder="Masukkan stok"
                            value="{{ old('stok') ?? $produk->stok }}">
                            @error('stok')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    {{-- <div class="form-group @error('keterangan') has-error @enderror">
                         <label for="">KETERANGAN</label>
                            <textarea type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan">
                                {{ $produk->keterangan ?? old('keterangan') }}
                            </textarea>
                            @error('keterangan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div> --}}
                    <div class="form-group">
                        <input type="submit" value="UPDATE DATA" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection