<?php
include('../config/function.php');
session_start();

if (!$_SESSION['role'] == "user") {
    header("location:../index.php");
    exit();
}
$_SESSION['ID'];
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
    <link href="../assets/img/Riso-logo.jpg" rel="icon">
    <link href="../assets/imgRiso-logo.jpg" rel="Riso-logo">

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
            <a href="index.php" class="logo d-flex align-items-center">
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
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6> <?php echo $_SESSION['name']; ?>
                            </h6>
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
                <a class="nav-link  collapsed" href="../index.php">
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
                <a class="nav-link collapsed" href="equip_tbl.php">
                    <i class="bi bi-pc-display"></i><span>Equipments</span>
                </a>
            </li><!-- End Equip Nav -->

            <li class="nav-item">
                <a class="nav-link" href="#">
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
                <a class="nav-link collapsed" href="contact.php">
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
                <h1>Users</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter"></div>

                        <div class="card-body">
                            <!--    ADD USER -->
                            <h5 class="card-title">All User <span> |<a href="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" <i class="bi bi-plus-lg"></i>Add</a></span>
                            </h5>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create an Account</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="row g-3">
                                            <?php
                                            include_once('..\config\function.php');
                                            $insertdata = new DB_CON();
                                            if (isset($_POST['insert'])) {
                                                $user_id = $_POST['user_id'];
                                                $user_name = $_POST['user_name'];
                                                $user_lastname = $_POST['user_lastname'];
                                                $user_pass = $_POST['user_pass'];
                                                $gender = $_POST['gender'];
                                                $user_sec = $_POST['user_sec'];
                                                $user_reg = $_POST['user_reg'];
                                                $user_address = $_POST['user_address'];
                                                $user_mail = $_POST['user_mail'];
                                                $user_tel = $_POST['user_tel'];
                                                $sql = $insertdata->insert_users($user_id, $user_name, $user_lastname,  $user_pass, $gender, $user_sec, $user_reg, $user_address, $user_mail, $user_tel, $user_img);
                                                if ($sql) {
                                                    echo "<script>alert('Record Successful');</script>";
                                                    echo "<script>window.location.href='#'</script>";
                                                } else
                                                    echo "<script>alert('Something went wrong !');</script>";
                                                echo "<script>window.location.href='#'</script>";
                                            }
                                            ?>

                                            <div class="modal-body">
                                                <form action="" method="POST" class="f-user">

                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <!-- General Form Elements -->

                                                            <div class="col-md-12">
                                                                <label for="inputEmID" class="form-label">Employee
                                                                    ID</label>
                                                                <input type="text" class="form-control" id="user_id" name="user_id">
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label for="inputname" class="form-label">FirstName</label>
                                                                    <input type="text" class="form-control" id="user_name" name="user_name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputlastname" class="form-label">LastName</label>
                                                                    <input type="text" class="form-control" id="user_lastname" name="user_lastname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="inputPassword" class="form-label">Password</label>
                                                                <input type="password" class="form-control" id=" user_pass" name="user_pass">
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-lg-4 col-md-4">
                                                                    <label for="inputgender" class="form-label">Gender</label> <br>
                                                                    <input type="radio" name="gender" value="male" id="male">
                                                                    <label for="male">Male</label>

                                                                    <input type="radio" name="gender" value="female" id="female">
                                                                    <label for="female">Female</label>
                                                                </div>

                                                                <div class="col-lg-4 col-md-4">
                                                                    <label for="inputsection" class="form-label">Section</label>
                                                                    <select id="inputsection" class="form-select" id="user_sec" name="user_sec">
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
                                                                <div class="col-lg-4 col-md-auto">
                                                                    <label for="inputDate" class="form-label">Date</label>
                                                                    <input type="date" class="form-control" id="user_reg" name="user_reg">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-12">
                                                                <label for="inputAddress" class="form-label">Address</label>
                                                                <textarea class="form-control" name="user_address" id="user_address" rows="3"></textarea>

                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label for="inputEmail" class="form-label">Email</label>
                                                                    <input type="mail" class="form-control" id="user_mail" name="user_mail">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label for="inputTel" class="form-label">Tel</label>
                                                                    <input type="text" class="form-control" id="user_tel" name="user_tel">
                                                                </div>
                                                            </div><br>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary " name="insert">Add User</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
                                            <td class="column7"><a href=user_udt.php?edit_user=<?php echo $row['user_id']; ?>" class="bi bi-eye"></a></td>
                                            <td class="column8"><a href=user_del.php?del_user=<?php echo $row['user_id']; ?>" class="btn btn-danger" onclick="return checkDelete()"><i class=" bi bi-trash"></i></a></td>
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