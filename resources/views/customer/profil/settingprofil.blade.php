@extends('admin.templates.default')

@section('content')
<div class="box">
        <div class="box-header">
            <h2 class="box-title">SAVE DATA PROFIL CUSTOMER</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('saveprofil.store') }}" method="POST"
                 enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    {{-- <div class="form-group @error('foto') has-error @enderror">
                        <label for="autosize" class="control-label"> FOTO PROFIL <i><span
                              style="color: red">
                              <br /> *</span><span style="color: red"> Max: 300
                              Kb</span></i>
                        </label>
                        <input type="file" name="foto" id="text1"
                              class="span6 input-tooltip @error('foto') is-invalid @enderror"
                              data-original-title="Masukkan Foto Profile" data-placement="bottom" />
                        @error('foto')
                              <div class="invalid-feedback">
                                    <span style="color:red">
                                          Ukuran File tidak boleh lebih dari 300 Kb
                                    </span>
                              </div>
                        @enderror
                    </div> --}}
                    <div class="form-group @error('foto') has-error @enderror">
                        <label for="">FOTO</label>
                        <input type="file" name="foto" class="form-control"  
                        value="{{ old('foto') }}" required> 
                        @error('foto')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('nama') has-error @enderror">
                        <label for="">NAMA CUSTOMER</label>
                        <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan Nama nama" 
                        value="{{ old('nama_customer') }}" required> 
                        @error('nama_customer')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                     <div class="form-group @error('tgl_lahir') has-error @enderror">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                        <input type="date" name="tgl_lahir" class="form-control" 
                            placeholder=""  value="{{ old('tgl_lahir') }}" required>
                    </div>
                    <div class="form-group @error('tmpt_lahir') has-error @enderror">
                        <label for="">TEMPAT LAHIR</label>
                        <input type="text" name="tmpt_lahir" class="form-control" placeholder="Masukkan TEMPAT LAHIT" 
                        value="{{ old('tmpt_lahir') }}" required> 
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                          <label for="">EMAIL</label>
                          <input type="email" name="email" class="form-control" placeholder="Masukkan Nama email" value="{{ auth()->user()->email }}" readonly> 
                      </div>

                    {{-- <div class="form-group @error('email') has-error @enderror">
                        <label for="">EMAIL</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Nama email" 
                        value="{{ old('email') }}" required> 
                    </div> --}}
                     <div class="form-group @error('kontak_suplier') has-error @enderror">
                        <label for="">KONTAK CUSTOMER</label>
                        <input type="text" name="kontak_suplier" class="form-control" placeholder="Masukkan Kontak Customer" 
                        value="{{ old('kontak_suplier') }}" required> 
                    </div>
                     <div class="form-group @error('no_telpon') has-error @enderror">
                        <label for="">NO TELPON</label>
                        <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan Nama No Telpon"
                        value="{{ old('no_telpon') }}" required> 
                    </div>
                    <div class="form-group @error('alamat') has-error @enderror">
                        <label for="">ALAMAT</label>
                        <textarea name="alamat" id="" row="3" class="form-control" placeholder="Masukkan Alamat" 
                        value="{{ old('alamat') }}" required></textarea>
                    </div>
                    <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">KETERANGAN</label>
                        <textarea name="keterangan" id="" row="3" class="form-control" placeholder="Masukkan KETERANGAN" 
                              value="{{ old('keterangan') }}"  required>
                        </textarea>
                    </div>
                    
                    <div class="form-group">
                        {{-- <input type="submit" value="Tambah" class ="btn btn-primary"> --}}
                        <input type="submit" value="SAVE DATA PROFIL CUSTOME" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection