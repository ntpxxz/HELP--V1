<?php
include_once('..\config\function.php');
session_start();
if (!isset($_SESSION)) {
  if (!$_SESSION['role'] == "user") {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
    exit();
  }
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

  <title>RITH-Helpdesk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/favicon.png" rel="Riso-logo">

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

  <link rel="stylesheet" href="../assets/css/templatemo.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">


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
  <nav id="main_nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow mb-4 px-0">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand h1" href="home_u.php">
        <img src="../assets/img/Riso-logo.jpg" alt="" width="100px" height="30px"></a>
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="align-self-center navbar-collapse flex-fill d-lg-flex justify-content-lg-between collapse show" id="navbar-toggler-success" style="">
        <div class="flex-fill mx-xl-4 mb-2">
          <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
            <li class="nav-item">
              <a class="nav-link btn-outline-primary rounded-pill px-3" href="home_u.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active rounded-pill px-3" href="case_tbl.php">Job Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_ist.php">Request Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="#">Borrow Equipment</a>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
        <div class="navbar align-self-center d-flex dropdown">

          <a class="nav-link nav-profile align-items-center pe-3" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-4"><img src="../upload/user_img/<?php echo $_SESSION['profile']; ?>" alt="" class="rounded-circle avatar-md-2 img-thumbnail">
              <?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown-menu-light profile">
            <li class="dropdown-header">
              <h6> <?php echo $_SESSION['name']; ?> </h6>
              <span>IT Staff</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center mt-2" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </div>
      </div>
    </div>
  </nav>

  <main id="main" class="main py-5">
    <?php
    $user_id = $_SESSION['ID'];
    $fetchdata = new DB_CON();
    $sql = $fetchdata->record_users($user_id);
    while ($row = mysqli_fetch_array($sql)) { ?>

      <div class="container">
        <div class="main-body">
          <div class="row gutters-sm-3 ">
            <div class="col-md-4 align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo empty($row['user_img']) ? "..\upload\user_img\TEMPUSER.png" : "../upload/user_img/$_SESSION[profile] " ?>" alt="Admin" class="rounded-circle img-thumbnail" width="150px">
                    <div class="mt-3 mb-2">
                      <h5><?php echo $_SESSION['name']; ?> <?php echo $_SESSION['lname']; ?></h5>
                      <p class="text-muted font-size-sm"> Emp ID: <?php echo $row['user_id']; ?></p>
                      <button type="button" class="btn btn-outline-primary "><a href="mailto:<?php echo $row['user_mail']; ?>"></i></a><?php echo $row['user_mail']; ?></button>

                    </div>
                  </div>
                  <br>
                </div>
              </div>
            </div>
            <div class="col-md-8 align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row align-items-center justify-content-center">
                    <div class="col-sm-3 ">
                      <h6 class="mb-0"><b>Full Name:</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_name']; ?> <?php echo $row['user_lastname']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Employee ID:</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_id']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Email:</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_mail']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Section:</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_sec']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Phone:</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['user_tel']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row align-items-center justify-content-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Equipments Name:</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary ">
                      <?php echo $row['item_name']; ?>
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
  <footer id="footer" class="footer ">
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
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
  </script>
  <script src="../assets/js/popup.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../table-count.js"></script>


</body>

</html>
<?php } ?>