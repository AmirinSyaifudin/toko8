@extends('admin.templates.default')
@section('content')
<div class="box">
        <div class="box-header">
            <h2 class="box-title">ADDA KATAGORI</h2>
        </div>
            <div class="box-body">
                <form action="{{ route('katagori.store') }}" method="POST">
                @csrf
                    <div class="form-group @error('nama_katagori') has-error @enderror">
                        <label for="">NAMA</label>
                        <input type="text" name="nama_katagori" class="form-control" placeholder="Masukkan Nama nama_katagori" value="{{ old('nama_katagori') }}"> 
                        @error('nama_katagori')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Nama keterangan" value="{{ old('keterangan') }}"> 
                        @error('keterangan')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Tambah" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection