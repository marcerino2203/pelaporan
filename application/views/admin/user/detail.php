<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaporCah.go || Admin</title>

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
              <a href="<?php echo base_url() ?>index.php/admin/dashboard_controler" class="nav-link">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-book"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/admin/laporan_proses_controler" class="nav-link">
                    <i class="nav-icon fa fa-tasks"></i>
                    <p>Laporan Proses</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/admin/laporan_ditangguhkan_controler" class="nav-link">
                    <i class="nav-icon fa fa-ban"></i>
                    <p>Laporan Ditangguhkan</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/admin/laporan_selesai_controler" class="nav-link">
                    <i class="nav-icon fa fa-check"></i>
                    <p>Laporan selesai</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Pengaturan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/admin/user_controler" class="nav-link active">
                    <i class="nav-icon far fa-user"></i>
                    <p>User</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/admin/instansi_controler" class="nav-link ">
                    <i class="nav-icon fa fa-building"></i>
                    <p>Instansi</p>
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
                <li class="breadcrumb-item">
                  <?php
                  foreach ($detail_user->result_array() as $data_user) :
                    $akses = $data_user['akses'];
                  endforeach;
                  ?>
                  <a href="<?php echo base_url() ?>index.php/admin/user_controler">
                    User
                  </a>
                </li>
                <li class="breadcrumb-item active">Detail User <?= $akses ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">Bio Data <?= $akses ?></div>
            <div class="card-body">

              <?php
              if ($id_akses != 3) {
                foreach ($detail_user->result_array() as $data_user) :
                  $keterangan_akses = $data_user['akses'];
                  $id_pegawai = $data_user['id_pegawai'];
                  $nomor_pegawai = $data_user['no_pegawai'];
                  $nama = $data_user['nama'];
                  $alamat = $data_user['alamat'];
                  $password = $data_user['password'];
                  $username = $data_user['username'];
                  $id_instansi = $data_user['id_instansi'];
                endforeach;
              ?>
                <div class="form-group row">
                  <label for="nomor_pegawai" class="col-sm-2 col-form-label">Nomor Pegawai</label>
                  <div class="col-sm-10">
                    : <?= $nomor_pegawai ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    : <?= $nama ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    : -
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    : <?= $username ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    : <?= $password ?>
                  </div>
                </div>
              <?php
              } else {
                foreach ($detail_user->result_array() as $data_user) :
                  $keterangan_akses = $data_user['akses'];
                  $id_masyarakat = $data_user['id_masyarakat'];
                  $nik = $data_user['nik'];
                  $nama = $data_user['nama'];
                  $alamat = $data_user['alamat'];
                  $no_telp = $data_user['no_telp'];
                endforeach;
              ?>
                <div class="form-group row">
                  <label for="nomor_pegawai" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    : <?= $nik ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    : <?= $nama ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    : <?= $no_telp ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nomor_telepon" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    : <?= $alamat ?>
                  </div>
                </div>
              <?php
              } ?>
            </div>
            <div class="card-footer">

            </div>
          </div>
        </div>
      </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <footer class="main-footer">
    </footer>
  </div>
  <!-- ChartJS -->
  <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard3.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;
    });
  </script>


</body>

</html>