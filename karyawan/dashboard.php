<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perinus Indonesia</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon1.png" />
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
                    <img src="images/logo1.svg" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="dashboard.php">
                    <img src="images/logo-mini1.svg" alt="logo" />
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top"> 
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?= $_SESSION['user']['username'] ?></span></h1>
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
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                            <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                        </div>
                        <a class="dropdown-item" href="profil.php"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
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
                            <li class="nav-item"><a class="nav-link" href="#">Absensi</a></li>
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
                                                        <div class="card-body">
                                                            <div class="col-sm-8">
                                                                <h3 class="text-white upgrade-info mb-0">
                                                                    Enhance your <span class="fw-bold">Campaign</span> for better outreach
                                                                </h3>
                                                                <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="col-12 grid-margin stretch-card">
                                                    <div class="card card-rounded">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <h4 class="card-title card-title-dash">Todo list</h4>
                                                                        <div class="add-items d-flex mb-0">
                                                                            <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                                                            <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="list-wrapper">
                                                                        <ul class="todo-list todo-list-rounded">
                                                                            <li class="d-block">
                                                                                <div class="form-check w-100">
                                                                                    <label class="form-check-label">
                                                                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                                                    </label>
                                                                                    <div class="d-flex mt-2">
                                                                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                                                                        <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                                                                        <i class="mdi mdi-flag ms-2 flag-color"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="d-block">
                                                                                <div class="form-check w-100">
                                                                                    <label class="form-check-label">
                                                                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                                                    </label>
                                                                                    <div class="d-flex mt-2">
                                                                                        <div class="ps-4 text-small me-3">23 June 2020</div>
                                                                                        <div class="badge badge-opacity-success me-3">Done</div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="form-check w-100">
                                                                                    <label class="form-check-label">
                                                                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                                                    </label>
                                                                                    <div class="d-flex mt-2">
                                                                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                                                                        <div class="badge badge-opacity-success me-3">Done</div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="border-bottom-0">
                                                                                <div class="form-check w-100">
                                                                                    <label class="form-check-label">
                                                                                        <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                                                    </label>
                                                                                    <div class="d-flex mt-2">
                                                                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                                                                        <div class="badge badge-opacity-danger me-3">Expired</div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>
</html>