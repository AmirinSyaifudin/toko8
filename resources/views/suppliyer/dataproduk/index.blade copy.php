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
                                    {{-- <th style="text-align: center">ID</th> --}}
                                    {{-- <th style="text-align: center">FOTO</th> --}}
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


{{-- create ajax --}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="produkForm" class="form-horizontal" enctype="multipart/form-data">
                   <input type="hidden" name="produk_id" id="produk_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NO INDUK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_induk" name="no_induk" 
                                placeholder="Enter No Induk" value="" maxlength="50" required>
                            </div>
                    </div>  
                   
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NAMA KARYAWAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" 
                                placeholder="Enter Nama Karyawan" value="" maxlength="50" required>
                            </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" 
                                placeholder="Enter Alamat Email" value="" maxlength="50" required>
                            </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                            <div class="col-sm-5">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? ' selected' : ''}} maxlength="50">Laki-Laki</input>
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}} maxlength="50">Perempuan</input>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">FOTO</label>
                            <div class="col-sm-5">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                            <div class="col-sm-5">
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL BERGABUNG</label>
                            <div class="col-sm-5">
                                <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" class="form-control" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ALAMAT</label>
                            <div class="col-sm-10">
                                <textarea id="alamat" name="alamat" required
                                placeholder="Enter Keterangan" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" id="saveBtn" >SIMPAN</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        
{{-- editajax  --}}
<div class="modal fade" id="ajaxModelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="updateprodukForm" name="produkForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="produk_id" id="produk_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NO INDUK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_induk_id" name="no_induk" 
                                placeholder="Enter No Induk" value="{{ old('kode') ?? $produk->kode }}" maxlength="50" required="">
                            </div>
                    </div>       
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">KARYAWAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="karyawan" name="nama" 
                                placeholder="Enter Nama Provinsi" value="" maxlength="50" required="">
                            </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_id" name="email" 
                                placeholder="Enter Alamat Email" value="" maxlength="50" required>
                            </div>
                    </div> 
                 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                            <div class="col-sm-10">
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" required="true"> Laki-laki
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"> Perempuan
                            </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">UPDATE FOTO</label>
                            <div class="col-sm-5">
                                <input type="file" name="image" class="form-control" 
                                placeholder="" value="" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                            <div class="col-sm-5">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" 
                                placeholder="" value=""  required="">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL BERGABUNG</label>
                            <div class="col-sm-5">
                                <input type="date" name="tanggal_bergabung" id="tanggal_bergabung" class="form-control" 
                                placeholder="" value=""  required="">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ALAMAT</label>
                            <div class="col-sm-10">
                                <textarea id="alamat-edit" name="alamat" required="" 
                                placeholder="Enter Keterangan" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="" id="karyawan_id_edit">
                            <button type="submit" class="btn btn-primary"value="create">UPDATE KARYAWAN</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="{{ asset('admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>  

<script src="{{ asset('admin/assets/plugins/bs.notify.min.js') }}"></script>
 @include('admin.templates.partials.alert')
    <script type="text/javascript">
        $(function (){

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                    });
                        // Index
                        var table = $('#dataTable').DataTable({
                            "pageLength": 10,
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('suppliyerproduk.data') }}',
                            columns: [
                                // { data: 'DT_RowIndex', orderable: false, searchable : false},
                                // {data: 'foto', name: 'foto', orderable: false},
                                // {data: 'nama_katagori', name: 'nama_katagori'},
                                {data: 'katagori_id', name: 'katagori_id'},
                                {data: 'kode', name: 'kode'},
                                {data: 'nama', name: 'nama'},
                                {data: 'harga_pembelian', name: 'harga_pembelian'},
                                {data: 'harga_penjualan', name: 'harga_penjualan'},
                                {data: 'stok', name: 'stok'},
                                {data: 'unit', name: 'unit'},
                                {data: 'keterangan', name: 'keterangan'},
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        }); 

                         // create Produk
                        $('#createNewProduk').click(function () {
                            $('#saveBtn').val("create-produk");
                            $('#produk_id').val('');
                            $('#karyawanForm').trigger("reset");
                            $('#modelHeading').html("Create New Produk");
                            $('#ajaxModel').modal('show');
                        });


                         // edit produk
                        $('body').on('click', '.edit', function () {
                            $('#no_induk_id').val($(this).data('no_ind'));
                            $('#produk').val($(this).data('title'));
                            $('#tanggal_lahir').val($(this).data('date'));
                            $('#tanggal_bergabung').val($(this).data('date'));
                            $('#keterangan-edit').val($(this).data('keterangan'));
                            $('#produk_id_edit').val($(this).data('id'));
                            $('#ajaxModelEdit').modal('show');
                            return false;
                        });
                    
            }); 

    </script>
@endpush