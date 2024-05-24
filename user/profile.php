<?php
include_once('..\config\function.php');
$fetchdata = new DB_CON();
$sql = $fetchdata->fetchdata_users();
$count = mysqli_num_rows($sql);
$order = 1;
while ($row = mysqli_fetch_array($sql))

  if (!isset($_SESSION)) {

    session_start();
    if (!$_SESSION['role'] = "user") {  //check session
      Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form }    
    }
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RITH-Helpdesk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">



    <link href="../assets/css/style_u.css" rel="stylesheet">

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
      <nav class="navbar navbar-expand-lg" style="background-color: #ffffff;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="../assets/img/Riso-logo.jpg" alt="" width="100px" height="30px"></a>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="home_u.php">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="case_tbl.php">สถานะงานซ่อม</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  " href="case_ist.php">แจ้งซ่อม</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contract.php">ติดต่อ</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center  pe-0" href="#" data-bs-toggle="dropdown">
              <img src="../upload/user_img/<?php echo $_SESSION['profile']; ?>" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="profile.php">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
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
    <main id="main" class="main">
      <div class="container">
        <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../assets/img/profile-img.jpg" alt="Admin" class="rounded-circle" width="150px">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['name']; ?></h4>
                      <p class="text-muted font-size-sm"> Emp ID: <?php echo $row['user_id']; ?></p>
                      <button class="btn btn-outline-primary"><?php echo $row['user_mail']; ?></button>
                    </div>
                  </div>
                  <br>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Full Name</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_name']; ?> <?php echo $row['user_lastname']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Employee ID</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_id']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Email</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_mail']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Section</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_sec']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Phone</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_tel']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">

                      <h6 class="mb-0"><b>Address</b></h6>

                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_address']; ?>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script src="../assets/js/popup.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../table-count.js"></script>


  </body>

  </html>
<?php } ?>