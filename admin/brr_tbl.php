<?php

include_once('../config/function.php');

session_start();

if (!$_SESSION['role'] == "admin") {
  Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form//
  exit();
}

$insertdata = new DB_CON();
if (isset($_POST['insert'])) {
  $job_id = $_POST['job_id'];
  $job_date = $_POST['job_date'];
  $user_name = $_POST['user_name'];
  $user_lastname = $_POST['user_lastname'];
  $user_sec = $_POST['user_sec'];
  $user_tel = $_POST['user_tel'];
  $item_name = $_POST['item_name'];
  $item_area = $_POST['item_area'];
  $job_cat = $_POST['job_cat'];
  $job_detail = $_POST['job_detail'];
  $sql = $insertdata->insert_jobs($job_id, $job_date, $user_name, $user_lastname, $user_sec, $user_tel, $item_name, $item_area, $job_cat, $job_detail, $fileName);
  if ($sql) {
    echo "<script>alert('Record Successful');</script>";
    echo "<script>window.location.href='../index.php'</script>";
  } else
    echo "<script>alert('Someting went wrong !');</script>";
  echo "<script>window.location.href='../index.php'</script>";
}
// if (isset($_POST['export'])) {
//   $fetchdata = new DB_CON();
//   $sql = $fetchdata->fetchdata_br();
//   $date = date("Ymd");
//   $numrand = (mt_rand());
//   $fileName = "ex". $date. $numrand . ".csv";
//   $header = array('br_id', 'br_d', 'rtp_d', 'user_name', 'user_lastname', 'user_sec', 'user_mail', 'dv_name', 'ar_u', 'rm_b', 'sts_b', 'app_b', 'app_bd', 'act_d', 'name_r', 'lname_r', 'usec_r', 'mail_r', 'rt_d', 'sts_r', 'app_r', 'app_rd');

//   $case = array();
//   if (mysqli_num_rows($sql) > 0) {
//     while ($row = mysqli_fetch_assoc($sql)) {
//       $case[] = $row;
//     }
//   }
//   //คอลัมน์ที่ต้องการ เรียงลำดับตามตารางบน Database

//   //กำหนดชื่อไฟล์


//   header('Content-Type: text/csv; charset=utf-8');
//   header("Content-Disposition: attachment; filename={$fileName}");
//   $output = fopen('php://output', 'w');
//   fputcsv($output, $header);

//   if (count($case) > 0) {
//     foreach ($case as $row) {
//       fputcsv($output, $row);
//     }
//   }

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

  <!-- Load Require CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Font CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
  <!-- Load Tempalte CSS -->
  <link rel="stylesheet" href="../assets/css/templatemo.css">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/custom.css">

  <link rel="stylesheet" href="../assets/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/css/owl.theme.default.css">

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
        <a class="nav-link collapsed  " href="dash.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link nav-link collapsed" href=" case_tbl.php">
          <i class="bi bi-tools"></i><span>Job Status</span>
        </a>
      </li><!-- End job status Nav -->
      <li class="nav-item">
        <a class="nav-link nav-link-active" href=" brr_tbl.php">
          <i class="bi bi-bag-plus"></i><span>Borrow</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="equip_tbl.php">
          <i class="bi bi-pc-display"></i><span>Equipments</span>
        </a>
      </li><!-- End Equip Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="user_tbl.php">
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
        <a class="nav-link collapsed" href="profile.php">
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
      <form action="" method="POST" class="form-job">
        <div class="row justify-content-center align-item-center">
          <div class="col-xl-12 col-md-6 ">
            <div class="row justify-content-between">
              <div class="col-10 ">
                <div class="pagetitle">
                  <h1>Borrow Device</h1>
                  <nav>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Borrow Status</a></li>
                      <li class="breadcrumb-item active">Overview</li>
                    </ul>
                  </nav>
                </div>

              </div>
              <div class="col-2 mt-2 align-item-end">
                <span>
                  <a href="export_br.php" class="btn btn-primary w-100" id="exportButton" name="export"> Export CSV</a>
                </span>
              </div>
            </div>
          </div>
        </div><!-- End Page Title -->
        <section class="section dashboard">
          <div class="container">
            <div class="row">
              <!-- Left side columns -->
              <!-- job Status -->
              <div class="col-12">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card recent-sales overflow-auto">

                      <div class="card-body">
                        <div class="row justify-content-between">
                          <div class="col-6">
                            <h5 class="card-title">All Borrows <span>| <a href="brr_ist.php" <i class="bi bi-plus-lg "></i>
                                  Add</a></span></h5>
                          </div>
                        </div>
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>

                              <th scope="col" class="th1">No</th>
                              <th scope="col" class="th2">Borrow ID</th>
                              <th scope="col" class="th2">Device Name</th>
                              <th scope="col" class="th1">Borrow Date</th>
                              <th scope="col" class="th1">Return Plan Date </th>
                              <th scope="col" class="th3">Borrower</th>
                              <th scope="col" class="th4">Section</th>
                              <th scope="col" class="th7">View</th>
                              <th scope="col" class="th7">Return</th>
                              <th scope="col" class="th8">Status</th>

                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <?php
                              $fetchdata = new DB_CON();
                              $sql = $fetchdata->fetchdata_br();
                              $count = mysqli_num_rows($sql);
                              $order = 1;
                              while ($row = mysqli_fetch_assoc($sql)) {
                              ?>
                                <td class="column1"><?php echo $order++; ?></td>
                                <td class="column2">
                                  <?php echo $row['br_id']; ?>
                                </td>
                                <td class="column5">
                                  <?php echo $row['dv_name']; ?>
                                </td>
                                <td class="column1">
                                  <?php echo $row['br_d']; ?>
                                </td>
                                <td class="column1">
                                  <?php echo $row['rtp_d']; ?>
                                </td>
                                <td class="column5">
                                  <?php echo $row['user_name']; ?>
                                </td>
                                <td class="column4">
                                  <?php echo $row['user_sec']; ?>
                                </td>
                                <td class="column7">
                                  <!-- Button trigger modal -->
                                  <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['br_id'] ?>"><i class="bi bi-eye"></i>
                                  </a>
                                  <!-- Modal -->
                                  <div class="modal fade" id="staticBackdrop<?php echo $row['br_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">BORROW ID:
                                            <?php echo $row['br_id']; ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body mt-2 ">
                                          <div class="container">
                                            <table class="table table-borderless">
                                              <tbody>
                                                <tr>
                                                  <h6><b>Device Name:</b>
                                                    <?php echo $row['dv_name']; ?>
                                                  </h6><br>
                                                </tr>
                                                <tr>
                                                  <h6><b>Borrow Date:</b>
                                                    <?php echo $row['br_d']; ?>
                                                  </h6><br>
                                                </tr>
                                                <tr>
                                                  <h6><b>Return Plan Date:</b>
                                                    <?php echo $row['rtp_d']; ?>
                                                  </h6><br>
                                                </tr>
                                                <tr>
                                                  <h6><b>Borrow Name:</b>
                                                    <?php echo $row['user_name']; ?>
                                                  </h6><br>
                                                </tr>
                                                <tr>
                                                  <h6><b>Section: </b>
                                                    <?php echo $row['user_sec']; ?>
                                                  </h6><br>
                                                </tr>
                                                <tr>
                                                  <h6><b>Status: </b>
                                                    <?php echo $row['sts_b']; ?>
                                                  </h6><br>
                                                </tr>
                                                <tr>
                                                  <h6><b>Approve by :</b>
                                                    <?php echo $row['app_b']; ?>
                                                  </h6><br>
                                                </tr>
                                              <tbody>
                                            </table>
                                          </div>
                                          <hr>
                                          <div class="row align-items-center justify-content-between px-3 mt-2 mb-2">
                                            <div class="col-6"><a href="../admin/brr_app.php?print_brr=<?php echo $row['br_id']; ?>&dv_name=<?php echo $row['dv_name']; ?>" class="btn btn-primary w-100 " name="approve"></i>Detail</a></div>
                                            <!--<div class="col-4"><a href=../admin/case_reprint.php?print_case=<?php echo $row['br_id']; ?>" class="btn btn-secondary w-100 d-flex justify-content-center"><i class="bi bi-eye"></i>&nbspView</a></div> -->
                                            <div class="col-6"><a href="" class="btn btn-secondary w-100 d-flex justify-content-center" name="cancel" data-bs-dismiss="modal">Close</a></div>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>

                                  <!--<a href=update_jobs.php?edit_job=<?php echo $row['job_id']; ?> class="bi bi-three-dots-vertical"></a>-->
                                </td>
                                <td class="column7">
                                  <a href="../admin/brr_rt.php?print_brr=<?php echo $row['br_id']; ?>&dv_name=<?php echo $row['dv_name']; ?>" name="approve"><i class="bi bi-arrow-clockwise"></i></a>
                                </td>
                                <td class="column8">
                                  <?php
                                  if ($row['sts_b'] == 'Approved') {
                                    echo '<span class="badge rounded-pill text-bg-success">Borrowed</span>';
                                  } else {
                                    echo '<span class="badge rounded-pill text-bg-warning">Pending</span>';
                                  } ?>
                                </td>
                            </tr><?php } ?>
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div><!-- End jobs status -->
              </div>
            </div>
          </div>
        </section>
        <!-- Devices -->
        <!-- single product slide -->
        <section>
          <div class="single-product-slider">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 text-left">
                      <div class="pagetitle">
                        <h1>Our Device</h1>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <?php
                    $showDV = new DB_CON;

                    // Pagination variables
                    $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $productsPerPage = 4;
                    $sql = $showDV->showDV();
                    $totalProducts = mysqli_num_rows($sql);
                    $totalPages = ceil($totalProducts / $productsPerPage);
                    if ($currentpage >= $totalPages)
                      $currentpage = $totalPages;
                    $start = ($currentpage - 1) * $productsPerPage;
                    // Retrieve products for the current page using showDVByPage method
                    $sql = $showDV->showDVByPage($start, $productsPerPage);


                    while ($row = mysqli_fetch_array($sql)) {
                      // Display the product details
                    ?>
                      <div class="col-lg-3 col-md-6 px-2">
                        <div class="single-product ">
                          <div class="card featured-block ">
                            <div class="card-body ">
                              <span class="heart-icon d-flex align-items-start"><?php
                                                                                if ($row['dv_sts'] == 'AV') {
                                                                                  echo '<span class="badge rounded-pill text-bg-success text-align-right" width="80px">Available</span>';
                                                                                } elseif ($row['dv_sts'] == 'UAV') {
                                                                                  echo '<span class="badge rounded-pill text-bg-danger">Unavailable</span>';
                                                                                } ?></ฺtype=>

                              </span>
                              <img class="featured-block-image img-fluid " src="../assets/img/br_img/<?php echo $row['dv_img']; ?>" alt="">

                              <div class="product-details">
                                <h6><?php echo $row['dv_name']; ?></h6>
                              </div>
                            </div>
                            <div class="row px-2 mb-2">
                              <div class="col-12 justify-content-center align-items-center">
                                <?php
                                if ($row['dv_sts'] == 'AV') {
                                  echo '<a href="brr_ist.php" class=" bi bi-bag-plus btn btn-primary w-100" name=" approve">&nbsp;&nbsp;&nbsp;&nbsp; Borrow</a>';
                                } elseif ($row['dv_sts'] == 'UAV') {
                                  echo '<span class="bi bi-bag-plus btn btn-secondary w-100" onclick="alert(\'This Device Unavailable\');" name=" approve">&nbsp;&nbsp;&nbsp;&nbsp; Borrow</span>';
                                } ?>

                              </div>

                            </div>
                          </div>
                        </div>
                      </div>

                    <?php } ?>

                    <nav aria-label="...">
                      <ul class="pagination justify-content-end">

                        <li <?php if ($currentpage == 1) echo 'class ="page-item disabled"' ?>>
                          <a class="page-link" href="brr_tbl.php?page=<?= $currentpage - 1 ?>" aria-label="Previous">
                            <span>&laquo;</span>
                          </a>
                        </li>
                        <li <?php for ($i = 1; $i <= $totalPages; $i++) { ?> <li <?php if ($currentpage == $i) echo 'class = "page-item active"'; ?>>
                          <a class="page-link" href="brr_tbl.php?page=<?= $i ?>"><?= $i ?></a>

                        </li>
                      <?php } ?>
                      <li <?php if ($currentpage == $totalPages) echo 'class ="page-item disabled"' ?>>
                        <a class="page-link" href="brr_tbl.php?page=<?= $currentpage + 1 ?>" aria-label="Next">
                          <span>&raquo;</span>
                        </a>
                      </li>

                      </ul>
                    </nav>

                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
      </section>

      <!-- end product Area -->
      <!-- <section>
        <div class=" container">
                        <div class="row my-3 ">
                          <h1 class="text-center">Our Device</h1>
                          <p class="fw-light w-75 mx-auto text-center"></p>
                        </div>
                        <div class="row g-2 my-3 owl-carousel">
                          <?php
                          $showDV = new DB_CON;
                          $sql = $showDV->showDV();
                          while ($row = mysqli_fetch_array($sql)) {
                          ?>
                            <form method="post" class="box" action="">
                              <div class="col-lg-3 product-item mx-auto pd-4">
                                <div class="product-img single-new-arrival-bg">
                                  <img src="../assets/img/br_img/<?php echo $row['dv_img']; ?>" alt="" class="img-fluid d-block mx-auto">
                                  <span class="heart-icon">
                                    <i class="bi bi-heart"></i>
                                  </span>
                                  <div class="row btns w-100 mx-3 text-center align-item-center">
                                    <button type="button" class="col-12 py-2 ">
                                      <h6><i class="bi bi-bag-plus">&nbsp; </i>Add to Borrow</h6>
                                    </button>
                                  </div>
                                </div>
                                <input type="hidden" name="dv_name" value="<?php echo $row['dv_name']; ?>">
                                <input type="hidden" name="dv_img" value="<?php echo $row['dv_img']; ?>">
                                <a href="#" class="d-block text-dark text-decoration-none py-2 product-name"><?php echo $row['dv_name']; ?></a>

                                <div class="product-info p-3 text-center align-items-center">
                                  <input type="submit" value="add to cart" name="add_to_cart" class="btn" class="product-price"><?php
                                                                                                                                if ($row['dv_sts'] == 'AV') {
                                                                                                                                  echo '<span class="badge rounded-pill text-bg-success" width="80px">Available</span>';
                                                                                                                                } elseif ($row['dv_sts'] == 'UAV') {
                                                                                                                                  echo '<span class="badge rounded-pill text-bg-danger">Unavailable</span>';
                                                                                                                                } ?></ฺtype=>
                                </div>
                              </div>
                            </form><?php } ?>
                        </div>

                    </div>
                    </section> -->
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

  <script src="../asset/js/owl_carousel/owl.carousel.js"></script>
  <script src="../assets/js/owl.carousel.js"></script>
  <script src="../assets/js/script.js"></script>
  <!-- <script>
    document.getElementById('exportButton').addEventListener('click', function() {
      // AJAX request to the PHP export script
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'export.php', true);
      xhr.responseType = 'blob';

      xhr.onload = function() {
        if (this.status === 200) {
          // Create a temporary URL for the blob response
          var url = URL.createObjectURL(this.response);

          // Create a temporary link element
          var link = document.createElement('a');
          link.href = url;
          link.download = 'data.xlsx'; // Specify the file name
          link.style.display = 'none';

          // Append the link to the document and click it
          document.body.appendChild(link);
          link.click();

          // Clean up the temporary resources
          URL.revokeObjectURL(url);
          document.body.removeChild(link);
        }
      };

      xhr.send();
    });
  </script> -->


</body>

</html>