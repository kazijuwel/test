  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark border-bottom-0" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"> Co-ordinator Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      @include('welcome.layouts.roleDashboardLinks')
       
    </ul>
  </nav>
  <!-- /.navbar -->