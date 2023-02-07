<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaporCah.go || Dashboard</title>

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
        <!-- <li class="nav-item dropdown">
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
        </li> -->
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
              <a href="<?php echo base_url() ?>index.php/warga/dashboard_controler" class="nav-link">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item active">
              <a href="<?php echo base_url() ?>index.php/warga/aduan_controler" class="nav-link active">
                <i class="fas fa-flag nav-icon"></i>
                <p>Aduan</p>
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
                  <a href="<?php echo base_url() ?>index.php/warga/akun_controler" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>Akun</p>
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
                <li class="breadcrumb-item">Aduan</li>
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
                <button type="button" class="btn btn-primary">Buat Laporan</button>
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
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($last_code->result_array() == null) {
                    $nomor_aduan = "AD/001";
                  } else {
                    foreach ($last_code->result_array() as $last_code) :
                      if ($last_code['nomor_aduan'] != null) {
                        $explode_kode = explode("/", $last_code['nomor_aduan']);
                        $last_explode_kode = end($explode_kode) + 1;
                        $last_explode_kode = sprintf("%03s", ($last_explode_kode));
                        $nomor_aduan = "AD/" . $last_explode_kode;
                      } else {
                        $nomor_aduan = "AD/001";
                      }
                    endforeach;
                  }
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
                      <td><?= $data_laporan['status'] ?></td>
                      <th>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="<?php echo base_url() ?>index.php/warga/aduan_controler/detail/<?= $data_laporan['id_aduan'] ?>" class="">
                            <button type="button" class="btn btn-info">
                              <i class="fa fa-search" aria-hidden="true"></i>
                              <!-- Detail -->
                            </button>
                          </a>
                          <a href="<?php echo base_url() ?>index.php/warga/aduan_controler/edit/<?= $data_laporan['id_aduan'] ?>" class="">
                            <button type="button" class="btn btn-secondary">
                              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </button>
                          </a>
                          <div class="card-tools" data-toggle="modal" data-target="#modal-hapus">
                            <button type="button" class="btn btn-danger">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                              <!-- Hapus -->
                            </button>
                          </div>
                        </div>
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

  <div class="modal fade" id="modal-lapor" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">
            Lapor
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <form id="laporan" action="<?php echo base_url() ?>index.php/warga/aduan_controler/buat_laporan" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="lokasi">Nomor Aduan</label>
                  <input type="text" class="form-control" name="nomor_aduan" id="nomor_aduan" value="<?= $nomor_aduan ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                  <input type="text" class="form-control" name="lokasi" id="lokasi">
                </div>
                <div class="form-group">
                  <label for="keterangan">Jenis Aduan</label>
                  <select class="form-control" aria-label="Default select example" name="jenis_aduan" id="jenis_aduan">
                    <option selected></option>
                    <?php
                    foreach ($jenis_aduan->result_array() as $data_jenis_aduan) :
                      $nomor++;
                    ?>
                      <option value="<?= $data_jenis_aduan['id_jenis_aduan'] ?>"><?= $data_jenis_aduan['keterangan'] ?></option>
                    <?php
                    endforeach
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Berikan keterangan ..."></textarea>
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <button type="submit" form="laporan" class="btn btn-primary btn-block">Simpan</button>
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
  <div class="modal fade" id="modal-hapus" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">
            Perhatian
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin ingin menghapus laporan anda ?
        </div>
        <div class="card-footer">
          <div class="float-right">
            <a href="<?php echo base_url() ?>index.php/warga/aduan_controler/hapus_laporan/<?= $data_laporan['id_aduan'] ?>" class="">
              <button type="button" form="laporan" class="btn btn-danger btn-block">Ya</button>
            </a>
          </div>
          <div class="float-left">
            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Tidak</button>
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