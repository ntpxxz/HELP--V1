<?php
include_once('..\config\function.php');

session_start();
if (!$_SESSION['role'] == "admin") {
    header("location:../index.php");
    exit();
}
$insert_user = new DB_CON();
if (isset($_POST['insert'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_pass = $_POST['user_pass'];
    $item_name = $_POST['item_name'];
    $user_sec = $_POST['user_sec'];
    $user_reg = $_POST['user_reg'];
    $user_address = $_POST['user_address'];
    $user_mail = $_POST['user_mail'];
    $user_tel = $_POST['user_tel'];
    $user_type = $_POST['user_type'];
    $sql = $insert_user->insert_users($user_id, $user_name, $user_lastname, $user_pass, $item_name, $user_sec, $user_reg, $user_address, $user_mail, $user_tel, $user_type);
    if ($sql) {
        echo "<script>alert('Record Successful');</script>";
        echo "<script>window.location.href='user_tbl.php'</script>";
    } else
        echo "<script>alert('Something went wrong !');</script>";
    echo "<script>window.location.href='#'</script>";

    $_SESSION['name'];
    $_SESSION['profile'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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

    <title>RITH-IT HELPDESK</title>
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure Delete?');
        }
    </script>
</head>

<body>
    <!-- ======= Header ======= -->.
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
                <a class="nav-link collapsed  " href="dash.php">
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
                <a class="nav-link collapsed " href="user_tbl.php">
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
                <a class="nav-link nav-link-active" href="user_ist.php">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

        </ul>
    </aside><!-- End Sidebar-->
    <main id="main" class="main">
        <div class="container">
            <section class="section register  align-items-center justify-content-center ">

                <form action="" method="POST" class="f-user">
                    <div class="row">
                        <div class="col-lg-8 pd-0">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Register Users </h4>
                                    <hr>
                                    <!-- General Form Elements -->

                                    <div class="col-md-12">
                                        <label for="inputEmID" class="form-label">Employee
                                            ID</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id">
                                    </div>
                                    <div class="row g-3 mt-1">
                                        <div class="col-md-6">
                                            <label for="inputname" class="form-label">FirstName</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputlastname" class="form-label">LastName</label>
                                            <input type="text" class="form-control" id="user_lastname" name="user_lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id=" user_pass" name="user_pass">
                                    </div>
                                    <div class="row g-3 mt-1">
                                        <div class="col-lg-4 col-md-4">
                                            <label for="inputPC" class="form-label">PC Name</label>
                                            <input type="text" class="form-control" id="item_name" name="item_name">
                                        </div>

                                        <div class="col-lg-4 col-md-4">
                                            <label for="inputsection" class="form-label">Section</label>
                                            <select id="inputsection" class="form-select" id="user_sec" name="user_sec">
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
                                        <div class="col-lg-4 col-md-auto">
                                            <label for="inputDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="user_reg" name="user_reg">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 ">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <textarea class="form-control" name="user_address" id="user_address" rows="3"></textarea>

                                    </div>
                                    <div class="row g-3 mt-1">
                                        <div class="col-lg-6 col-md-6">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="mail" class="form-control" id="user_mail" name="user_mail">
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="inputTel" class="form-label">Tel</label>
                                            <input type="text" class="form-control" id="user_tel" name="user_tel">
                                        </div>
                                    </div><br>
                                    <div class="row g-3">
                                        <div class="col-lg-12 col-md-12">
                                            <label for="inputstatus" class="form-label">Status</label>
                                            <select id="user_type" class="form-select" name="user_type" value="" placeholder="Choose User Type">
                                                <option value="" "></option>
                                            <option value=" admin">admin</option>
                                                <option value="user">user</option>

                                            </select>
                                        </div>
                                    </div><br>

                                </div>

                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body center">
                                        <div class="row align-items-center justify-content-between ">
                                            <div class="col-md-4 mb-2 mt-2 "><button type="submit" class="btn btn-primary w-100" name="insert">Save</button></div>
                                            <div class="col-md-4 mb-2 mt-2 "> <a href="user_tbl.php" class="btn btn-secondary  w-100" name="cancel">cancel</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        </section>
        <!--END UPDATE USER PHP FUNCTION-->
        </div>
    </main>
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RISO Industry (Thailand)Co.,Ltd.</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

</body>
<!-- Vendor JS Files -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.min.js"></script>
<script src="../assets/vendor/echarts/echarts.min.js"></script>
<script src="../assets/vendor/quill/quill.min.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>
<script src="../assets/js/popup.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="../table-count.js"></script>



</html>