@extends('admin.templates.default')
@section('content')
{{-- <h1>Profil </h1> --}}
<section class="content">
      <div class="row">
        <div class="col-md-12">
            @if ($dataprofil == null )
                 <a href="{{ route('settingprofil') }}" class="btn btn-primary btn-block">
                  <b>LENGKAPI DATA CUSTOMER</b>
                </a>
            @else 
                <a href="{{ route('editprofil', $dataprofil->id ) }}" class="btn btn-primary btn-block">
                  <b>EDIT DATA PROFIL CUSTOMER</b>
                </a>
            @endif
          <hr>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                @if ($dataprofil == null )
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" alt="User profile picture">
                @else
                   {{-- {{ url ('/admin/assets/covers/'. $sp->foto) }} --}}
                    <img class="profile-user-img img-responsive img-circle" src=" {{ url ('/admin/assets/covers/'. $dataprofil->foto) }}" alt="User profile picture">
                @endif
              <h3 class="profile-username text-center"> {{ auth()->user()->name }}</h3>
                  <p class="text-muted text-center">{{ auth()->user()->role }}</p>
                  <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        @if ($dataprofil == null )
                            <b>NAMA LENGKAP</b> <a class="pull-right">DATA KOSONG</a>
                        @else
                             <b>NAMA LENGKAP</b> <a class="pull-right">{{ $dataprofil->nama_customer }}</a>
                        @endif
                      </li>   
                      <li class="list-group-item">
                       @if ($dataprofil == null )
                            <b>EMAIL</b> <a class="pull-right">{{ auth()->user()->email }}</a>
                        @else
                             <b>EMAIL</b> <a class="pull-right">{{ auth()->user()->email }}</a>
                        @endif
                      </li>
                      <li class="list-group-item">
                       @if ($dataprofil == null )
                            <b>NO TELPON</b> <a class="pull-right">DATA KOSONG</a>
                        @else
                             <b>NO TELPON</b> <a class="pull-right">{{ $dataprofil->no_telpon }}</a>
                        @endif
                      </li>
                      <li class="list-group-item">
                         @if ($dataprofil == null )
                            <strong><i class="fa fa-map-marker margin-r-5"></i>TEMPAT & TANGGAL LAHIR</strong>
                        <p >DATA KOSONG</p> - <p >DATA KOSONG</p>
                        @else
                            <strong><i class="fa fa-map-marker margin-r-5"></i>TEMPAT & TANGGAL LAHIR</strong>
                          <p >
                            {{ $dataprofil->tmpt_lahir }} - {{ $dataprofil->tgl_lahir }}
                          </p>
                        @endif                       
                      </li>
                      <li class="list-group-item">
                        @if ($dataprofil == null )
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> ALAMAT</strong>
                          <p>DATA KOSONG </p>
                        @else
                             <strong><i class="fa fa-file-text-o margin-r-5"></i> ALAMAT</strong>
                          <p>{{ $dataprofil->alamat }}</p>
                        @endif 
                      </li>   
                      <li class="list-group-item">
                        @if ($dataprofil == null )
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> KETERANGAN</strong>
                          <p>DATA KOSONG </p>
                        @else
                             <strong><i class="fa fa-file-text-o margin-r-5"></i> KETERANGAN</strong>
                          <p>{{ $dataprofil->keterangan }}</p>
                        @endif 
                      </li> 
                  </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->

</section>

@endsection

