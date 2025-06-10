  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    {{-- @php
        $datacustomer = App\Customer::where('user_id', auth()->user()->id)->first();
    @endphp --}}
   
    <section class="sidebar">
      <!-- Sidebar user panel -->
      @can('isAdmin')
          <div class="user-panel">
            <div class="pull-left image">

              <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      @endcan
      @can('isCustomer')
          <div class="user-panel">
            <div class="pull-left image">
              {{-- @if ($datacustomer == null )
                 <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
              @else  
                <img src="{{ asset($datacustomer->foto) }}" class="img-circle" alt="User Image">
              @endif --}}
               <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      @endcan
      @can('isCashier')
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      @endcan
      @can('isSuppliyer')
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      @endcan
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> {{ auth()->user()->role }}</li>
        {{-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> --}}
        @can('isAdmin')
        <li class="accordion-group @if (Request::segment(1) == 'katagori') active @endif">
          <a href="{{ route('adminkatagori') }}">
            <i class="fa fa-calendar"></i> <span>Data Katagori</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="accordion-group @if (Request::segment(1) == 'produk') active @endif">
        {{-- <li class="treeview"> --}}
          <a href="{{ route('adminproduk') }}">
            <i class="fa fa-files-o"></i>
            <span>Data  Produk</span>
            <span class="pull-right-container">
              {{-- <span class="label label-primary pull-right">4</span> --}}
            </span>
          </a>
        </li>
        <li class="accordion-group @if (Request::segment(1) == 'datacustomer') active @endif">
          <a href="{{ route('datacustomer') }}">
            <i class="fa fa-envelope"></i> <span>Data Customer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="accordion-group @if (Request::segment(1) == 'datasuppliyer') active @endif">
          <a href="{{ route('datasuppliyer') }}">
            <i class="fa fa-envelope"></i> <span>Data Suppliyer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="header">LAPORAN PENJUALAN</li>
        {{-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
       @endcan
       @can('isCustomer')
        <li class="accordion-group @if (Request::segment(1) == 'profilcustomer') active @endif">
          <a href="{{ route('profilcustomer') }}">
            <i class="fa fa-calendar"></i> <span>Profil Customer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        {{-- <li class="accordion-group @if (Request::segment(1) == 'infocustomer') active @endif">
          <a href="{{ route('infocustomer') }}">
            <i class="fa fa-calendar"></i> <span>Data Customer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
         <li>
          <a href="{{ route ('customerproduk') }}">
            <i class="fa fa-calendar"></i> <span>Data Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       @endcan
       @can('isCashier')
          <li class="accordion-group @if (Request::segment(1) == 'dataprodukcashier') active @endif">
          <a href="{{ route('dataprodukcashier') }}">
            <i class="fa fa-calendar"></i> <span>Data Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="accordion-group @if (Request::segment(1) == 'datacustomercashier') active @endif">
          <a href="{{ route('datacustomercashier') }}">
            <i class="fa fa-envelope"></i> <span>Data Customer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="accordion-group @if (Request::segment(1) == 'datasuppliyercashier') active @endif">
          <a href="{{ route('datasuppliyercashier') }}">
            <i class="fa fa-envelope"></i> <span>Data Suppliyer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       @endcan
       @can('isSuppliyer')
        <li class="accordion-group @if (Request::segment(1) == 'profilsuppliyer') active @endif">
          <a href="{{ route('profilsuppliyer') }}">
            <i class="fa fa-envelope"></i> <span>PROFIL SUPPLIYER</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="accordion-group @if (Request::segment(1) == 'katagorisuppliyer') active @endif">
          <a href="{{ route('suppliyerkatagori') }}">
            <i class="fa fa-calendar"></i> <span>DATA KATAGORI</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        {{-- <li class="accordion-group @if (Request::segment(1) == 'suppliyer') active @endif">
          <a href="{{ route('suppliyer') }}">
            <i class="fa fa-envelope"></i> <span>Data Suppliyer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
        <li class="accordion-group @if (Request::segment(1) == 'suppliyerproduk') active @endif">
          <a href="{{ route('suppliyerproduk') }}">
            <i class="fa fa-calendar"></i> <span>DATA PRODUK</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

         {{-- <li class="accordion-group @if (Request::segment(1) == 'suppliyerproduk') active @endif">
          <a href="{{ route('suppliyerproduk') }}">
            <i class="fa fa-calendar"></i> <span>DATA PRODUK</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
       @endcan
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
