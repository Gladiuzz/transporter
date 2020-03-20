<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/dist/img/user.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ $page == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
             <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span>Akun</span>
                </a>
            </li>
            <li class="treeview {{ $page == 'jabatan' || $page == 'pegawai' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $page == 'jabatan' ? 'active' : '' }}"><a href="{{ route('jabatan.index') }}"><i class="fa fa-circle-o"></i> Jabatan</a></li>
                    <li class="{{ $page == 'pegawai' ? 'active' : '' }}"><a href="{{ route('pegawai.index') }}"><i class="fa fa-circle-o"></i> Pegawai</a></li>
                </ul>
            </li>
            <li class="{{ $page == 'pengiriman' ? 'active' : '' }}">
                <a href="{{ route('pengiriman.index') }}">
                    <i class="fa fa-truck"></i> <span>Pengiriman</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Surat Jalan</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-money"></i> <span>Penggajian</span>
                </a>
            </li>
            <li class="treeview {{ $page == 'kas-kecil' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Keuangan</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $page == 'kas-kecil' ? 'active' : '' }}"><a href="{{ route('kas-kecil.index') }}"><i class="fa fa-circle-o"></i> Kas Kecil</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>