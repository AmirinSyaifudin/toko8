@include('admin.templates.default')

@section('content')
      <h1>KERANJANG BELANJA </h1>
     
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
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">HARGA PENJUALAN</th>
                                    <th style="text-align: center">QUANTITY</th>
                                    <th style="text-align: center">TOTAL HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($customerproduk as $ap) --}}
                                    <tr>
                                          {{-- <td width='5'>  {{ $loop-> index +1 }} </td>
                                          <td width='50'><img class="img-responsive" src="{{ url ('/admin/assets/covers/'. $ap->foto) }}"> </td>
                                          <td width='20'> {{ $ap->nama }}</td>
                                          <td width='20'> {{ $ap->harga_penjualan }}</td>
                                          <td width='20'> {{ $ap->stok }}</td>
                                          <td width='20'> TOTAL ARGA</td> --}}

                                          <td width='5'>  </td>
                                          <td width='50'> </td>
                                          <td width='20'> </td>
                                          <td width='20'> </td>
                                          <td width='20'> </td>
                                          <td width='20'> TOTAL ARGA</td>
                                    </tr>
                                {{-- @empty
                                @endforelse  --}}
                            </tbody>
                    </table>
                </div>
            </div>
@endsection