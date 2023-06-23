<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DPMPTSP | <?= $judul_halaman ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= base_url('assets') ?>/dist/img/tanah_datar.png">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/plugins/toastr/toastr.min.css">
</head>
<?php $session = session();
if ($session->get('level') == 1) {
    $level = "Admin";
} else if ($session->get('level') == 2) {
    $level = "Kasubag Keuangan";
} else if ($session->get('level') == 3) {
    $level = "PPTK";
} else if ($session->get('level') == 4) {
    $level = "Bendahara";
}
?>

<body class="hold-transition text-sm sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto navbar-cyan">
                <img src="<?php echo base_url('assets') ?>/dist/img/avatar5.png" alt="User Avatar" class="img-circle" width="25" height="25">
                <span class="hidden-xs"><?= "Hallo! " . $session->get('namauser'); ?></span>
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-cyan">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-cyan">
                <img src="<?= base_url('assets') ?>/dist/img/tanah_datar.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-dark">DPMPTSP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets') ?>/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $session->get('namauser'); ?></a>
                        <a href="#" class="d-block"><?= $level ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 ">
                    <?= $this->include('template/V_menu') ?>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $judul_halaman ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php elseif (session()->getFlashdata('sukses')) :  ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= session()->getFlashdata('sukses') ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->renderSection('content') ?>

                    <?= $this->include('template/V_footer') ?>