<?php
include('config/dbconnect.php');
if (!isset($_SESSION)) {
    session_start();
    if (!$_SESSION['role']) {  //check session
        Header("Location: pages-login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form }    
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Dashboard - NiceAdmin Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
        <!-- CSS only -->


        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6><?php echo $_SESSION['name']; ?></h6>
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
                                <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
                    <a class="nav-link " href="admin/dash.php">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="admin/case_tbl.php">
                        <i class="bi bi-tools"></i></i><span>Job Status</span>
                    </a>
                </li><!-- End job status Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="admin/equip_tbl.php">
                        <i class="bi bi-pc-display"></i><span>Equipments</span>
                    </a>
                </li><!-- End Equip Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="admin/user_tbl.php">
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
                    <a class="nav-link  collapsed"" href=" index.php">
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

            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-xxl-12">
                        <div class="row">

                            <!-- users Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card users-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>
                                            <!--<li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    -->
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Users<span>| All</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>145</h6>
                                                <span class="text-muted small pt-2 ps-1">Account</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End users Card -->

                            <!-- Equips Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card equips-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>
                                            <!--<li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    -->
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Equipments<span>| All</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-pc-display-horizontal"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>160</h6>
                                                <span class="text-muted small pt-2 ps-1">Unit</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Equips Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-4 col-xl-12">

                                <div class="card info-card jobs-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <!--<li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>-->
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Jobs<span>| Success</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-wrench"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>1244</h6>
                                                <span class="text-muted small pt-2 ps-1">Job</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End jobs Card -->



                            <!-- Reports -->
                            <div class="col-xl-12">
                                <div class="card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Reports <span>/Today</span></h5>

                                        <!-- Line Chart -->
                                        <div id="reportsChart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#reportsChart"), {
                                                    series: [{
                                                        name: 'Sales',
                                                        data: [31, 40, 28, 51, 42, 82, 56],
                                                    }, {
                                                        name: 'Revenue',
                                                        data: [11, 32, 45, 32, 34, 52, 41]
                                                    }, {
                                                        name: 'Customers',
                                                        data: [15, 11, 32, 18, 9, 24, 11]
                                                    }],
                                                    chart: {
                                                        height: 350,
                                                        type: 'area',
                                                        toolbar: {
                                                            show: false
                                                        },
                                                    },
                                                    markers: {
                                                        size: 4
                                                    },
                                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                    fill: {
                                                        type: "gradient",
                                                        gradient: {
                                                            shadeIntensity: 1,
                                                            opacityFrom: 0.3,
                                                            opacityTo: 0.4,
                                                            stops: [0, 90, 100]
                                                        }
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        curve: 'smooth',
                                                        width: 2
                                                    },
                                                    xaxis: {
                                                        type: 'datetime',
                                                        categories: ["2018-09-19T00:00:00.000Z",
                                                            "2018-09-19T01:30:00.000Z",
                                                            "2018-09-19T02:30:00.000Z",
                                                            "2018-09-19T03:30:00.000Z",
                                                            "2018-09-19T04:30:00.000Z",
                                                            "2018-09-19T05:30:00.000Z",
                                                            "2018-09-19T06:30:00.000Z"
                                                        ]
                                                    },
                                                    tooltip: {
                                                        x: {
                                                            format: 'dd/MM/yy HH:mm'
                                                        },
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Line Chart -->

                                    </div>

                                </div>
                            </div><!-- End Reports -->

                            <!-- job Status -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">All jobs <span>| Today</span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>

                                                    <th scope="col" class="th1">No</th>
                                                    <th scope="col" class="th2">Case ID</th>
                                                    <th scope="col" class="th3">Name</th>
                                                    <th scope="col" class="th4">Section</th>
                                                    <th scope="col" class="th5">Equip ID</th>
                                                    <th scope="col" class="th6">Detail</th>
                                                    <th scope="col" class="th7">Management</th>
                                                    <th scope="col" class="th8">Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once('config\function.php');
                                                $fetchdata = new DB_CON();
                                                $sql = $fetchdata->fetchdata_jobs();
                                                $count = mysqli_num_rows($sql);
                                                $order = 1;
                                                while ($row = mysqli_fetch_assoc($sql)) {

                                                ?>

                                                    <tr>
                                                        <td class="column1"><?php echo $order++; ?></td>
                                                        <td class="column2">
                                                            <?php echo $row['job_id']; ?>
                                                        </td>
                                                        <td class="column3">
                                                            <?php echo $row['user_name']; ?>
                                                        </td>
                                                        <td class="column4">
                                                            <?php echo $row['user_sec']; ?>
                                                        </td>
                                                        <td class="column5">
                                                            <?php echo $row['item_name']; ?>
                                                        </td>
                                                        <td class="column6">
                                                            <?php echo $row['job_detail']; ?>
                                                        </td>
                                                        <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
                                                        <td class="column8"><span class="badge bg-success">Success</span></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>

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
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
        </script>
        <script src="assets/js/popup.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        <script src="table-count.js"></script>



    </body>

    </html>
<?php } ?>