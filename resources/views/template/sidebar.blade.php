<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('Gambar/logo.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Aditya Dwi Agustino</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('Gambar/nama.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin Wilayah</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{ url('/provinsi')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p> Tabel provinsi </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ url('/kabupaten')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p> Tabel Kabupaten </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ url('/kecamatan')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p> Tabel Kecamatan </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ url('/desa')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p> Tabel Desa </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>