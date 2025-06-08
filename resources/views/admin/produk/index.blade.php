@extends('admin.templates.default')

@section('content')
      <h1>Data Produk </h1>
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA PRODUK</h3><br><br>
                </div>
               <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">FOTO</th>
                                    <th style="text-align: center">KODE</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">HARGA PEMBELIAN</th>
                                    <th style="text-align: center">HARGA PENJUALAN</th>
                                    <th style="text-align: center">STOK</th>
                                    <th style="text-align: center">UNIT</th>
                                    <th style="text-align: center">KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($adminproduk as $ap)
                                    <tr>
                                          <td width='5'>  {{ $loop-> index +1 }} </td>
                                          <td width='50'><img class="img-responsive" src="{{ url ('/admin/assets/covers/'. $ap->foto) }}"> </td>
                                          <td width='20'> {{ $ap->kode }}</td>
                                          <td width='20'> {{ $ap->nama }}</td>
                                          <td width='20'> {{ $ap->harga_pembelian }}</td>
                                          <td width='20'> {{ $ap->harga_penjualan }}</td>
                                          <td width='20'> {{ $ap->stok }}</td>
                                          <td width='20'> {{ $ap->unit }}</td>
                                          <td width='20'> {{ $ap->keterangan }}</td>
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
    {{-- <script>
                $(function () {

                        $('#dataTable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('katagori.data') }}',
                            columns: [
                                { data: 'DT_RowIndex', orderable: false, searchable : false},
                                {data: 'nama_katagori', name: 'nama_katagori'},
                                {data: 'keterangan', name: 'keterangan'},
                                // { data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });
                });

    </script> --}}
@endpush