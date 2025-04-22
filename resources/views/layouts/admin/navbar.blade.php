 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Notifications Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-bell"></i>
                 @if(count($lowStockItems) > 0)
                     <span class="badge badge-warning navbar-badge">{{ count($lowStockItems) }}</span>
                 @endif
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-header">{{ count($lowStockItems) }} Notifikasi</span>
                 <div class="dropdown-divider"></div>
                 @foreach($lowStockItems as $item)
                     <a href="{{ route('dashboard') }}" class="dropdown-item">
                         <i class="fas fa-exclamation-triangle text-danger mr-2"></i> {{ $item->barang->name }} (Stok: {{ $item->stokakhir }})
                         <span class="float-right text-muted text-sm">{{ $item->created_at->diffForHumans() }}</span>
                     </a>
                     <div class="dropdown-divider"></div>
                 @endforeach
                 <a href="{{ route('dashboard') }}" class="dropdown-item dropdown-footer">Lihat semua notifikasi</a>
             </div>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                 @csrf
             </form>
             <a href="#" class="nav-link @yield('')"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="nav-icon"></i>
                 <p>
                     Logout
                 </p>
             </a>
         </li>
     </ul>

 </nav>
 <!-- /.navbar -->
