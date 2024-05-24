<?php
include_once('../config/function.php');
session_start();

if (!$_SESSION['role'] == "user") {
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

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;600&display=swap" rel="stylesheet">
  <!-- Load Tempalte CSS -->
  <link rel="stylesheet" href="../assets/css/templatemo.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../assets/css/style_u.css">

  <link rel="stylesheet" href="../assets/owl_carousel/owl.carousel.css">
  <link rel="stylesheet" href="../assets/owl_carousel/owl.theme.default.css">

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

  <nav id="main_nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow mb-2 px-4">
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
              <a class="nav-link rounded-pill active px-3" href="case_tbl.php">Job Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_ist.php">Request Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="brr_tbl.php">Borrow Devices</a>
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

  <main id="main" class="main mx-auto py-4">
    <div class="row">
      <div class="col-10">
        <div class="pagetitle mt-4 py-6">
          <h1>Borrow Device</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Borrow Status</a></li>
              <li class="breadcrumb-item active">Overview</li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-xl-10">
          <div class="row">
            <!-- job Status -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <h5 class="card-title px-4">All Borrows <span>| <a href="brr_ist.php" <i class="bi bi-plus-lg "></i>
                      Add</a></span></h5>
                <table class="table table-borderless datatable px-4">
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
                                  <h5 class="modal-title fs-5">BORROW ID:
                                    <?php echo $row['br_id']; ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="row p-2 d-flex">
                                  <div class="modal-body ">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-12 t-align-left">
                                          <h6><b>Device Name:</b>
                                            <?php echo $row['dv_name']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 ">
                                          <h6><b>Borrow Date:</b>
                                            <?php echo $row['br_d']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h6><b>Return Plan Date:</b>
                                            <?php echo $row['rtp_d']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h6><b>Borrow Name:</b>
                                            <?php echo $row['user_name']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h6><b>Section: </b>
                                            <?php echo $row['user_sec']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 .ms-auto">
                                          <h6><b>Status: </b>
                                            <?php echo $row['sts_b']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <h6><b>Approve by :</b>
                                            <?php echo $row['app_b']; ?>
                                          </h6><br>
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="row align-items-center justify-content-between px-3 mt-2 mb-2">
                                      <div class="col-6"><a href="../user/brr_reprint.php?print_brr=<?php echo $row['br_id']; ?>&dv_name=<?php echo $row['dv_name']; ?>&user_name=<?php echo $row['user_name']; ?>" class="btn btn-primary w-100 " name="update"></i>Detail</a></div>
                                      <!--<div class="col-4"><a href=../admin/case_reprint.php?print_case=<?php echo $row['br_id']; ?>" class="btn btn-secondary w-100 d-flex justify-content-center"><i class="bi bi-eye"></i>&nbspView</a></div> -->
                                      <div class="col-6"><a href="" class="btn btn-secondary w-100 d-flex justify-content-center" name="cancel" data-bs-dismiss="modal">Close</a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--<a href=update_jobs.php?edit_job=<?php echo $row['job_id']; ?> class="bi bi-three-dots-vertical"></a>-->
                        </td>


                        <td class="column7 ">
                          <a href="../user/brr_return.php?print_brr=<?php echo $row['br_id']; ?>&dv_name=<?php echo $row['dv_name']; ?>&user_name=<?php echo $row['user_name']; ?>" name="update"><i class="primary bi bi-arrow-clockwise"></i></a>
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
      </div><!-- End Left side columns -->
    </section>
    <section>
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-start">
            <div class="col-lg-12 text-left">
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
            $productsPerPage = 8;
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
                <div class="single-product">
                  <div class="card featured-block">
                    <div class="card-body">
                      <span class="heart-icon d-flex align-items-start"><?php
                                                                        if ($row['dv_sts'] == 'AV') {
                                                                          echo '<span class="badge rounded-pill text-bg-success text-align-right" width="80px">Available</span>';
                                                                        } elseif ($row['dv_sts'] == 'UAV') {
                                                                          echo '<span class="badge rounded-pill text-bg-danger">Unavailable</span>';
                                                                        } ?></ฺtype=>

                      </span>
                      <img class="featured-block-image img-fluid" src="../assets/img/br_img/<?php echo $row['dv_img']; ?>" alt="">

                      <div class="product-details">
                        <h6><?php echo $row['dv_name']; ?></h6>
                      </div>
                    </div>
                    <div class="row px-2 mb-2">

                      <div class="col-12 justify-content-center align-items-center">
                        <?php
                        if ($row['dv_sts'] == 'AV') {
                          echo '<a href="brr_ist.php" class=" bi bi-bag-plus btn btn-primary w-100" name=" approve">&nbsp;&nbsp;&nbsp; Borrow</a>';
                        } elseif ($row['dv_sts'] == 'UAV') {
                          echo '<span class="bi bi-bag-plus btn btn-secondary w-100" onclick="alert(\'This Device Unavailable\');" name=" approve">&nbsp;&nbsp;&nbsp; Unavailable</span>';
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
                  <a class="page-link" href="brr_tbl.php?page=<?= $currentpage > 1 ?>" aria-label="Previous">
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


  <script src="../asset/js/owl_carousel/owl.carousel.js"></script>
  <script src="../assets/js/owl.carousel.js"></script>
  <script src="../assets/js/script.js"></script>

</body>

</html>