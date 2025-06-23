@extends('admin.templates.default')

@section('content')
      {{-- <h1>Data CUSTOMER </h1> --}}
       @include('admin.templates.partials.alert')
          <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DATA CUSTOMER</h3><br><br>
                    {{-- <a href="{{ route('datacustomer.create') }}" class="btn btn-primary" >ADD CUSTOMER</a> --}}
                </div>
               <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">FOTO</th>
                                    <th style="text-align: center">NAMA</th>
                                    {{-- <th style="text-align: center">TANGGAL LAHIR</th>
                                    <th style="text-align: center">TEMPAT LAHIR</th> --}}
                                    <th style="text-align: center">EMAIL</th>
                                    <th style="text-align: center">NO TELPON</th>
                                    {{-- <th style="text-align: center">ALAMAT</th>
                                    <th style="text-align: center">KETERANGAN</th> --}}
                                    <th style="text-align: center" width="180px">STATUS</th>
                                    <th style="text-align: center"> ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datacustomer as $item  => $value)
                                    <tr>
                                        <td width='5'>  {{ $loop-> index +1 }} </td>
                                        <td width='50'><img class="img-responsive" src="{{ url ('/admin/assets/covers/'. $value->foto) }}"> </td>
                                        <td width='20'> {{ $value->nama_customer }}</td>
                                        {{-- <td width='20'> {{ $value->tgl_lahir }}</td>
                                        <td width='20'> {{ $value->tmpt_lahir }}</td> --}}
                                        <td width='20'> {{ $value->email }}</td>
                                        <td width='20'> {{ $value->no_telpon }}</td>
                                        {{-- <td width='20'> {{ $value->alamat }}</td>
                                        <td width='20'> {{ $value->keterangan }}</td> --}}
                                        <td style="text-align: center;">
                                            @if ($value->status == 'Belum Verifikasi')
                                                <span style="color:brown"><b>{{ $value->status}} </b></span>
                                            @endif
                                            @if ($value->status == 'Sudah Verifikasi')
                                                <span style="color: blue"><b>{{ $value->status}}</b></span>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href=""
                                            class="btn btn-info" data-toggle="confirmation"
                                            style="text-transform: uppercase"><i
                                                class="icon-eye-open"></i>
                                            &nbsp;Detail
                                        </a>
                                        <form action="{{ route('customerverifikasi', $value->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Verifikasi Customer, Anda Yakin ?')"
                                            style="display: inline-block">
                                            {!! method_field('PUT') . csrf_field() !!}
                                            <input type="hidden" name="status_suppliyer[]"
                                                value="Sudah Verifikasi">
                                            <button class="dropdown-item" type="submit"
                                                style="text-transform: uppercase; color:#a50d7c; padding:5px; background-color: #c61818; border: none; border: 1px solid #991313; background-image: linear-gradient(to bottom, #ffffff, #e6e6e6); box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                verifikasi
                                            </button>
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
    {{-- <script>
                $(function () {

                        $('#dataTable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('datacustomer.data') }}',
                            columns: [
                                { data: 'DT_RowIndex', orderable: false, searchable : false},
                                {data: 'foto'},
                                {data: 'nama_customer'},
                                {data: 'tgl_lahir'},
                                {data: 'tmpt_lahir'},
                                {data: 'email'},
                                {data: 'no_telpon'},
                                {data: 'alamat'},
                                {data: 'keterangan'},
                                { data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });
                });

    </script> --}}
@endpush