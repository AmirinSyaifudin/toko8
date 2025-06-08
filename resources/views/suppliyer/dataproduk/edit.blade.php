@extends('admin.templates.default')
@section('content')
 <div class="box">
        <div class="box-header">
            <h2 class="box-title">EDIT DATA PRODUK</h2>
        </div>
            <div class="box-body">
                <form action="{{ route('suppliyerproduk.update', $produk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    {{-- <div class="form-group @error('cover') has-error @enderror">
                        <label for="">FOTO</label>
                        <input type="file" name="foto" class="form-control">
                        @error('foto')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div> --}}

                    <div class="control-group">
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
                    <div class="form-group @error('kode') has-error @enderror">
                         <label for="">KODE PRODUK</label>
                            <input type="text" name="kode" class="form-control" placeholder=""
                            value="{{ $produk->kode  }}">
                            @error('kode')
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
                            <input type="text" name="harga_pembelian" class="form-control" placeholder="Masukkan harga pembelian"
                            value="{{ old('harga_pembelian') ?? $produk->harga_pembelian }}">
                            @error('harga_pembelian')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('harga_penjualan') has-error @enderror">
                         <label for="">HARGA PENJUALAN</label>
                            <input type="text" name="harga_penjualan" class="form-control" placeholder="Masukkan harga penjualan"
                            value="{{ old('harga_penjualan') ?? $produk->harga_penjualan }}">
                            @error('harga_penjualan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('unit') has-error @enderror">
                         <label for="">UNIT</label>
                            <input type="text" name="unit" class="form-control" placeholder="Masukkan unit"
                            value="{{ old('unit') ?? $produk->unit }}">
                            @error('unit')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('stok') has-error @enderror">
                         <label for="">STOK</label>
                            <input type="text" name="stok" class="form-control" placeholder="Masukkan stok"
                            value="{{ old('stok') ?? $produk->stok }}">
                            @error('stok')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('keterangan') has-error @enderror">
                         <label for="">KETERANGAN</label>
                            <textarea type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan">
                                {{ $produk->keterangan ?? old('keterangan') }}
                            </textarea>
                            @error('keterangan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    {{-- <div class="form-group @error('nama') has-error @enderror">
                         <label for="">NAMA PRODUK</label>
                            <input type="text" name="nama" class="form-control"
                            value="{{ $produk->nama }}">
                    </div> --}}
                    <div class="form-group">
                        <input type="submit" value="Ubah" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection