<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaporCah.go || Pegawai</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" role="button">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LaporCah.go</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item active">
              <a href="<?php echo base_url() ?>index.php/dashboard_controler" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/proses_controler" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Proses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/selesai_controler" class="nav-link active">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Selesai</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Pengaturan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/jenis_aduan_controler" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jenis Laporan</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item">Aduan Selesai</li>
                <li class="breadcrumb-item active">Detail</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              Detail Laporan
            </div>
            <div class="card-body">
              <div class="card">
                <?php
                foreach ($laporan->result_array() as $data_laporan) {
                  $nomor_laporan = $data_laporan['nomor_aduan'];
                  $tanggal = $data_laporan['tanggal'];
                  $lokasi = $data_laporan['lokasi'];
                  $gambar = $data_laporan['gambar'];
                  $id_aduan = $data_laporan['id_aduan'];
                  $keterangan = $data_laporan['keterangan'];
                  $jenis_kerusakan = $data_laporan['id_jenis_aduan'];
                }

                ?>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-2">Nomor Laporan</div>
                    <div class="col-sm-2">: <?= $nomor_laporan ?></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">tanggal</div>
                    <div class="col-sm-2">: <?= $tanggal ?></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">Pelapor</div>
                    <div class="col-sm-2">: <?= "-" ?></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">Lokasi</div>
                    <div class="col-sm-2">: <?= $lokasi ?></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">Jenis Kerusakan</div>
                    <div class="col-sm-5">: <?= $jenis_kerusakan ?></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">Keterangan</div>
                    <div class="col-sm-10">: <?= $keterangan ?></div>
                  </div>
                  <!-- <div class="row">
                        <div class="col-sm-2">Status</div>
                        <div class="col-sm-2">:</div>
                      </div> -->
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <img src="<?= base_url('./assets/gambar/' . $gambar) ?>" style="width:200px">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
            <footer class="main-footer">
              <strong>Copyright &copy; 2022 Dream Project.</strong>
              <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
              </div>
            </footer>
          </div>

          <!-- jQuery -->
          <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
          <!-- Bootstrap -->
          <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- AdminLTE -->
          <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>

          <!-- OPTIONAL SCRIPTS -->
          <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
          <!-- AdminLTE for demo purposes -->
          <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
          <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
          <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard3.js"></script>
</body>

</html>