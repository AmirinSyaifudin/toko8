@extends('admin.templates.default')

@section('content')
<div class="box">
        <div class="box-header">
            <h2 class="box-title">UPDATE DATA CUSTOMER</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('update', $data->id) }}" method="POST"
                     enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                    <div class="form-group @error('foto') has-error @enderror">
                        <label for="">FOTO</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group @error('nama_customer') has-error @enderror">
                        <label for="">NAMA CUSTOMER</label>
                        <input type="text" name="nama_customer" class="form-control"  value="{{ $data->nama_customer }}"> 
                    </div>
                     <div class="form-group @error('tgl_lahir') has-error @enderror">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                        <input type="date" name="tgl_lahir" class="form-control" 
                         placeholder="" value="" value="{{ $data->tgl_lahir }}" required>
                    </div>
                    <div class="form-group @error('tmpt_lahir') has-error @enderror">
                        <label for="">TEMPAT LAHIR</label>
                        <input type="text" name="tmpt_lahir" class="form-control" placeholder="Masukkan Nama TEMPAT LAHIT" value="{{ $data->tmpt_lahir }}"> 
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="">EMAIL</label>
                        <input type="email" name="email" class="form-control" value="{{ $data->email }}" readonly> 
                    </div>
                     <div class="form-group @error('kontak_suplier') has-error @enderror">
                        <label for="">KONTAK CUSTOMER</label>
                        <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nama  " value="{{ $data->no_telpon }}"> 
                    </div>
                    <div class="form-group @error('alamat') has-error @enderror">
                        <label for="">ALAMAT</label>
                        <textarea name="alamat" id="" row="3" class="form-control" placeholder="Masukkan Deskripsi Buku">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">DESKRIPSI</label>
                        <textarea name="keterangan" id="" row="3" class="form-control" placeholder="Masukkan Deskripsi Buku">{{ $data->keterangan }}</textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-large btn-block btn-primary">
                        UPDATE & PUBLISH
                    </button> 
                    </div>
                </form>
            </div>
    </div>
@endsection