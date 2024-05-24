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
  <link href="../assets/css/style_u.css" rel="stylesheet">

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
        <div class="pagetitle mt-4">
          <h1>Job Status</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Job Status</a></li>
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

            <!-- users Card -->
            <div class="col-xxl-3 col-xl-3">
              <div class="card info-card users-card">

                <div class="card-body">
                  <h5 class="card-title">All<span>| Jobs</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pc-display"></i>
                    </div>
                    <div class="ps-3"> <?php
                                        require('../config/dbconnect.php');
                                        $sql = "SELECT COUNT(job_status) as total
                                                            FROM rith_jobcase ";
                                        $result = mysqli_query($connect, $sql);
                                        $total = mysqli_fetch_assoc($result);
                                        ?>
                      <h6><?php echo $total['total']; ?></h6>
                      <span class="text-muted small pt-2 ps-1">jobs</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End users Card -->

            <!-- Equips Card -->
            <div class="col-xxl-3 col-xl-3">
              <div class="card info-card equips-card">


                <div class="card-body">
                  <h5 class="card-title">Success<span>| Jobs</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check2"></i>

                    </div>
                    <div class="ps-3"><?php
                                      require('../config/dbconnect.php');
                                      $sql = "SELECT COUNT(job_status) as Completed
                                                            FROM rith_jobcase WHERE job_status = 'Completed'";
                                      $result = mysqli_query($connect, $sql);
                                      $success = mysqli_fetch_assoc($result);
                                      ?>
                      <h6><?php echo $success['Completed']; ?></h6>
                      <span class="text-muted small pt-2 ps-1">jobs</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Success Card -->

            <!--  Fixing Card -->
            <div class="col-xxl-3 col-xl-3">

              <div class="card info-card jobs-card">



                <div class="card-body">
                  <h5 class="card-title">In progress<span>| Jobs</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wrench"></i>
                    </div>
                    <div class="ps-3"><?php
                                      require('../config/dbconnect.php');
                                      $sql = "SELECT COUNT(job_status) as Progress
                                                            FROM rith_jobcase WHERE job_status = 'Progress'";
                                      $result = mysqli_query($connect, $sql);
                                      $fixing = mysqli_fetch_assoc($result);
                                      ?>
                      <h6><?php echo $fixing['Progress']; ?></h6>
                      <span class="text-muted small pt-2 ps-1">jobs</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End fix Card -->

            <!-- Cancel Card -->
            <div class="col-xxl-3 col-xl-3">
              <div class="card info-card cancel-card">



                <div class="card-body">
                  <h5 class="card-title">Cancel<span>| Jobs</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-x-lg"></i>
                    </div>
                    <div class="ps-3"><?php
                                      require('../config/dbconnect.php');
                                      $sql = "SELECT COUNT(job_status) as cancel
                                                            FROM rith_jobcase WHERE job_status = 'Cancel'";
                                      $result = mysqli_query($connect, $sql);
                                      $cancel = mysqli_fetch_assoc($result);
                                      ?>
                      <h6><?php echo $cancel['cancel']; ?></h6>
                      <span class="text-muted small pt-2 ps-1">jobs</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Cancel Card -->



            <!-- job Status -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">All jobs <span>| <a href="case_ist.php" <i class="bi bi-plus-lg "></i>
                        Add</a></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>

                        <th scope="col" class="th1">No</th>
                        <th scope="col" class="th2">Case ID</th>
                        <th scope="col" class="th2">Date</th>
                        <th scope="col" class="th3">Name</th>
                        <th scope="col" class="th4">Section</th>
                        <th scope="col" class="th5">Equip ID</th>
                        <th scope="col" class="th6">Detail</th>
                        <th scope="col" class="th7">View</th>
                        <th scope="col" class="th8">Status</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        include_once('..\config\function.php');
                        $fetchdata = new DB_CON();
                        $sql = $fetchdata->fetchdata_jobs();
                        $count = mysqli_num_rows($sql);
                        $order = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {

                        ?>
                          <td class="column1"><?php echo $order++; ?></td>
                          <td class="column2">
                            <?php echo $row['job_id']; ?>
                          </td>
                          <td class="column2">
                            <?php echo $row['job_date']; ?>
                          </td>
                          <td class="column3">
                            <?php echo $row['user_name']; ?>
                          </td>
                          <td class="column4">
                            <?php echo $row['user_sec']; ?>
                          </td>
                          <td class="column5">
                            <?php echo $row['item_name']; ?>
                          </td>
                          <td class="column6">
                            <?php echo $row['job_detail']; ?>
                          </td>


                          <td class="column7">

                            <!-- Button trigger modal -->
                            <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['job_id'] ?>"><i class="bi bi-eye"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop<?php echo $row['job_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title fs-5">JOBS ID:
                                      <?php echo $row['job_id']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="row p-2 d-flex">
                                    <div class="modal-body ">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-12 t-align-left">
                                            <h6><b>Date :</b>
                                              <?php echo $row['job_date']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12 ">
                                            <h6><b>Name :</b>
                                              <?php echo $row['user_name']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <h6><b>Section : </b>
                                              <?php echo $row['user_sec']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <h6><b>Item Name :</b>
                                              <?php echo $row['item_name']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <h6><b>Asset No :</b>
                                              <?php echo $row['item_ass']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <h6><b>Detail :</b>
                                              <?php echo $row['job_detail']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12 .ms-auto">
                                            <h6><b>Status: </b>
                                              <?php echo $row['job_status']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12 .ms-auto">
                                            <h6><b>Charger :</b>
                                              <?php echo $row['job_charger']; ?>
                                            </h6><br>
                                          </div>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row align-items-center justify-content-between p-2">
                                        <div class="col-6"><a href=./case_reprint.php?print_case=<?php echo $row['job_id']; ?> class="btn btn-primary w-100 " name="update"></i>View Detail</a></div>
                                        <!--<div class="col-4"><a href=../admin/case_reprint.php?print_case=<?php echo $row['job_id']; ?>" class="btn btn-secondary w-100 d-flex justify-content-center"><i class="bi bi-eye"></i>&nbspView</a></div> -->
                                        <div class="col-6"><a href="" class="btn btn-secondary w-100 d-flex justify-content-center" name="cancel" data-bs-dismiss="modal">Close</a></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!--<a href=update_jobs.php?edit_job=<?php echo $row['job_id']; ?> class="bi bi-three-dots-vertical"></a>-->
                          </td>


                          <td class="column8">
                            <?php
                            if ($row['job_status'] == 'Completed') {
                              echo '<span class="badge rounded-pill text-bg-success">Completed</span>';
                            } elseif ($row['job_status'] == 'Cancel') {
                              echo '<span class="badge rounded-pill text-bg-danger">Cancel</span>';
                            } else {
                              echo '<span class="badge rounded-pill text-bg-warning">Progress</span>';
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