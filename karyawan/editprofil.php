<?php
 	session_start();
    include_once("koneksi.php");
	if(isset($_POST['update'])){
		$id_karyawan = $_GET['id_karyawan'];

		$nip = $_POST['nip'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$id_divisi = $_POST['divisi'];
		$id_jabatan = $_POST['jabatan'];
		$result = mysqli_query($koneksi, "UPDATE karyawan SET nip='$nip', nama_karyawan='$nama_karyawan', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', email='$email', telp='$telp', id_divisi='$id_divisi', id_jabatan='$id_jabatan' WHERE id_karyawan=$id_karyawan");
		
		if($result){
            header("Location: profil.php");
        }
        else{
            echo "gagal";
        }
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/img/logo_bulat.png" />
</head>
<body>
    <div class="container-scroller">
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
                        <h1 class="welcome-text">WELCOME, <span class="text-black fw-bold"><?= $_SESSION['user']['username'] ?></span></h1>
                        <h3 class="welcome-sub-text">Your performance summary this week </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="profil.php" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="../assets/img/faces/face8.jpg" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                            <?php
                                include_once("koneksi.php");
                                $id_user = $_SESSION['user']['id_user'];
                                $result = mysqli_query($koneksi, "SELECT karyawan.*, divisi.nama_divisi, jabatan.nama_jabatan FROM karyawan, divisi, jabatan WHERE karyawan.id_divisi = divisi.id_divisi AND karyawan.id_jabatan = jabatan.id_jabatan AND karyawan.id_user = $id_user ORDER BY id_karyawan DESC");	
                                    while($user_data = mysqli_fetch_array($result)) {
                            ?>
                                <img class="img-md rounded-circle" src="../assets/img/faces/face8.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold"><?= $user_data['nama_karyawan'] ?></p>
                                <p class="fw-light text-muted mb-0"><?= $user_data['email'] ?></p>
                            </div>
                            <?php } ?>
                            <a class="dropdown-item" href="profil.php"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item" href="../index.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
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
                                <li class="nav-item"> <a class="nav-link" href="#">Gaji</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">        
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
									
                                    <h4 class="card-title">Profil</h4>
                                    <p class="card-description">
                                        Edit Profil
                                    </p>
                                    <form class="forms-sample" action="" method="POST">
										<?php
											include_once("koneksi.php");
											$result = mysqli_query($koneksi, "SELECT karyawan.*, divisi.nama_divisi, jabatan.nama_jabatan FROM karyawan, divisi, jabatan WHERE karyawan.id_divisi = divisi.id_divisi AND karyawan.id_jabatan = jabatan.id_jabatan ORDER BY id_karyawan DESC");	
												while($user_data = mysqli_fetch_array($result)) {
										?>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NIP</label>
                                            <div class="col-sm-9">
												<input type="hidden" name="id" value=<?= $_GET['id_karyawan']; ?>>
                                                <input type="text" name="nip" class="form-control" require value=<?= $user_data['nip'] ?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Karyawan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_karyawan" class="form-control" require value=<?= $user_data['nama_karyawan'] ?>>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="tempat_lahir" class="form-control" require value=<?= $user_data['tempat_lahir'] ?>>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tanggal" class="form-control" require value=<?= $user_data['tgl_lahir'] ?>>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" require value=<?= $user_data['alamat'] ?>>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">E-mail</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" class="form-control" require value=<?= $user_data['email'] ?>>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telp</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telp" class="form-control" require value=<?= $user_data['telp'] ?>>
                                            </div>
                                        </div>
                                        <?php } ?>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Divisi</label>
                                            <div class="col-sm-9">
                                            <select name="divisi" id="divisi">
													<?php
														include_once("koneksi.php");
														$result = mysqli_query($koneksi, "SELECT * FROM divisi");	
														while($user_data = mysqli_fetch_array($result)) {
													?>
													<option value=<?= $user_data['id_divisi'] ?>><?= $user_data['nama_divisi'] ?></option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
					
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jabatan</label>
                                            <div class="col-sm-9">
                                            <select name="jabatan" id="jabatan">
													<?php
														include_once("koneksi.php");
														$result = mysqli_query($koneksi, "SELECT * FROM jabatan");	
														while($user_data = mysqli_fetch_array($result)) {
													?>
													<option value=<?= $user_data['id_jabatan'] ?>><?= $user_data['nama_jabatan'] ?></option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>

                                        <input type="submit" name="update" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <!-- container-scroller -->

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