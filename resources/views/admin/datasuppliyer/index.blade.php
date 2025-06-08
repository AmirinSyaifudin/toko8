@extends('admin.templates.default')

@section('content')
      <h1>Data Suppliye </h1>
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA SUPPLIYER</h3><br><br>
                    {{-- <a href="{{ route('datasuppliyer.create') }}" class="btn btn-primary" >ADD SUPPLIYER</a> --}}
                </div>
               <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">FOTO</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">TANGGAL LAHIR</th>
                                    <th style="text-align: center">TEMPAT LAHIR</th>
                                    <th style="text-align: center">EMAIL</th>
                                    {{-- <th style="text-align: center">KONTAK SUPPLIYER</th> --}}
                                    <th style="text-align: center">NO TELPON</th>
                                    <th style="text-align: center">ALAMAT</th>
                                    <th style="text-align: center">KETERANGAN</th>
                                    {{-- <th style="text-align: center" width="180px">ACTION</th> --}}
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

@endsection

@push('scripts')
<script src="{{ asset('admin/assets/plugins/bs.notify.min.js') }}"></script>
 @include('admin.templates.partials.alert')
    <script>
                $(function () {
                        $('#dataTable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('datasuppliyer.data') }}',
                            columns: [
                                { data: 'DT_RowIndex', orderable: false, searchable : false},
                                {data: 'foto'},
                                {data: 'nama'},
                                {data: 'tgl_lahir'},
                                {data: 'tmpt_lahir'},
                                {data: 'email'},
                                // {data: 'kontak_suplier'},
                                {data: 'no_telpon'},
                                {data: 'alamat'},
                                {data: 'keterangan'},
                                // { data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });
                });
                        

    </script>
@endpush