<?php
include_once('config\function.php');
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
  $sql = $insertdata->insert_users($user_id, $user_name, $user_lastname,  $user_pass, $gender, $user_sec, $user_reg, $user_address, $user_mail, $user_tel);
  if ($sql) {
    echo "<script>alert('Record Successful');</script>";
    echo "<script>window.location.href='index.php'</script>";
  } else
    echo "<script>alert('Someting went wrong !');</script>";
  echo "<script>window.location.href='index.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>INSERT DATA USER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">


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
      <nav class="navbar navbar-expand-lg navbar">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-around">
            <a href="index.html" class="logo d-flex ">
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

    <main id="main-center" class="main">

      <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
        <div class="container">

          <form action="" method="POST" class="fuser">
            <div class="row g-3">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">

                    <h5 class="card-title text-center">Create an Account</h5>
                    <!-- General Form Elements -->
                    <div class="col-md-12">
                      <label for="inputEmID" class="form-label">Employee ID</label>
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
                    <button type="submit" class="btn btn-primary w-100" name="insert">Save</button>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      </section>
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

  </body>

  </html>