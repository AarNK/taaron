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
