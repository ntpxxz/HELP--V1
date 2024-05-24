<?php
include_once('config\function.php');
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
    $sql = $insertdata->insert_items($item_reg, $item_cat, $item_type, $item_id, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup);
    if ($sql) {
        echo "<script>alert('Record Successful');</script>";
        echo "<script>window.location.href='#'</script>";
    } else
        echo "<script>alert('Someting went wrong !');</script>";
    echo "<script>window.location.href='#'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="assets/img/Riso-logo.jpg" rel="icon">
    <link href="assets/imgRiso-logo.jpg" rel="Riso-logo">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure Delete?');
        }
    </script>

    <title>Insert EQUIPMENTS</title>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <nav class="navbar navbar-expand-lg navbar">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-around">
                    <a href="index.php" class="logo d-flex ">
                        <img src="assets/img/Riso-logo.jpg" alt="">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">แจ้งซ่อม</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">สถานะงาน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">ติดต่อ</a>
                                </li>
                            </div>
                </div>
                </button>
            </div>
        </nav>

        <!-- End Logo -->

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
                    </a><!-- End Profile Image Icon -->

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



    <!-- ADD EQUIPMENT -->
    <main id="main-center" class="main">

        <div class="container">

            <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
                <div class="container">

                    <form action="" method="POST" class="form-job">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body center ">

                                        <h4 class="card-title text-center">Register Equipment</h4>
                                        <hr>
                                        <!-- General Form Elements -->
                                        <div class="row">
                                            <div class="col-xxl-4">
                                                <label for="itemReg" class=" form-label">Register Date</label>
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
                                                <select id="item_type" class="form-select" name="item_type">
                                                    <option selected>Choose...</option>
                                                    <option value="AD Server">AD Server</option>
                                                    <option value="AC Server">AC Server</option>
                                                    <option value="AP Controller">AP Controller</option>
                                                    <option value="AP Wifi">AP Wifi</option>
                                                    <option value="Backup Server">Backup Server</option>
                                                    <option value="Desktop" type="text">Desktop</option>
                                                    <option value="File Server">File Server</option>
                                                    <option value="HUB">HUB</option>
                                                    <option value="Notebook">Notebook</option>
                                                    <option value="Tablet" type="text">Tablet</option>
                                                    <option value="UPS">UPS</option>
                                                </select>
                                            </div><br>
                                        </div><br>

                                        <div class="row g-3">
                                            <div class="col-xxl-6">
                                                <label for="assNo" class="form-label">Asses No.</label>
                                                <input type="text" class="form-control" id="item_id" name="item_id">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="assName" class=" form-label">Equipment Name</label>
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
                                                <select id="itemSec" class="form-select" id="item_sec" name="item_sec">
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
                                                <label for=" item_area" class="form-label">Item area</label>
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
                                                <select id="itemSup" class="form-select" name="item_sup">
                                                    <option selected>Choose...</option>
                                                    <option value="FDI">FDI</option>
                                                    <option value="CSL / BTMU-3">CSL / BTMU-3</option>
                                                    <option value="JPN">JPN</option>
                                                    <option value="MAT">MAT</option>
                                                    <option value="NTT">QE</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div><br>

                                  
                                        <button type="submit" class="btn btn-primary w-25 margin:5px" name="insert">Save</button>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp
                                        <a href="equip_tbl.php" class="btn btn-secondary w-25" name="cancel">
                                            cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </section>
            <!--END UPDATE USER PHP FUNCTION-->

        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer ">
        <div class="copyright text-center">
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