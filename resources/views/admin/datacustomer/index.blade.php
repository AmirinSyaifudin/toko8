@extends('admin.templates.default')

@section('content')
      {{-- <h1>Data CUSTOMER </h1> --}}
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA CUSTOMER</h3><br><br>
                    <a href="{{ route('datacustomer.create') }}" class="btn btn-primary" >ADD CUSTOMER</a>
                </div>
               <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="text-align: center">ID</th>
                                    {{-- <th style="text-align: center">FOTO</th> --}}
                                    <th style="text-align: center">NAMA</th>
                                    {{-- <th style="text-align: center">TANGGAL LAHIR</th>
                                    <th style="text-align: center">TEMPAT LAHIR</th>
                                    <th style="text-align: center">EMAIL</th>
                                    <th style="text-align: center">KONTAK SUPPLIYER</th>
                                    <th style="text-align: center">NO TELPON</th>
                                    <th style="text-align: center">ALAMAT</th>
                                    <th style="text-align: center">KETERANGAN</th> --}}
                                    <th style="text-align: center" width="180px">ACTION</th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>
            <form action="" method="post" id="deleteForm">
                @csrf
                @method("DELETE")
                <input type="submit" value="Hapus"  style="display: none">
            </form>

{{-- create ajax --}}
{{-- <div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="katagoriForm" name="katagoriForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                   <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">katagori</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_katagori" name="nama_katagori" 
                            placeholder="Enter Nama katagori" value="" maxlength="50" required>
                        </div>
                    </div>               
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-sm-12">
                            <textarea id="keterangan" name="keterangan" required
                            placeholder="Enter Keterangan" class="form-control">
                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
        
{{-- editajax  --}}
{{-- <div class="modal fade" id="ajaxModelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="updatekatagoriForm" name="katagoriForm" class="form-horizontal">
                   <input type="hidden" name="katagori_id" id="katagori_id">
                   <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NAMA KATAGORI</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="katagori" name="nama_katagori" 
                            placeholder="Enter Nama katagori" value="" maxlength="50" required>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="katagori" name="nama_katagori" 
                            placeholder="Enter Nama katagori" value="" maxlength="50" required>
                        </div>
                    </div>               
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="" id="katagori_id_edit">
                            <button type="submit" class="btn btn-primary"value="create">UPDATE</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@push('scripts')
<script src="{{ asset('admin/assets/plugins/bs.notify.min.js') }}"></script>
 @include('admin.templates.partials.alert')
    <script>
                $(function () {

                    //    $.ajaxSetup({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     }
                    //     });

                        $('#dataTable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('datacustomer.data') }}',
                            columns: [
                                { data: 'DT_RowIndex', orderable: false, searchable : false},
                                // {data: 'foto', name: 'foto'},
                                {data: 'nama', name: 'nama'},
                                // {data: 'tgl_lahir', name: 'tgl_lahir'},
                                // {data: 'tmpt_lahir', name: 'tmpt_lahir'},
                                // {data: 'email', name: 'email'},
                                // {data: 'kontak_suplier', name: 'kontak_supplier'},
                                // {data: 'no_telpon', name: 'no_telpon'},
                                // {data: 'alamat', name: 'alamat'},
                                // {data: 'keterangan', name: 'keterangan'},
                                { data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });
                });

                // create 
                // $('#createNewKatagori').click(function () {
                //     $('#saveBtn').val("create-katagori");
                //     $('#id').val('');
                //     $('#katagoriForm').trigger("reset");
                //     $('#modelHeading').html("Tambah Data Katagori");
                //     $('#ajaxModel').modal('show');
                // });

                 //createupdate
                // $('#saveBtn').click(function (e) {
                //     e.preventDefault();
                //     $(this).html('Save');
                //         $.ajax({
                //             data: $('#katagoriForm').serialize(),
                //             url: "{{ route('katagori.store') }}",
                //             type: "POST",
                //             dataType: 'json',
                //             success: function (data) {
                //                 $('#katagoriForm').trigger("reset");
                //                 $('#ajaxModel').modal('hide');
                //                 table.draw();
                //             },
                //             error: function (data) {
                //                 console.log('Error:', data);
                //                 $('#saveBtn').html('Save Changes');
                //             }
                //         });
                // });


                // edit
                // $('body').on('click', '.edit', function () {
                //     $('#katagori').val($(this).data('title'));
                //     $('#katagori_id_edit').val($(this).data('id'));
                //     $('#modHeading').html("Edit Data Katagori");
                //     $('#ajaxModelEdit').modal('show');
                //     return false;
                // });
                        

    </script>
@endpush