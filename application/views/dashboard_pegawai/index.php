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
          <a class="nav-link" href="<?php echo base_url() ?>index.php/login_controler/log_out" role="button">
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
              <a href="<?php echo base_url() ?>index.php/dashboard_controler" class="nav-link active">
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
              <a href="<?php echo base_url() ?>index.php/selesai_controler" class="nav-link">
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
                <li class="breadcrumb-item">Aduan Masuk</li>
                <!-- <li class="breadcrumb-item active">Dashboard v3</li> -->
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <!-- <div class="card-title">Laporan</div> -->
              <div class="card-tools" data-toggle="modal" data-target="#modal-lapor">
                <!-- <button type="button" class="btn btn-primary">Buat Laporan</button> -->
              </div>
              Laporan
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Aduan</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // if ($last_code->result_array() == null) {
                  //   $nomor_aduan = "AD/001";
                  // } else {
                  //   foreach ($last_code->result_array() as $last_code) :
                  //     if ($last_code['nomor_aduan'] != null) {
                  //       $explode_kode = explode("/", $last_code['nomor_aduan']);
                  //       $last_explode_kode = end($explode_kode) + 1;
                  //       $last_explode_kode = sprintf("%03s", ($last_explode_kode));
                  //       $nomor_aduan = "AD/" . $last_explode_kode;
                  //     } else {
                  //       $nomor_aduan = "AD/001";
                  //     }
                  //   endforeach;
                  // }
                  // print_r($laporan);
                  $nomor = 0;
                  foreach ($laporan->result_array() as $data_laporan) :
                    $nomor++;
                  ?>
                    <tr>
                      <td><?= $nomor ?></td>
                      <td><?= $data_laporan['nomor_aduan'] ?></td>
                      <td><?= $data_laporan['tanggal'] ?></td>
                      <td><?= $data_laporan['lokasi'] ?></td>
                      <td><?= date('l, d-m-Y  H:i:s a'); ?></td>
                      <td>Terkirim</td>
                      <th>
                        <a href="<?php echo base_url() ?>index.php/dashboard_pegawai_controler/detail/<?= $data_laporan['id_aduan'] ?>" class="">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Lihat
                          </button>
                        </a>
                      </th>
                    </tr>
                  <?php
                  endforeach
                  ?>
                </tbody>
              </table>
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