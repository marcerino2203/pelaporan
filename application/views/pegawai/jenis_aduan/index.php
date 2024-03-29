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
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/pegawai/dashboard_controler" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/pegawai/proses_controler" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Proses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/pegawai/selesai_controler" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Selesai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/pegawai/ditangguhkan_controler" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Aduan Ditangguhkan</p>
              </a>
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
                  <a href="<?php echo base_url() ?>index.php/pegawai/jenis_aduan_controler" class="nav-link active">
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
              <div class="card-tools" data-toggle="modal" data-target="#modal-jenis-laporan">
                <button type="button" class="btn btn-primary">Buat Jenis Laporan</button>
              </div>
              Jenis Laporan
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Aduan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  foreach ($jenis_aduan->result_array() as $data_jenis_aduan) :
                    $nomor++;
                    $Keterangan = $data_jenis_aduan['keterangan'];
                  ?>
                    <tr>
                      <td><?= $nomor ?></td>
                      <td><?= $Keterangan ?></td>

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

  <div class="modal fade" id="modal-jenis-laporan" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">
            <!-- Lapor -->
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <form id="jenis-laporan" action="<?php echo base_url() ?>index.php/pegawai/jenis_aduan_controler/buat_jenis_laporan" method="POST">
                <div class="form-group">
                  <label for="lokasi">Keterangan Aduan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <button type="submit" form="jenis-laporan" class="btn btn-primary btn-block">Simpan</button>
          </div>
          <div class="float-left">
            <!-- <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">bat</button> -->
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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