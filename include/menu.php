<?php 

$page = @$_GET['page'];

if ($page == 'kelas') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $kelasaktif = 'active'; 
}elseif ($page == 'siswa') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $siswaaktif = 'active'; 
}elseif ($page == 'tahun') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $tahunaktif = 'active'; 
}

 ?>

<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?= $masteraktif1 ?>">
            <a href="#" class="nav-link <?= $masteraktif2 ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=kelas" class="nav-link <?= $kelasaktif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=siswa" class="nav-link <?= $siswaaktif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=tahun" class="nav-link <?= $tahunaktif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tahun Ajaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->