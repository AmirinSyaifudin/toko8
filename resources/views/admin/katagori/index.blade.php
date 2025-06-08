@extends('admin.templates.default')

@section('content')


      <h1>Data Katagori </h1>
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA KATAGORI</h3><br><br>
                </div>
               <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">NAMA Katagori</th>
                                    <th style="text-align: center">KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adminkatagori as $ad)
                                    <tr class="text-center">
                                        <td width='5'>  {{ $loop-> index +1 }} </td>
                                        <td width='20'> {{ $ad->nama_katagori }}</td>
                                        <td width='20'> {{ $ad->keterangan }}</td>
                                    </tr>
                                @endforeach
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