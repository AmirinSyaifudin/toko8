@extends('admin.templates.default')
@section('content')
 <div class="box">
        <div class="box-header">
            <h2 class="box-title">EDIT DATA KATAGORI</h2>
        </div>
            <div class="box-body">
                <form action="{{ route('katagori.update', $katagori) }}" method="POST">
                @csrf
                @method("PUT")
                    <div class="form-group @error('nama_katagori') has-error @enderror">
                         <label for="">NAMA KATAGORI</label>
                            <input type="text" name="nama_katagori" class="form-control" placeholder="Masukkan Nama Katagori"
                            value="{{ old('nama_katagori') ?? $katagori->nama_katagori }}">
                            @error('nama_katagori')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group @error('keterangan') has-error @enderror">
                         <label for="">KETERANGAN</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Nama Keterangan"
                            value="{{ old('keterangan') ?? $katagori->keterangan }}">
                            @error('keterangan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ubah" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection