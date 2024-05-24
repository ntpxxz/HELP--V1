<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
    header("location:../index.php");
    exit();
}
$_SESSION['name'];
$_SESSION['profile'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>RITH-IT HELPDESK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/favicon.png" rel="Riso-logo">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- CSS only -->


    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
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
            <a href="dash.php" class="logo d-flex align-items-center">
                <img src="../assets/img/Riso-logo.jpg" alt="">
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


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../upload/user_img/<?php echo $_SESSION['profile']; ?>" alt="" class="avatar-sd rounded-circle img-thumbnail">
                        <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?></h6>
                            <span>IT Staff</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="admin_udt.php?edit_admin=<?php echo $_SESSION['ID']; ?>">
                                <i class=" bi bi-gear"></i>
                                <span>Account Setting</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
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
                <a class="nav-link collapsed" href="dash.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="case_tbl.php">
                    <i class="bi bi-tools"></i></i><span>Job Status</span>
                </a>
            </li><!-- End job status Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href=" brr_tbl.php">
                    <i class="bi bi-bag-plus"></i><span>Borrow</span>
                </a>
            </li><!-- End Profile Page Nav -->



            <li class="nav-item">
                <a class="nav-link nav-link-active " href="equip_tbl.php">
                    <i class="bi bi-pc-display"></i><span>Equipments</span>
                </a>
            </li><!-- End Equip Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="user_tbl.php">
                    <i class="bi bi-people"></i><span>Users</span>
                </a>
            </li><!-- End Users Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin_tbl.php">
                    <i class="bi bi-person"></i><span>Admins</span>
                </a>
            </li><!-- End Admins Nav -->

            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link  collapsed"" href=" home_a.php">
                    <i class="bi bi-house"></i>
                    <span>RITH</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin_udt.php?edit_admin=<?php echo $_SESSION['ID']; ?>">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="contact.php">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="user_ist.php">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

        </ul>
    </aside><!-- End Sidebar-->


    <main id="main" class="main">
        <div class="container">
            <div class="row justify-content-center align-item-center">
                <div class="col-lg-12 col-md-12 ">
                    <div class="row justify-content-between">
                        <div class="col-10 ">
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
                        <div class="col-2 mt-2 align-item-end">
                            <span>
                                <a href="export_dv.php" class="btn btn-primary w-100" id="exportButton" name="export">Export CSV</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- End Page Title -->



            <section class="section dashboard">
                <div class="row">
                    <!-- Left side columns -->
                    <div class="col-xxl-12">
                        <div class="row">

                            <!-- Equipment Card -->
                            <div class="col-xxl-4 col-xl-4">
                                <div class="card info-card coms-card">



                                    <div class="card-body">
                                        <h5 class="card-title">All<span>| Equipment</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-pc-display"></i>
                                            </div>
                                            <div class="ps-2"> <?php
                                                                require('../config/dbconnect.php');
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



                                    <div class="card-body">
                                        <h5 class="card-title">Server</h5>
                                        <div class="d-flex align-items-left">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <span class="material-symbols-outlined">
                                                    database
                                                </span>

                                            </div>
                                            <div class="ps-2"><?php
                                                                require('../config/dbconnect.php');
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


                                    <div class="card-body">
                                        <h5 class="card-title">Network</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-wifi"></i>
                                            </div>
                                            <div class="ps-2"><?php
                                                                require('../config/dbconnect.php');
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



                                    <div class="card-body">
                                        <h5 class="card-title">Client</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-video3"></i>
                                            </div>
                                            <d <div class="ps-2"><?php
                                                                    require('../config/dbconnect.php');
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



                                    <div class="card-body">
                                        <h5 class="card-title">Jig</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-tablet-landscape"></i>
                                            </div>
                                            <d <div class="ps-2"><?php
                                                                    require('../config/dbconnect.php');
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
                                <h5 class="card-title">All Equipment <span> |<a href="equip_ist.php" <i class="bi bi-plus-lg"></i>Add</a></span>
                                </h5>
                                <!-- <h5 class="card-title">All Equipment <span> |<a href="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" <i class="bi bi-plus-lg"></i>Add</a></span>
                                </h5> -->
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Register Equipment</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="row g-3">
                                                <?php
                                                include_once('../config/function.php');

                                                $insertdata = new DB_CON();
                                                if (isset($_POST['insert'])) {
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
                                                    $item_warrant = $_POST['item_war'];

                                                    $statusMsg = '';

                                                    date_default_timezone_set('Asia/Bangkok');
                                                    $date = date("Ymd");
                                                    $numrand = (mt_rand());
                                                    $type = strrchr($_FILES['upload']['name'], ".");

                                                    // File upload path
                                                    $path_img = "../upload/item_img/";
                                                    $fileName = $numrand . $date . $type;
                                                    $targetFilePath = $path_img . $fileName;
                                                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                                    if (isset($_POST['insert']) && !empty($_FILES['upload']['name'])) {
                                                        // Allow certain file formats
                                                        $allowTypes = array('jpg', 'png', 'jpeg');
                                                        if (in_array($fileType, $allowTypes)) {
                                                            // Upload file to server
                                                            if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath))
                                                                $sql = $insertdata->insert_items($item_reg, $item_cat, $item_type, $item_id, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_warrant, $fileName);
                                                            if ($sql) {
                                                                echo "<script>alert('Record Successful');</script>";
                                                                echo "<script>window.location.href=''equip_tbl.php'</script>";
                                                            } else
                                                                echo "<script>alert('Someting went wrong !');</script>";
                                                            echo "<script>window.location.href='equip_tbl.php'</script>";
                                                        } else
                                                            echo "<script type='text/javascript'>";
                                                        echo "alert('Sorry, there was an error uploading your file.');";
                                                        echo "window.location = 'equip_tbl.php'; ";
                                                        echo "</script>";
                                                    } else
                                                        echo "<script type='text/javascript'>";
                                                    echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
                                                    echo "window.location = 'equip_tbl.php'; ";
                                                    echo "</script>";
                                                }
                                                ?>


                                                <div class="modal-body">
                                                    <form action="" method="POST" class="f-equip" enctype="multipart/form-data">

                                                        <div class=" col-xl-12">
                                                            <div class="card-body">
                                                                <!-- General Form Elements -->
                                                                <div class="row g-2">
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
                                                                    <div class="col-xxl-6">
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
                                                                            <option selected></option>
                                                                            <option value="AC">AC</option>
                                                                            <option value="ADM">ADM</option>
                                                                            <option value="BOI">BOI</option>
                                                                            <option value="IT">IT</option>
                                                                            <option value="LG">LG</option>
                                                                            <option value="PC">PC</option>
                                                                            <option value="PD">PD</option>
                                                                            <option value="PE">PE</option>
                                                                            <option value="PU">PE</option>
                                                                            <option value="QA">QA</option>
                                                                            <option value="QC">QC</option>
                                                                            <option value="QE">QE</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-xxl-6">
                                                                        <label for=" item_area" class="form-label">Item area</label>
                                                                        <input type="text" class="form-control" id="item_area" name="item_area">
                                                                    </div>
                                                                </div><br>
                                                                <div class="col-lg-12 col-12">
                                                                    <label for="itemDetail class=" form-label">Detail/Specification</label>
                                                                    <textarea class="form-control" name="item_detail" id="item_detail" rows="3"></textarea>

                                                                </div><br>
                                                                <div class="row">
                                                                    <div class="col-xxl-4">
                                                                        <label for=" itemSup" class="form-label">Supplier</label>
                                                                        <input type="text" class="form-control" id="item_sup" name="item_sup">
                                                                    </div>
                                                                    <div class="col-xxl-8">
                                                                        <label for=" Warranty" class="form-label">S/N serial</label>
                                                                        <input type="text" class="form-control" id="item_war" name="item_war">
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-3">
                                                                    <div class="mb-2">
                                                                        <div class="row mb-2 justify-content-center align-items-center">
                                                                            <div class="uploader">
                                                                                <input class="form-control" type="file" id="upload" hidden="" accept="image/*" name="upload" onchange="previewImage(event)">
                                                                                <label for="upload" id="file-drag">
                                                                                    <div class="col-12 mb-2 mt-2 text-center">
                                                                                        <div id="start">
                                                                                            <div class="btn-container">
                                                                                                <img src="../upload/item_img/uppic.png" width="500px" height="Auto" class="rounded w-100" id="uploadImagePreview">
                                                                                            </div>
                                                                                            <div id="notimage" class="hidden">Please select an image</div>
                                                                                        </div>
                                                                                        <div id="response" class="hidden">
                                                                                            <div id="messages"></div>
                                                                                            <progress class="progress" id="file-progress" value="0">
                                                                                                <span>0</span>%
                                                                                            </progress>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>

                                                                <div class="row">
                                                                    <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="insert" value="item_img">Add Equipment</button></div>
                                                                    <div class="col-6"><a href="equip_tbl.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
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
                                            <th scope="col" class="th8">User</th>
                                            <th scope="col" class="th6">Section</th>
                                            <th scope="col" class="th8">Management</th>
                                            <th scope="col" class="th8">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once('../config/function.php');
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

                                                <td class="column7">
                                                    <?php echo $row['item_charger']; ?>
                                                </td>
                                                <td class="column6">
                                                    <?php echo $row['item_sec']; ?>
                                                </td>
                                                <td class="column7"><a href=equip_udt.php?edit_item=<?php echo $row['item_name']; ?> class="bi bi-pencil-square"></a></td>
                                                <td class="column8"><a href=equip_del.php?del_item=<?php echo $row['item_name']; ?> onclick="return checkDelete()"><i class=" bi bi-trash"></i></a></td>
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
        </div>
        </section>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RISO Industry (Thailand)Co.,Ltd.</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/table-count.js"></script>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            var imageField = document.getElementById('uploadImagePreview');

            reader.onload = function() {
                if (reader.readyState == 2) {
                    imageField.src = reader.result;
                }
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>