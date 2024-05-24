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

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


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
                <a class="nav-link collapsed " href="dash.php">
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
                <a class="nav-link collapsed" href="equip_tbl.php">
                    <i class="bi bi-pc-display"></i><span>Equipments</span>
                </a>
            </li><!-- End Equip Nav -->

            <li class="nav-item">
                <a class="nav-link nav-link-active" href="user_tbl.php">
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
                                <h1>Users</h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">User</a></li>
                                        <li class="breadcrumb-item active">Overview</li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                        <div class="col-2 mt-2 ">
                            <span>
                                <a href="export_us.php" class="btn btn-primary w-100" id="exportButton" name="export">Export CSV</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- End Page Title -->
            <!-- End Page Title -->
            <section class="section dashboard">
                <div class="row gx-2">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter"></div>

                            <div class="card-body">
                                <!--    ADD USER -->
                                <h5 class="card-title">All User <span> |<a href="user_ist.php" <i class="bi bi-plus-lg"></i>Add</a></span>
                                </h5>
                                <!-- Modal -->

                                <!--END MODAL USER INSERT-->
                                <!--  END ADD USER -->
                                <!--  TABLE USER DATA -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="th1">No</th>
                                            <th scope="col" class="th2">EmployeeID</th>
                                            <th scope="col" class="th3">Name</th>
                                            <th scope="col" class="th4">LastName</th>
                                            <th scope="col" class="th5">Section</th>
                                            <th scope="col" class="th6">Email</th>
                                            <th scope="col" class="th7">Tel</th>
                                            <th scope="col" class="th8">Management</th>
                                            <th scope="col" class="th8">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once('..\config\function.php');
                                        $fetchdata = new DB_CON();
                                        $sql = $fetchdata->fetchdata_users();
                                        $count = mysqli_num_rows($sql);
                                        $order = 1;
                                        while ($row = mysqli_fetch_array($sql)) {

                                        ?>

                                            <tr>
                                                <td class="column1"><?php echo $order++; ?></td>
                                                <td class="column2">
                                                    <?php echo $row['user_id']; ?>
                                                </td>
                                                <td class="column3">
                                                    <?php echo $row['user_name']; ?>
                                                </td>
                                                <td class="column3">
                                                    <?php echo $row['user_lastname']; ?>
                                                </td>

                                                <td class="column6">
                                                    <?php echo $row['user_sec']; ?>
                                                </td>
                                                <td class="column6">
                                                    <?php echo $row['user_mail']; ?>
                                                </td>
                                                <td class="column6">
                                                    <?php echo $row['user_tel']; ?>
                                                </td>
                                                <td class="column7"><a href=user_udt.php?edit_user=<?php echo $row['user_id']; ?>" class="bi bi-pencil-square"></a></td>
                                                <td class="column8"><a href=user_del.php?del_user=<?php echo $row['user_id']; ?>" onclick="return checkDelete()"><i class=" bi bi-trash"></i></a></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <!-- END TABLE  USER DATA -->
                            </div>
                        </div><!-- End jobs status -->
                    </div>
                </div><!-- End Left side columns -->

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

</body>

</html>