<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/news.jpg" type="image/ico">
    <title>lelang triana</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

</head>

<body id="page-top">

    <div class="wrapper">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content ">
                
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow ">
                    
                       <!-- Sidebar Toggle (Topbar) -->
                       <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- <img src="<?= base_url('assets/img/15.gif'); ?>" height="50" alt="logo"> -->
                    <div class="col-2 search-top">
                    <h5 class="brand-logo">
                        <h3><b>Lelang.Triana</b></h3>
                    </h5>
                    </div>
                    <?php if ($this->session->userdata('username')) : ?>
                          <a href="<?= base_url('history'); ?>" class="btn btn-primary"> History lelang</a>
                    <?php else : ?>

                    <?php endif; ?>
        

        
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <div class="col-md-8">
                        <form action="<?= base_url(); ?>" class="search-top-form" method="post">
                            <span class="icon fas fa-search"></span>
                            <input type="text" placeholder="Masukkan kata kunci" name="keyword">
                        </form>
                    </div>

                    <?php if ($this->session->userdata('username')) : ?>
                        <p class="btn btn-success mr-3"><?= $this->session->userdata('username') ?></p>
                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger"> Logout</a>
                    <?php else : ?>
                        <a href="<?= base_url('auth/login'); ?>" class="btn btn-success text-white mr-3">Login</a>
                        <a href="<?= base_url('auth/register'); ?>" class="btn btn-primary text-white">Daftar</a>
                    <?php endif; ?>

                </div>
            </div>
                          
            
            