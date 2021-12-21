<?php

        session_start();
        include_once("koneksi.php");

        $id_user = $_SESSION['user']['id_user'];
        $id_karyawan = mysqli_query($koneksi, "SELECT id_karyawan FROM karyawan WHERE id_user = $id_user");
        
        if(isset($_POST['submit'])) {
            
            $keterangan = $_POST['tipe'];

        $result = mysqli_query($koneksi, "INSERT INTO presensi(keterangan) VALUES('$keterangan')");

        if($result) {
            echo "Presensi berhasil ditambahkan!";
            header("Location: dashboard.php");
        } else {
            echo "gagal menambahkan";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Perikanan Nusantara</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/img/logo_bulat.png" />
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="../assets/img/logo1.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../assets/img/logo-mini1.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">WELCOME TO, <span class="text-black fw-bold">Absensi Karyawan</span></h1>
            <h3 class="welcome-sub-text">Silahkan isi Presensi Anda! </h3>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

    <!-- sidebar -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Event</li>
          <li class="nav-item">
            <a class="nav-link" href="jurnal.php">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Jurnal Harian</span>
            </a>
          </li>
          <li class="nav-item nav-category">Data</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-calendar-check"></i>
              <span class="menu-title">Kehadiran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="absensi.php">Absensi</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-cash-multiple"></i>
              <span class="menu-title">Keuangan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="gaji.php">Gaji</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                            <div class="content-wrapper">
                                  <!-- check in check out -->
                                <div class="login-box">
  	                              <div class="login-logo">
  		                              <p id="date"></p>
                                    <p id="time" class="bold"></p>
  	                              </div>
  
  	                              <div class="login-box-body">
    	                              <form id="presensi" action="" method="POST" name="form3">
                                      <div class="form-group">
                                      <select name="tipe" name="tipe" id="tipe" class="form-control form-control-lg" require>
                                        <option value="hadir">Hadir</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="izin">Izin</option>
                                      </select>
                                    </div>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <input type="submit" name="submit" id="submit" value="presensi">
                                      </div>
                                    </div>
                                </form>
                              </div>
                              <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
                              </div>
                              <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
                            </div>	
                          </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

<!-- plugins:js -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/moment/moment.js"></script>

<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>