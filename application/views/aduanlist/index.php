<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaporCah.go</title>

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
          <span class="brand-text font-weight-light">LaporCah.go</span>
        </div>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?php echo base_url() ?>">
                <div class="nav-link">
                  Home
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/aduanlist_nonlog_contro" class="">
                <div class="nav-link">
                  Aduan Masuk
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>tentang_kami.php">
                <div class="nav-link">
                  Tentang Kami
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav nav-item">
          <a href="<?php echo base_url() ?>index.php/daftar_controler" class="">
            <div class="nav-link">
              Daftar
            </div>

          </a>
        </li>
        <li class="nav nav-item">
          <a href="#">
            <div class="nav-link" data-toggle="modal" data-target="#modal-login">
              Login
            </div>

          </a>
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Lokasi</th>
                  <th>Kerusakan</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $nomor = 0;
                foreach ($data->result_array() as $i) :
                  $tanggal = $i['tgl_lapor'];
                  $nama = $i['nama_pelapor'];
                  $lokasi = $i['lokasi_kerusakan'];
                  $kerusakan = $i['keterangan'];

                  $nomor++;

                ?>


                  <tr>

                    <td><?php echo $nomor ?> </td>

                    <td><?php echo $tanggal; ?> </td>

                    <td><?php echo $nama; ?> </td>

                    <td><?php echo $lokasi; ?> </td>

                    <td><?php echo $kerusakan; ?></td>

                  </tr>

                <?php endforeach; ?>


              </tbody>

            </table>
            <!-- /.row -->
          </div><!-- /.container-fluid -->

        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- REQUIRED SCRIPTS -->
      <div class="modal fade" id="modal-login" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-center">
                    <p class="text-black">Login</p>
                  </div>
                  <form id="login" action="<?php echo base_url() ?>index.php/login_controler/cek_log" method="post">
                    <div class="input-group mb-3">
                      <input type="text" name="username" class="form-control" placeholder="Username">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-sm">
                        <button type="submit" for="login" class="btn btn-primary btn-block">Sign In</button>
                      </div>
                      <div class="col-sm">
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

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