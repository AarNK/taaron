 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Berkah Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('barang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Kategori Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('satuan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Satuan Unit
              </p>
            </a>
          </li>
          {{-- Dropdown --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-clipboard nav-icon"></i>
              <p>
                Persediaan Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('barangmasuk.index') }}" class="nav-link">
                  <i class="far fa-clipboard nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barangkeluar.index') }}" class="nav-link">
                  <i class="far fa-clipboard nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan') }}" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Laporan Persediaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('rekomendasi') }}" class="nav-link">
              <i class="fas fa-check nav-icon"></i>
              <p>
                Rekomendasi Barang
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>