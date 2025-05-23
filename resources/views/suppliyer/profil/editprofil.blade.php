@extends('admin.templates.default')

@section('content')
<div class="box">
        <div class="box-header">
            <h2 class="box-title">UPDATE DATA SUPPLIYER</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('datasuppliyer.store') }}" method="POST">
                @csrf
                    <div class="form-group @error('foto') has-error @enderror">
                        <label for="">FOTO</label>
                        <input type="file" name="foto" class="form-control">
                        @error('foto')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('nama') has-error @enderror">
                        <label for="">NAMA</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama nama" value="{{ old('nama') }}"> 
                        @error('nama')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                     <div class="form-group @error('tgl_lahir') has-error @enderror">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                        <input type="date" name="tgl_lahir" class="form-control" 
                            placeholder="" value=""  required>
                        @error('tgl_lahir')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('tmpt_lahir') has-error @enderror">
                        <label for="">TEMPAT LAHIR</label>

                        <input type="text" name="tmpt_lahir" class="form-control" placeholder="Masukkan Nama tmpt_lahir" value="{{ old('tmpt_lahir') }}"> 
                        @error('tmpt_lahir')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="">EMAIL</label>
                
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Nama email" value="{{ old('email') }}"> 
                        @error('email')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                     <div class="form-group @error('kontak_suplier') has-error @enderror">
                        <label for="">KONTAK SUPPLIYER</label>
               
                        <input type="text" name="kontak_suplier" class="form-control" placeholder="Masukkan Nama  " value="{{ old('kontak_suplier') }}"> 
                        @error('kontak_suplier')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                     <div class="form-group @error('no_telpon') has-error @enderror">
                        <label for="">NO TELPON</label>

                        <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nama no_telpon" value="{{ old('no_telpon') }}"> 
                        @error('no_telpon')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('alamat') has-error @enderror">
                        <label for="">ALAMAT</label>

                        <textarea name="alamat" id="" row="3" class="form-control" placeholder="Masukkan Deskripsi Buku">{{ old('alamat') }}</textarea>
                        @error('keterangan')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">DESKRIPSI</label>

                        <textarea name="keterangan" id="" row="3" class="form-control" placeholder="Masukkan Deskripsi Buku">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{-- <input type="submit" value="Tambah" class ="btn btn-primary"> --}}
                        <input type="submit" value="UPDATE PROFIL SUPPLIYER" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection