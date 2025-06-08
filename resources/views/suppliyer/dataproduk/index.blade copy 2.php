@extends('admin.templates.default')

@section('content')
      <h1>DATA PRODUK </h1>
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA PRODUK</h3><br><br>
                      {{-- <a class="btn btn-success" href="javascript:void(0)" id="createNewProduk">ADD DATA</a> --}}
                    <a href="{{ route('suppliyerproduk.create')}}" class="btn btn-primary" >TAMBAH PRODUK</a>
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
                                    <th style="text-align: center">STOK</th>
                                    <th style="text-align: center">UNIT</th>
                                    <th style="text-align: center">KETERANGAN</th>
                                    <th style="text-align: center" width="180px">ACTION</th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>
            <form action="" method="post" id="deleteForm">
                @csrf
                @method("DELETE")
                <input type="submit" value="Hapus" style="display:none">
            </form>

@endsection

@push('scripts')
<script src="{{ asset('admin/assets/plugins/bs.notify.min.js') }}"></script>
 @include('admin.templates.partials.alert')
    <script>
        $(function (){

                // $.ajaxSetup({
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // }
                //     });
                        // Index
                        $('#dataTable').DataTable({
                            // "pageLength": 10,
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('suppliyerproduk.data') }}',
                            columns: [
                                { data: 'DT_RowIndex', orderable: false, searchable : false},
                                {data: 'foto'},
                                // {data: 'nama_katagori'},
                                {data: 'katagori_id', name: 'katagori_id'},
                                {data: 'kode', name: 'kode'},
                                {data: 'nama'},
                                // {data: 'nama', name: 'nama'},
                                {data: 'harga_pembelian'},
                                {data: 'harga_penjualan'},
                                {data: 'stok'},
                                {data: 'unit'},
                                {data: 'keterangan'},
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        }); 

                         // create Produk
                        // $('#createNewProduk').click(function () {
                        //     $('#saveBtn').val("create-produk");
                        //     $('#produk_id').val('');
                        //     $('#karyawanForm').trigger("reset");
                        //     $('#modelHeading').html("Create New Produk");
                        //     $('#ajaxModel').modal('show');
                        // });


                         // edit produk
                        // $('body').on('click', '.edit', function () {
                        //     $('#no_induk_id').val($(this).data('no_ind'));
                        //     $('#produk').val($(this).data('title'));
                        //     $('#tanggal_lahir').val($(this).data('date'));
                        //     $('#tanggal_bergabung').val($(this).data('date'));
                        //     $('#keterangan-edit').val($(this).data('keterangan'));
                        //     $('#produk_id_edit').val($(this).data('id'));
                        //     $('#ajaxModelEdit').modal('show');
                        //     return false;
                        // });
                    
            }); 

    </script>
@endpush