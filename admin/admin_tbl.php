<?php
include('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
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

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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
      </li><!-- End borrow Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="equip_tbl.php">
          <i class="bi bi-pc-display"></i><span>Equipments</span>
        </a>
      </li><!-- End Equip Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="user_tbl.php">
          <i class="bi bi-people"></i><span>Users</span>
        </a>
      </li><!-- End Users Nav -->

      <li class="nav-item">
        <a class="nav-link nav-link-active" href="#">
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
      <div class="pagetitle">
        <h1>Admins</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <!-- Equips Card -->
        <div class="row ">
          <div class=" col-xxl-4 col-md-4">
            <div class="card info-card ">
              <div class="card-body">
                <div class="d-flex align-items-center flex-column text-center">
                  <div class="col-md-4 align-items-center text-center">
                    <?php
                    include_once('..\config\function.php');
                    $user_id = $_SESSION['ID'];
                    $record_admin = new DB_CON();
                    $sql =  $record_admin->record_admins($user_id);
                    $row = mysqli_fetch_array($sql); {
                    ?>
                      <img src="../upload/user_img/<?php echo $row['user_img']; ?>" alt="user-avatar" width="100px" height="100px" class="d-block w-px-100 h-px-100 rounded img-thumbnail" id="uploadImageAvatar">
                  </div>
                  <div class="col md-4 col-crd mt-2">
                    <h5 class="mb-2 mt-2 text-blue">
                      <?php echo $row['user_name']; ?>&nbsp&nbsp
                      <?php echo $row['user_lastname']; ?></h5>
                    <div class=" badge badge-indigo mb-3"><?php echo $row['user_type']; ?></div>

                  </div>
                </div><?php } ?>
              <hr>

              <div class="info-container">
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <span class="fw-semibold me-1">Username:</span>
                    <span><?php echo $row['user_id']; ?>
                  </li>

                  <li class="mb-2 pt-1">
                    <span class="fw-semibold me-1">Section:</span>
                    <span><?php echo $row['user_sec']; ?></span>
                  </li>
                  <li class="mb-2 pt-1">
                    <span class="fw-semibold me-1">Email:</span>
                    <span><?php echo $row['user_mail']; ?></span>
                  </li>

                  <li class="mb-2 pt-1">
                    <span class="fw-semibold me-1">Tel:</span>
                    <span><?php echo $row['user_tel']; ?></span>
                  </li>
                  <li class="mb-2 pt-1">
                    <span class="fw-semibold me-1">PC Name:</span>
                    <span><?php echo $row['item_name']; ?></span>
                  </li>

                </ul>
                <div class="d-flex justify-content-center pt-2">
                  <a href=admin_udt.php?edit_admin=<?php echo $row['user_id']; ?>" class="btn btn-primary bi bi-pencil-square me-3">&nbspEdit</a>

                  <button type="button" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                      <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"></path>
                      <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"></path>
                    </svg>
                    Send
                  </button>
                </div>
              </div>


              </div>
            </div>
          </div>



          <div class="col-xxl-8 col-md-6">
            <div class="card recent-sales overflow-auto">
              <!--<div class="filter">
                <a class="icon" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-eye"></i></a>
                <!-- Modal 
                <div class="modal fade modal-xl" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content ">
                      <div class="modal-header">
                        <h5 class="modal-title fs-5">Admin Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="row g-3  ">
                        <div class="modal-body ">
                          <div class="container">
                            <table class="table table-borderless">
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
                                $sql = $fetchdata->fetchdata_admins();
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
                                    <td class="column7"><a href=admin_udt.php?edit_admin=<?php echo $row['user_id']; ?>" class="bi bi-pencil-square"></a></td>
                                    <td class="column8 "><a href=user_del.php?del_user=<?php echo $row['user_id']; ?>" onclick="return checkDelete()"><i class="bi bi-trash"></i></a></td>
                                  </tr>
                                <?php } ?>

                              </tbody>
                            </table>
                            <!-- END TABLE  USER DATA 

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->

              <div class="card-body">
                <h5 class="card-title">My Team</h5>
                <table class="table">
                  <tbody>
                    <tr>
                      <?php
                      include_once('../config/function.php');
                      $fetchdata = new DB_CON();
                      $sql = $fetchdata->fetchdata_admins();
                      $count = mysqli_num_rows($sql);
                      $order = 1;
                      while ($row = mysqli_fetch_array($sql)) {

                      ?>
                        <th class="pro-img "><a href="#"><img src="../upload/user_img/<?php echo $row['user_img']; ?>" alt="" width="80px" height="80px" class="img-thumbnail"></a></th>
                        <td class=" ps-xl-2"> <a href="admin_udt.php?edit_admin=<?php echo $row['user_id']; ?>">
                            <h6><?php echo $row['user_name']; ?>&nbsp&nbsp
                              <?php echo $row['user_lastname']; ?>
                          </a></h6>
                          <h6><?php echo $row['user_type']; ?></h6>
                        </td>
                        <td class="ps-xl-3 text-xxl-end">
                          <span><?php echo $row['user_mail']; ?></span>
                        </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End jobs status -->

          <!-- End jobs Card -->
          <!-- job Status -->
          <d>
        </div>
    </div><!-- End Left side columns -->
    </section>

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
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
  </script>
  <script src="../assets/js/popup.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../table-count.js"></script>




</body>

</html>