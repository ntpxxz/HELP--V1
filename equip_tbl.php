<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RITH-IT HELPDESK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/Riso-logo.jpg" rel="icon">
    <link href="assets/imgRiso-logo.jpg" rel="Riso-logo">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure Delete?');
        }
    </script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/Riso-logo.jpg" alt="">
                <!--<span class="d-none d-lg-block">NiceAdmin</span>-->
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/logo mofuu V2.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>RITH TESTADMIN</h6>
                            <span>IT Staff</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link  collapsed" href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" " href=" job_status.php">
                    <i class="bi bi-tools"></i></i><span>Job Status</span>
                </a>
            </li><!-- End job status Nav -->

            <li class="nav-item">
                <a class="nav-link " href="#">
                    <i class="bi bi-pc-display"></i><span>Equipments</span>
                </a>
            </li><!-- End Equip Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="tbl_user.php">
                    <i class="bi bi-people"></i><span>Users</span>
                </a>
            </li><!-- End Users Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Admins</span>
                </a>
            </li><!-- End Admins Nav -->

            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="bi bi-house"></i>
                    <span>RITH</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="insertuser.html">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="row">
            <div class="pagetitle">
                <h1>Equipment</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Equipment</a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>

                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col">
                    <div class="row">

                        <!-- Equipment Card -->
                        <div class="col-xxl-4 col-xl-4">
                            <div class="card info-card users-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">All<span>| Equipment</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-pc-display"></i>
                                        </div>
                                        <div class="ps-2"> <?php
                                                            require('config/dbconnect.php');
                                                            $sql = "SELECT COUNT(item_name) as total
                                                            FROM rith_item ";
                                                            $result = mysqli_query($connect, $sql);
                                                            $total = mysqli_fetch_assoc($result);
                                                            ?>
                                            <h6><?php echo $total['total']; ?></h6>
                                            <span class="text-muted small pt-2 ps-1">unit</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End users Card -->

                        <!-- Equips Card -->
                        <div class="col-xxl-2 col-xl-2">
                            <div class="card info-card equips-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Server</h5>
                                    <div class="d-flex align-items-left">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <span class="material-symbols-outlined">
                                                database
                                            </span>

                                        </div>
                                        <div class="ps-2"><?php
                                                            require('config/dbconnect.php');
                                                            $sql = "SELECT COUNT(item_cat) as server
                                                            FROM rith_item WHERE item_cat = 'Server'";
                                                            $result = mysqli_query($connect, $sql);
                                                            $server = mysqli_fetch_assoc($result);
                                                            ?>
                                            <h6><?php echo $server['server']; ?></h6>
                                            <span class="text-muted small pt-2 ps-1">unit</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Server Card -->

                        <!--  Fixing Card -->
                        <div class="col-xxl-2 col-xl-2">

                            <div class="card info-card jobs-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Network</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wifi"></i>
                                        </div>
                                        <div class="ps-2"><?php
                                                            require('config/dbconnect.php');
                                                            $sql = "SELECT COUNT(item_cat) as network
                                                            FROM rith_item WHERE item_cat = 'Network'";
                                                            $result = mysqli_query($connect, $sql);
                                                            $network = mysqli_fetch_assoc($result);
                                                            ?>
                                            <h6><?php echo $network['network']; ?></h6>
                                            <span class="text-muted small pt-2 ps-1">unit</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Network Card -->

                        <!-- Client Card -->
                        <div class="col-xxl-2 col-xl-2">
                            <div class="card info-card client-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Client</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-video3"></i>
                                        </div>
                                        <d <div class="ps-2"><?php
                                                                require('config/dbconnect.php');
                                                                $sql = "SELECT COUNT(item_cat) as client
                                                            FROM rith_item WHERE item_cat = 'Clients'";
                                                                $result = mysqli_query($connect, $sql);
                                                                $client = mysqli_fetch_assoc($result);
                                                                ?>
                                            <h6><?php echo $client['client']; ?></h6>
                                            <span class="text-muted small pt-2 ps-1">unit</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- End Client Card -->

                        <!-- Jig Card -->
                        <div class="col-xxl-2 col-xl-2">
                            <div class="card info-card cancel-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Jig</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-tablet-landscape"></i>
                                        </div>
                                        <d <div class="ps-2"><?php
                                                                require('config/dbconnect.php');
                                                                $sql = "SELECT COUNT(item_cat) as jig
                                                            FROM rith_item WHERE item_cat = 'Jig'";
                                                                $result = mysqli_query($connect, $sql);
                                                                $jig = mysqli_fetch_assoc($result);
                                                                ?>
                                            <h6><?php echo $jig['jig']; ?></h6>
                                            <span class="text-muted small pt-2 ps-1">unit</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Jig Card -->

                <!--    ADD EQUIPMENT -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter"></div>


                        <div class="card-body">
                            <!--    ADD EQUIPMENT -->
                            <h5 class="card-title">All Equipment <span> |<a href="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" <i class="bi bi-plus-lg"></i>Add</a></span>
                            </h5>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Register Equipment</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="row g-3">
                                            <?php
                                            include_once('config\function.php');
                                            $insertdata = new DB_CON();
                                            if (isset($_POST['insertEQ'])) {
                                                $item_reg = $_POST['item_reg'];
                                                $item_cat = $_POST['item_cat'];
                                                $item_type = $_POST['item_type'];
                                                $item_id = $_POST['item_id'];
                                                $item_name = $_POST['item_name'];
                                                $item_charger = $_POST['item_charger'];
                                                $item_sec = $_POST['item_sec'];
                                                $item_area = $_POST['item_area'];
                                                $item_detail = $_POST['item_detail'];
                                                $item_sup = $_POST['item_sup'];
                                                $sql = $insertdata->insert_items($item_reg, $item_cat, $item_type, $item_id, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup);
                                                if ($sql) {
                                                    echo "<script>alert('Record Successful');</script>";
                                                    echo "<script>window.location.href='#'</script>";
                                                } else
                                                    echo "<script>alert('Something went wrong !');</script>";
                                                echo "<script>window.location.href='#'</script>";
                                            }
                                            ?>


                                            <div class="modal-body">
                                                <form action="" method="POST" class="f-equip">

                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <!-- General Form Elements -->
                                                            <div class="row">
                                                                <div class="col-xxl-4">
                                                                    <label for="itemReg" class=" form-label">Register
                                                                        Date</label>
                                                                    <input type="date" class="form-control" id="item_reg" name="item_reg">
                                                                </div>

                                                                <div class="col-xxl-4 col-xl-4">
                                                                    <label for="item_cat" class="form-label">Catagories</label>
                                                                    <select id="item_cat" class="form-select" name="item_cat">
                                                                        <option selected>Choose...</option>
                                                                        <option value="Client">Client</option>
                                                                        <option value="Jig">Jig</option>
                                                                        <option value="Network">Network</option>
                                                                        <option value="Server">Server</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-xxl-4 col-xl-4">
                                                                    <label for="item_type" class="form-label">Type</label>
                                                                    <select id=inputtype" class="form-select" name="item_type">
                                                                        <option selected>Choose...</option>
                                                                        <option value="AD Server">AD Server</option>
                                                                        <option value="AC Server">AC Server</option>
                                                                        <option value="AP Controller">AP Controller
                                                                        </option>
                                                                        <option value="AP Wifi">AP Wifi</option>
                                                                        <option value="Backup Server">Backup Server
                                                                        </option>
                                                                        <option value="Desktop" type="text">Desktop
                                                                        </option>
                                                                        <option value="File Server">File Server</option>
                                                                        <option value="HUB">HUB</option>
                                                                        <option value="Notebook">Notebook</option>
                                                                        <option value="Tablet" type="text">Tablet
                                                                        </option>
                                                                        <option value="UPS">UPS</option>
                                                                    </select>
                                                                </div><br>
                                                            </div><br>

                                                            <div class="row g-3">
                                                                <div class="col-xxl-6">
                                                                    <label for="assNo" class="form-label">Asses
                                                                        No.</label>
                                                                    <input type="text" class="form-control" id="item_id" name="item_id">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="assName" class=" form-label">Equipment
                                                                        Name</label>
                                                                    <input type="text" class="form-control" id="item_name" name="item_name">
                                                                </div>
                                                            </div><br>
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <label for="itemCharger" class="form-label">User/Charger</label>
                                                                    <input type="text" class="form-control" id="item_charger" name="item_charger">
                                                                </div>
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col-xxl-6">
                                                                    <label for="itemSec" class="form-label">Section</label>
                                                                    <select id="inputsecSec" class="form-select" id="item_sec" name="item_sec">
                                                                        <option selected>Choose...</option>
                                                                        <option value="IT">IT</option>
                                                                        <option value="PE">PE</option>
                                                                        <option value="PD">PD</option>
                                                                        <option value="QE">QE</option>
                                                                        <option value="QC">QC</option>
                                                                        <option value="LOG">LOG</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xxl-6">
                                                                    <label for=" item_area" class="form-label">Item
                                                                        area</label>
                                                                    <input type="text" class="form-control" id="item_area" name="item_area">
                                                                </div>
                                                            </div><br>
                                                            <div class="col-lg-12 col-12">
                                                                <label for="itemDetail class=" form-label">Detail/Specification</label>
                                                                <textarea class="form-control" name="item_detail" id="item_detail" rows="3"></textarea>

                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col-xxl-12">
                                                                    <label for="itemSup" class="form-label">Supplier</label>
                                                                    <select id="inputSup" class="form-select" name="item_sup">
                                                                        <option selected>Choose...</option>
                                                                        <option value="FDI">FDI</option>
                                                                        <option value="CSL / BTMU-3">CSL / BTMU-3</option>
                                                                        <option value="JPN">JPN</option>
                                                                        <option value="MAT">MAT</option>
                                                                        <option value="NTT">NTT</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div><br>

                                                            <div class="row g-3">
                                                                <div class="mb-2">
                                                                    <label for="formFileMultiple" class="form-label">Image</label>
                                                                    <input class="form-control" type="file" id="formFileMultiple" name="item_img">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary " name="insertEQ">Add Equipment</button>
                                                                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--END MODAL USER INSERT-->
                            <!--  END ADD USER-->
                            <!--  TABLE EQUIPMENTS DATA -->
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="th1">No</th>
                                        <th scope="col" class="th2">Type</th>
                                        <th scope="col" class="th3">Name</th>
                                        <th scope="col" class="th4">Detail</th>
                                        <th scope="col" class="th5">Area</th>
                                        <th scope="col" class="th3">User</th>
                                        <th scope="col" class="th6">Section</th>
                                        <th scope="col" class="th8">Management</th>
                                        <th scope="col" class="th8">Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('config\function.php');
                                    $fetchdata = new DB_CON();
                                    $sql = $fetchdata->fetchdata_items();
                                    $count = mysqli_num_rows($sql);
                                    $order = 1;
                                    while ($row = mysqli_fetch_array($sql)) {

                                    ?>

                                        <tr>
                                            <td class="column1"><?php echo $order++; ?></td>
                                            <td class="column2">
                                                <?php echo $row['item_cat']; ?>
                                            </td>
                                            <td class="column3">
                                                <?php echo $row['item_name']; ?>
                                            </td>
                                            <td class="column3">
                                                <?php echo $row['item_detail']; ?>
                                            </td>
                                            <td class="column6">
                                                <?php echo $row['item_area']; ?>
                                            </td>

                                            <td class="column3">
                                                <?php echo $row['item_charger']; ?>
                                            </td>
                                            <td class="column6">
                                                <?php echo $row['item_sec']; ?>
                                            </td>
                                            <td class="column7"><a href=equip_update.php?edit_item=<?php echo $row['item_name']; ?> class="bi bi-three-dots-vertical"></a></td>
                                            <td class="column8"><a href=equip_del.php?del_item=<?php echo $row['item_name']; ?>" class="btn btn-danger" onclick="return checkDelete()"><i class=" bi bi-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <!-- END TABLE  USER DATA -->

                        </div>

                    </div>
                </div><!-- End jobs status -->
            </div>
            </div><!-- End Left side columns -->

        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/table-count.js"></script>
</body>

</html>