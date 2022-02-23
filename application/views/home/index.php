<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaporLur.go</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- custom -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bg_kopi.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <div class="navbar-brand">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LaporLur.go</span>
      </div>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="nav-link">
              Home
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link">
              Tentang Kami
            </div>
          </li>
        </ul>
      </div>      
    </div>
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav nav-item">
        <div class="nav-link">
          Daftar
        </div>
      </li>
      <li class="nav nav-item">
        <div class="nav-link">
          Login
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container overflow-auto">
        <div class="row">
          <div class="col-lg-8">
          </div>
          <div class="col-lg-4 float-right">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-center">
                  Lapor Kerusakan
                </div>
              </div>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama">
                  </div>
                  <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon">
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/dist/js/kasir/kasir.js"></script>
</body>
</html>
