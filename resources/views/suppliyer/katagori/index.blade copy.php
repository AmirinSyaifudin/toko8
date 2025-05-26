@extends('admin.templates.default')

@section('content')
      <h1>Data Katagori </h1>
         <div class="box">
            <div class="box-header">
                  <h3 class="box-title">DATA KATAGORI</h3><br><br>
                  <a class="btn btn-primary" href="javascript:void(0)" id="createNewKatagori" >ADD KATAGORI</a>
            </div>
         <div class="box-body">
            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA PENULI</th>
                            <th>KETERANGAN</th>
                            <th style="text-align: center" width="180px">ACTION</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                             <th>ACTION</th>
                        </tr>
                    </tbody> --}}
            </table>
        </div>
</div>  


{{-- create ajax --}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">

                <form id="katagoriForm" name="katagoriForm" class="form-horizontal">
                   <input type="hidden" name="katagori_id" id="katagori_id">

                   <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NAMA KATAGORI</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_katagori" name="nama_katagori" 
                            placeholder="Enter Nama Katagori" value="" maxlength="50" required>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" 
                            placeholder="Enter KETERANGAN" value="" maxlength="50" required>
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
</div>

{{-- editajax  --}}
<div class="modal fade" id="ajaxModelEdit" aria-hidden="true">
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
</div>


@endsection

@push('scripts')
    <script type="text/javascript">
                $(function () {

                       $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });

                        var table = $('#dataTable').dataTable( {
                            "pageLength": 10,
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('katagori.data') }}',
                            columns: [
                                { data: 'id'},
                            //  { data: 'DT_RowIndex', orderable: false, searchable : false}, //
                                { data: 'nama_katagori'},
                                { data: 'keterangan'},
                                { data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });
                });

                // create 
                $('#createNewKatagori').click(function () {
                    $('#saveBtn').val("create-katagori");
                    $('#katagori_id').val('');
                    $('#katagoriForm').trigger("reset");
                    $('#modelHeading').html("Tambah Data Katagori");
                    $('#ajaxModel').modal('show');
                });


                // edit
                $('body').on('click', '.edit', function () {
                    $('#katagori').val($(this).data('title'));
                    $('#katagori_id_edit').val($(this).data('id'));
                    $('#modHeading').html("Edit Data Katagori");
                    $('#ajaxModelEdit').modal('show');
                    return false;
                });
                        

    </script>
@endpush