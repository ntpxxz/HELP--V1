<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "user") {
  header("location:../pages-login.php");
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


  <!-- Load Require CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Font CSS -->

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- Load Tempalte CSS -->
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
  <nav id="main_nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow mb-1 px-4">
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
              <a class="nav-link btn-outline-primary rounded-pill px-3" href="case_tbl.php">Job Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_ist.php">Request Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="brr_tbl.php">Borrow Devices</a>
            <li class="nav-item">
              <a class="nav-link rounded-pill active" href="contact.php">Contact</a>
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
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </div>
      </div>
    </div>
  </nav>
  <main id="main" class="main">
    <div class="row g-8 justify-content-center py-4">
      <?php
      include_once('..\config\function.php');
      $update_admin = new DB_CON();
      $sql =  $update_admin->fetchdata_admins();
      while ($row = mysqli_fetch_assoc($sql)) {
      ?>
        <div class="col-xl-3 col-sm-6">
          <div class="card overflow-hidden ">
            <img src="../assets/img/slides-1.jpg" class="card-img-top img-fluid w-100" alt="">

            <div class="card-body">
              <div class="d-flex align-items-center">
                <div>
                  <img src="<?php echo empty($row['user_img']) ? "..\upload\user_img\TEMPUSER.png " : "../upload/user_img/$row[user_img] " ?>" alt="Profile" class=" rounded-circle avatar-md img-thumbnail">
                </div>
                <div class="flex-1 ms-3">
                  <div class="font-size-16 mb-1"><a href="#" class="text-dark"></a><?php echo $row['user_name']; ?>&nbsp
                    <?php echo $row['user_lastname']; ?></div>
                  <span class="badge badge-soft-success mb-0">IT staff</span>
                </div>
              </div>
              <div class="mt-3 pt-1">
                <p class="text-muted mb-0"><i class="bi bi-telephone-fill font-size-15 align-middle pe-2 text-primary"></i> <?php echo $row['user_tel']; ?></p>
                <p class="text-muted mb-0 mt-2"><i class="bi bi-envelope-fill font-size-15 align-middle pe-2 text-primary"></i><a href="mailto:<?php echo $row['user_mail']; ?>"><?php echo $row['user_mail']; ?></p>
              </div>
              <div class="d-flex pt-4">
                <button type="button" class="btn btn-primary w-100"><a href="mailto:<?php echo $row['user_mail']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" color="white" viewBox="0 0 16 16">
                      <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"></path>
                      <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                    </svg></a></button>

              </div>
            </div>
          </div>
        </div><?php } ?>
    </div>
  </main><!-- End #main --><!-- End #main -->

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
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
  </script>
  <script src="../assets/js/popup.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../table-count.js"></script>
  <script language="javascript">
    function TriggerOutlook()

    {
      var mail = document.querySelector('mail-ct');

      var body = escape(window.document.title + String.fromCharCode(13) + window.location.href);

      var subject = "Take a look at this cool code snippet from CodeDigest.Com!!";

      window.location.href = "mailto:${mail}";

    }
  </script>

</body>

</html>