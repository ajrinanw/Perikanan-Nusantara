<?php
    include_once("koneksi.php");
    $result = mysqli_query($koneksi, "SELECT * FROM jurnal ORDER BY id_jurnal DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikanan Nusantara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="tulisjurnal.php">Tulis Jurnal</a> <br><br>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-panel">        
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Halaman Jurnal Harian</h4>
                                <form class="form-sample">
                                    <p class="card-description">
                                        Jurnal Harian
                                    </p>
                                    <div class="row">
                                        <div class ="col-lg-6 offset-lg-3 mt-3">
                                            <div class="card">
                                                <table class="table table-striped table-bordered">
                                                    <tr>
                                                        <th scope="col">Nomor</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Jenis</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                    <?php
                                                        $i = 1;
                                                        while($user_data = mysqli_fetch_array($result)) {
                                                            echo "<tr>";
                                                            echo "<td>".$i++."</td>";
                                                            echo "<td>".$user_data['tanggal']."</td>";
                                                            echo "<td>".$user_data['jenis']."</td>";
                                                            echo "<td>".$user_data['keterangan']."</td>";
                                                            echo "<td><a href='delete.php?id=".$user_data['id_jurnal']."'>Delete</a></td>";
                                                            echo "</tr>";
                                                        }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

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