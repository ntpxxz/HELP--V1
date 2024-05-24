<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
  header("location:../index.php");
  exit();
}
$insertdata = new DB_CON();
if (isset($_POST['insert'])) {

  $job_id = $_GET['print_case'];

  $job_charger = $_POST['job_charger'];
  $chk_re = $_POST['chk_re'];
  $re_de1 = ""; {
    if (empty($_POST["re_de1"])) {
      $re_de1 = "-";
    } else {
      $re_de1 = ($_POST["re_de1"]);
    }
  }

  $re_date1 = ""; {
    if (empty($_POST["re_date1"])) {
      $re_date1 = '-';
    } else {
      $re_date1 = ($_POST["re_date1"]);
    }
  }

  $re_de2 = ""; {
    if (empty($_POST["re_de2"])) {
      $re_de2 = '-';
    } else {
      $re_de2 = ($_POST["re_de2"]);
    }
  }

  $re_date2 = ""; {
    if (empty($_POST["re_date2"])) {
      $re_date2 = '-';
    } else {
      $re_date2 = ($_POST["re_date2"]);
    }
  }
  $job_status = $_POST['job_status'];
  $re_date3 = $_POST['re_date3'];
  $re_com = $_POST['re_com'];


  $sql = $insertdata->update_reply($job_charger, $chk_re, $re_de1, $re_date1, $re_de2, $re_date2, $job_status, $re_date3, $re_com, $job_id);
  if ($sql) {
    echo "<script>alert('Record Successful');</script>";
    echo "<script>window.location.href='../admin/case_reprint.php?print_case=$job_id'</script>";
  } else
    echo "<script>alert('Something went wrong !');</script>";
  echo "<script>window.location.href='#'</script>";
}

if (isset($_POST['preview'])) {
  $job_id = $_GET['print_case'];
  $sql = $insertdata->update_reply($job_charger, $chk_re, $re_de1, $re_date1, $re_de2, $re_date2, $job_status, $re_date3, $re_com, $job_id);
  if ($sql) {
    echo "<script>window.location.href='../admin/case_reprint.php?print_case=$job_id'</script>";
  }
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
        <a class="nav-link collapsed" href=" brr_tbl.php">
          <i class="bi bi-bag-plus"></i><span>Borrow</span>
        </a>
      </li><!-- End Profile Page Nav -->

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
      <?php
      $job_id = $_GET['print_case'];
      $printjobs = new DB_CON();
      $sql = $printjobs->record_jobs($job_id);
      $row = mysqli_fetch_assoc($sql); { ?>

        <section class="section dashboard">
          <form action="" method="POST" class="form-job">

            <div class="row">
              <!-- company name -->

              <div class="col-xl-12 ">
                <div class="card ">
                  <div class="card-body p-4">

                    <section class="top-content  d-flex   align-items-center justify-content-center py-2">

                      <div class="logo col-2 align-items-center mb-2 d-flex">
                        <img src="../assets/img/Riso-logo.jpg">
                      </div>
                      <div class="col-10 align-items-center text-end">
                        <h5 class="fw-bold">Computer Service Request Form</h5>
                        <h6 class="fw-semibold">Req. No:<?php echo $row['job_id']; ?></h6>

                      </div>
                    </section>
                    <hr>
                    <div class=" border-black">
                      <section class="case-area mt-0">
                        <div class="row mb-2  ">
                          <tr class="col-12 tab-cr">
                            <span class=" align-items-center">
                              <h6 class="fw-bold"><i>Requester</i></h6>
                            </span>
                          </tr>
                        </div>

                        <div class="row align-items-start justify-content-between text-start mb-2">
                          <div class="col-4 pd-0">
                            <b class="fw-semibold">Name:</b>&nbsp<?php echo $row['user_name']; ?>
                          </div>

                          <div class="col-4">
                            <b class="fw-semibold">Section:</b>&nbsp<?php echo $row['user_sec']; ?>
                          </div>
                        </div>
                        <div class="row justify-content-between text-start mb-2  text-start mb-2">
                          <div class="col-4 ">
                            <b class="fw-semibold">Equipment Type:</b>&nbsp<?php echo $row['item_type']; ?>
                          </div>
                          <div class="col-4 ">
                            <b class="fw-semibold">Computer name:</b>&nbsp<?php echo $row['item_name']; ?>
                          </div>
                          <div class="col-4">
                            <b class="fw-semibold">Asset No.:</b>&nbsp<?php echo $row['item_ass']; ?>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-12">
                            <b class="fw-semibold">Problem Details:</b>&nbsp<?php echo $row['job_detail']; ?>
                          </div>
                        </div>
                      </section>
                      <hr>


                      <section class="case-area mt-0">
                        <div class="row mb-2">
                          <div class="col-12">
                            <span>
                              <b class="fw-bold"><i>IT Supporter</i></b>
                            </span>
                          </div>
                        </div>
                        <div class="row align-items-startjustify-content-between  text-start mb-2">
                          <div class="col-4 pe-2">
                            <span class="fw-semibold">Received By:</span>&nbsp; <input type="text" class="form-control" id="job_charger" name="job_charger" value="<?php echo $_SESSION['name']; ?>">
                          </div>
                          <div class=" col-4">
                            <span class="fw-semibold">Section:</span> IT Supporter
                            <div class="mb-2" data-repeater-list="group-a">
                              <div class="repeater-wrapper pt-0 pt-md-2" data-repeater-item="">
                                <div class="d-flex rounded position-relative pe-0">
                                  <div class="col-md-12 col-12 mb-md-0 mb-2">
                                    <p class="mb-2 repeater-title"><span class="fw-semibold">Checked result:</span></p>
                                    <textarea class="form-control" rows="2" placeholder="Please enter details" id="chk_re" name="chk_re"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md- mb-md-0 mb-2">
                                <div class="repeater-wrapper d-flex align-items-center mb-2">
                                  <div class="col-md-12 col-12 mb-md-0 mb-2 justify-content-start">
                                    <label for="salesperson" class="form-label me-4"><span class="fw-semibold">Resolution:</span></label>
                                    <div class="row g-3 d-flex align-items-center  mb-2">
                                      <div class="col-lg-2">
                                        <label class="fw-semibold">Request to:</label>
                                      </div>
                                      <div class="col-lg-6">
                                        <input type="text" class="form-control" id="re_de1" name="re_de1" placeholder="Please enter External provider" value="">
                                      </div>
                                      <div class="col-lg-1">
                                        <label class="fw-semibold">On:</label>
                                      </div>

                                      <div class="col-lg-3">
                                        <input type="date" class="form-control" id="re_date1" placeholder="Add External provider" value="" name="re_date1">
                                      </div>
                                    </div>
                                    <div class="row g-3 d-flex align-items-center mb-2">
                                      <div class="col-lg-2">
                                        <label class="fw-semibold">Request to replace parts:</label>
                                      </div>

                                      <div class="col-lg-6">
                                        <input type="text" class="form-control" id="re_de2" placeholder="Please enter part details" value="" name="re_de2">
                                      </div>
                                      <div class="col-lg-1">
                                        <label class="fw-semibold">On:</label>
                                      </div>

                                      <div class="col-lg-3 align-items-start">
                                        <input type="date" class="form-control" id="re_date2" placeholder="Add External provider" value="" name="re_date2">
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>

                      </section>
                      <section class="case-area mt-3">
                        <table class="table table-hover ">
                          <thead>
                            <tr>
                              <div class="col-12">
                                <span>
                                  <b class="fw-bold"><i>Work Complete Report</i></b>
                                </span>
                              </div>
                            </tr>
                          </thead>
                        </table>
                        <tr class="d-flex rounded position-relative pe-2">
                          <div class="row repeater-wrapper d-flex align-items-center  justify-content-start">
                            <div class="col-lg-2 col-md-2"><label class="fw-semibold">Work Status:</label></div>
                            <div class="col-lg-4 col-md-4">
                              <select id="inputsection" class="form-select" id="job_status" name="job_status">
                                <option selected>Choose...</option>
                                <option value="Repair Complete">Complete</option>
                                <option value="Repair Failed">Failed</option>
                                <option value="Progress">In Progress</option>
                              </select>
                            </div>
                            <div class="col-lg-1 col-md-2 align-items-start"">
                                <label class=" fw-semibold">On:</label>
                            </div>
                            <div class="col-lg-3 align-items-start">
                              <input type="date" class="form-control" id="re_date3" placeholder="Add External provider" value="" name="re_date3">
                            </div>


                          </div>
                        </tr>
                        <form class="source-item pt-2 px-0 px-sm-3">
                          <div class="mb-2" data-repeater-list="group-a">
                            <div class="repeater-wrapper pt-2 pt-md-2" data-repeater-item="" ">
                              <div class=" d-flex rounded position-relative pe-0">
                              <div class="col-md-12 col-12 mb-md-0 mb-2">
                                <textarea class="form-control" rows="2" placeholder="Please enter details" id="re_com" name="re_com"></textarea>
                              </div>
                            </div>
                          </div>
                    </div>
          </form>
        </section>
    </div>
    </div>
    </div>
    </div>

    <div class="row">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4"><button type="submit" onclick="window.location.href='../admin/case_reprint.php?print_case={.$print_case.}'" class="btn btn-primary d-flex w-100 justify-content-center" name="insert">Save</button></div>
            <div class="col-md-4"><button href=" ../admin/case_reprint.php?print_case={.$print_case.}'" name="preview" class="btn btn-outline-primary d-flex w-100 justify-content-center">Preview</button></div>
            <div class="col-md-4"><a href="case_tbl.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
          </div>
        </div>
      </div>
    </div><?php } ?>

  </div>
  </div>
  </form>
  </div>
  </div><!-- End Left side columns -->
  </section>
  </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>RISO Industry (Thailand)Co.,Ltd.</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
  </script>
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