@extends('admin.templates.default')

@section('content')
<div class="box">
        <div class="box-header">
            <h2 class="box-title">ADDA PRODUK</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('suppliyerproduk.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    @if ($supplier != null)
                        <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">
                    @endif
                    <input type="hidden" name="status_suppliyer" value="{{ $supplier->status }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="form-group @error('foto') has-error @enderror">
                        <label for="">FOTO</label>
                        <input type="file" name="foto" class="form-control">
                        @error('foto')
                            <span class="help-block">{{ $message}}</span>
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
                    {{-- <div class="form-group @error('kode') has-error @enderror">
                        <label for="">KODE PRODUK</label>
                        <input type="text" name="kode" class="form-control" placeholder="Masukkan kode Produk" value="{{ old('kode') }}" > 
                        @error('kode')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group @error('kode_barang') has-error @enderror">
                        <label for="">KODE PRODUK</label>
                        <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan kode Produk" value="{{ old('kode_barang') }}"> 
                        @error('kode_barang')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group @error('nama_katagori') has-error @enderror">
                        <label for="">NAMA PRODUK</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Produk" value="{{ old('nama') }}"> 
                        @error('nama')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('harga_pembelian') has-error @enderror">
                        <label for="">HARGA PEMBELIAN</label>
                        <input type="number" name="harga_pembelian" class="form-control" placeholder="Masukkan harga pembelian" value="{{ old('harga_pembelian') }}"> 
                        @error('harga_pembelian')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('harga_penjualan') has-error @enderror">
                        <label for="">HARGA PENJUALAN</label>
                        <input type="number" name="harga_penjualan" class="form-control" placeholder="Masukkan harga penjualan" value="{{ old('harga_penjualan') }}"> 
                        @error('harga_penjualan')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group @error('unit') has-error @enderror">
                        <label for="">UNIT</label>
                        <input type="text" name="unit" class="form-control" placeholder="Masukkan unit Produk" value="{{ old('unit') }}"> 
                        @error('unit')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group @error('stok') has-error @enderror">
                        <label for="">QUANTITY</label>
                        <input type="text" name="stok" class="form-control" placeholder="Masukkan stok Produk" value="{{ old('stok') }}"> 
                        @error('stok')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">KETERANGAN</label>
                        <textarea name="keterangan" id="" row="3" class="form-control" placeholder="Masukkan KETERANGAN" 
                              value="{{ old('keterangan') }}"  required>
                        </textarea>
                    </div> --}}
                    <div class="form-group">
                        <input type="submit" value="Tambah" class ="btn btn-primary">
                    </div>
                </form>
            </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
{{-- <script>
  $(document).ready(function () {
     $('.rupiah').mask("#.##0", {reverse: true});
  });
  </script> --}}
@endsection

@push('scripys')
{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi AutoNumeric
    new AutoNumeric('.input-rupiah', {
        currencySymbol: 'Rp ',
        decimalPlaces: 0,
        digitGroupSeparator: '.',
        decimalCharacter: ',',
        currencySymbolPlacement: 'p',
        minimumValue: '0',
        unformatOnSubmit: true,
        modifyValueOnWheel: false
    });
    
    // Validasi form
    document.querySelector('form').addEventListener('submit', function(e) {
        const hargaInput = document.querySelector('.input-rupiah');
        const numericValue = AutoNumeric.getNumber(hargaInput);
        
        if (numericValue < 1000) {
            e.preventDefault();
            alert('Harga minimal Rp 1.000');
        }
    });
});
</script> --}}
    
@endpush