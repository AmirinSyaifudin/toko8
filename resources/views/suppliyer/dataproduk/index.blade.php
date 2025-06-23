@extends('admin.templates.default')

@section('content')
      <h1>DATA PRODUK </h1>
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA PRODUK</h3><br><br>
                      {{-- <a class="btn btn-success" href="javascript:void(0)" id="createNewProduk">ADD DATA</a> --}}
                    {{-- <a href="{{ route('suppliyerproduk.create')}}" class="btn btn-primary" >TAMBAH PRODUK</a> --}}
                </div>
               <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">FOTO</th>
                                    <th style="text-align: center">KATAGORI</th>
                                    <th style="text-align: center">KODE</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">HARGA PEMBELIAN </th>
                                    <th style="text-align: center">HARGA PENJUALAN</th>
                                    <th style="text-align: center">QUANTITY</th>
                                    {{-- <th style="text-align: center">UNIT</th> --}}
                                    {{-- <th style="text-align: center">KETERANGAN</th> --}}
                                    <th style="text-align: center" width="180px"></th>
                                    <th style="text-align: center" width="180px"></th>
                                    <th style="text-align: center" width="180px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliyerproduk as $sp)
                                    <tr> 
                                        <td width='5'>  {{ $loop-> index +1 }} </td>
                                        <td width='50'><img class="img-responsive" src="{{ url ('/admin/assets/covers/'. $sp->foto) }}"> </td>
                                        <td width='20'> {{ $sp->katagori->nama_katagori }}</td>
                                        {{-- <td scope="row"> {{ $sp->kode }} </td> --}}
                                        <td width='20'> {{ $sp->kode_barang }}</td>
                                         <td width='20'> {{ $sp->nama }}</td>
                                        {{-- <td scope="row"> {{"Rp. ".formatRupiah($sp->harga_pembelian)}} </td>
                                        <td scope="row"> {{"Rp. ".formatRupiah($sp->harga_penjualan)}} </td> --}}
                                        <td width='20'> Rp {{ number_format($sp->harga_pembelian, 0, ',', '.') }}</td>
                                        <td width='20'> Rp {{ number_format($sp->harga_penjualan, 0, ',', '.') }}</td>
                                        <td width='20'> {{ $sp->stok }}</td>
                                        {{-- <td width='20'> {{ $sp->unit }}</td> --}}
                                        {{-- <td width='20'> {{ $sp->keterangan }}</td> --}}
                                        <td width='5'><a href="{{ route('suppliyerproduk.detail', $sp->id) }}" class="btn btn-info">DETAIL</a></td>
                                        <td width='5'><a href="{{ route('suppliyerproduk.edit', $sp->id) }}" class="btn btn-warning">EDIT</a></td>
                                        <td width='5'>
                                            <form action="{{ route('suppliyerproduk.destroy', $sp->id) }}" method="post" style="display:inline;">
                                                {{ csrf_field() }}
                                                {{ method_field ('delete')}}
                                                <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>

@endsection

@push('scripts')
<script src="{{ asset('admin/assets/plugins/bs.notify.min.js') }}"></script>
 @include('admin.templates.partials.alert')
<script>
        $(function () {
            $('#dataTable').DataTable({

            });
        });
</script>
@endpush