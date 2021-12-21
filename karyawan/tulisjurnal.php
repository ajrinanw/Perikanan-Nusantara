<?php

        session_start();
        include_once("koneksi.php");

        $id_user = $_SESSION['user']['id_user'];
        $tmp = mysqli_query($koneksi, "SELECT id_karyawan FROM karyawan WHERE id_user = $id_user");
	    $id_karyawan_temp = mysqli_fetch_assoc($tmp);
	    $id_karyawan = $id_karyawan_temp['id_karyawan'];
        
        if(isset($_POST['submit'])) {
            
            $tanggal = date("Y-m-d");
            $jenis = $_POST['tipe'];
            $keterangan = $_POST['jurnal'];

        $result = mysqli_query($koneksi, "INSERT INTO jurnal(id_karyawan, tanggal, jenis, keterangan) VALUES('$id_karyawan', '$tanggal', '$jenis', '$keterangan')");

        if($result) {
            echo "jurnal berhasil ditambahkan!";
            header("Location: jurnal.php");
        } else {
            echo "gagal menambahkan";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perinus Indonesia</title>

    <link rel="shortcut icon" href="../assets/img/logo_bulat.png" />
    
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
</head>
<body>
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="dashboard.php">
                    <img src="../assets/img/logo1.svg" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="dashboard.php">
                    <img src="../assets/img/logo-mini1.svg" alt="logo" />
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">SELAMAT DATANG DI <span class="text-black fw-bold">JURNAL HARIAN</span></h1>
                    <h3 class="welcome-sub-text">Ringkasan Jurnal Harian mu</h3>
                </li>
            </ul>
        </div>
    </nav>

<div class="container-fluid page-body-wrapper">
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>   
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
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
                    <a class="nav-link" href="Jurnal.php">
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
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="#">Pengambilan Cuti</a></li>
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
                        <li class="nav-item"> <a class="nav-link" href="#">Gaji</a></li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="#">Pinjaman</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="jurnal.php">Kembali</a> <br><br>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-panel">        
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form class="forms-sample" action="" method="POST" name="form2">
                                    
                                        <div class="form-group row">
                                            <label class="form-label" for="tipe">Jenis</label>
                                            <div class="col-sm-9">
                                                <select name="tipe" name="tipe" id="tipe" class="form-control form-control-lg" require>
                                                    <option value="kantor">Harian Kantor</option>
                                                    <option value="dinas">Dinas Luar Kota</option>
                                                    <option value="lembur">Lembur</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea name="jurnal" id="jurnal" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" id="submit" value="Tulis Jurnal">

                                    </form>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
    <!-- plugins:js -->
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