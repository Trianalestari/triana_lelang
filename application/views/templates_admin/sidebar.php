<body style="background-image: url('');" id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- bg-gradient-danger -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <!-- <img src="<?= base_url("assets/img/logo1.png") ?>" width="50" alt="logo"> -->
                <h2 class="fas fa-fw fa-home"></h2>
            <div class="sidebar-brand-text mx-3">LELANG.TRIANA</div>
            </a>
              
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/administrator'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
                </a>
            </li>
            <!-- Nav Item - Data Admin -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/data_admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Data Admin
                </a>
            </li>
            <!-- Nav Item - Data Admin -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/data_masyarakat'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Data Masyarakat
                </a>
            </li>
           
            <!-- Nav Item - Data Barang -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/Data_barang'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Data Barang
                </a>
            </li>
         
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/laporan'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Laporan Lelang Ditutup
                </a>
            </li>
           
         
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/laporan/laporan_lelang'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Laporan Lelang Dibuka
                </a>
            </li>
           
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/laporan/laporan_barang'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Laporan Barang
                </a>
            </li>
           
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('admin/laporan_masyarakat'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>Laporan Masyarakat
                </a>
            </li>
           

            <hr class="sidebar-divider my-0">

            <!-- Nav Item -logout -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>Keluar
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-danger  topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <ul class="na navbar-nav navbar-right">
                            <?php if ($this->session->userdata('username')) { ?>
                                <li>
                                    <div>selamat datang <?= $this->session->userdata('username') ?> </div>
                                </li>
                                <div class="topbar-divider d-none d-sm-block"></div>

                                <li class="ml-2"><?= anchor('dashboard/logout', 'Logout'); ?></li>
                            <?php } else { ?>
                                <li class="ml-2"><?= anchor('auth/login', 'Login'); ?></li>
                            <?php } ?>

                        </ul>

                    </ul>
                </nav>


                
            