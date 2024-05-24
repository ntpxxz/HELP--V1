<?php
include('../config/function.php');
$username = $_GET['user_name'];
$br_id = $_GET['print_brr'];
session_start();
if (!$_SESSION['role'] == "user") {
  header("location:../index.php");
  exit();
} else if ($username != $_SESSION['name']) {
  echo "<script>alert('Sorry,You are not the owner of this job.');</script>";
  echo "<script>window.location.href='../user/brr_tbl.php?print_brr=$br_id'</script>";
}



$insertdata = new DB_CON();
if (isset($_POST['insert'])) {

  $br_id = $_GET['print_brr'];
  $name_r = $_POST['name_r'];
  $lname_r = $_SESSION['lname'];
  $mail_r = $_SESSION['mail'];
  $rt_d = $_POST['rt_d'];
  $sts_r = 'Returned';



  $sql = $insertdata->user_return($name_r, $lname_r, $mail_r, $rt_d, $sts_r, $br_id);
  if ($sql) {
    echo "<script>alert('Record Successful');</script>";
    echo "<script>window.location.href='../user/brr_tbl.php'</script>";
  } else
    echo "<script>alert('Something went wrong !');</script>";
  echo "<script>window.location.href='#'</script>";
}

if (isset($_POST['preview'])) {
  $job_id = $_GET['print_case'];
  $sql = $insertdata->user_return($name_r, $lname_r, $mail_r, $rt_d, $sts_r, $br_id);
  if ($sql) {
    echo "<script>window.location.href='../user/brr_tbl.php'</script>";
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
  <link href="../assets/css/style_u.css" rel="stylesheet">
  <link rel="stylesheet" href="..assets/owl_carousel/owl.carousel.css">
  <link rel="stylesheet" href="..assets/owl_carousel/owl.theme.default.css">
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
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_tbl.php">Job Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_ist.php">Request Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill active px-3" href="../BRR/brr_tbl.php">Borrow Equipment</a>
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

  <!-- ======= Main ======= -->

  <main id="main" class="main mx-auto py-4 ">
    <div class="container">
      <?php
      $br_id = $_GET['print_brr'];
      $printbrr = new DB_CON();
      $sql = $printbrr->record_br($br_id);
      $row = mysqli_fetch_assoc($sql); { ?>
        <section class="section dashboard">
          <form action="" method="POST" class="form-job">
            <div class="row mt-4 py-6">
              <!-- company name -->
              <div class="col-xl-12 ">
                <div class="card">
                  <div class="card-body p-4">
                    <section class="top-content  d-flex  align-items-center justify-content-center py-2">
                      <div class="logo col-2 align-items-center mb-2 d-flex">
                        <img src="../assets/img/Riso-logo.jpg">
                      </div>
                      <div class="col-10 align-items-center text-end">
                        <h5 class="fw-bold">Borrow Request Form</h5>
                        <h6 class="fw-semibold">Brq. No:<?php echo $row['br_id']; ?></h6>
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

                        <div class="row align-items-start justify-content-between text-start mb-3">
                          <div class="col-4 pd-0">
                            <b class="fw-semibold">Name:</b>&nbsp<?php echo $row['user_name']; ?>
                          </div>
                          <div class="col-4">
                            <b class="fw-semibold">Section:</b>&nbsp<?php echo $row['user_sec']; ?>
                          </div>
                          <div class="col-4 ">
                          </div>
                        </div>

                        <div class="row justify-content-between text-start mb-2  text-start mb-3">
                          <div class="col-6 ">
                            <b class="fw-semibold">Device Name:</b>&nbsp<?php echo $row['dv_name']; ?>
                          </div>
                        </div>

                        <div class="row justify-content-between text-start mb-2  text-start mb-4 ">
                          <div class="col-4 ">
                            <b class="fw-semibold">Borrow Date:</b>&nbsp<?php echo $row['br_d']; ?>
                          </div>
                          <div class="col-4 ">
                            <b class="fw-semibold">Return Plane Date:</b>&nbsp<?php echo $row['rtp_d']; ?>
                          </div>
                          <div class="col-4 ">
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

                        <div class="row align-items-start justify-content-between text-start mb-2">

                          <div class="col-lg-4 pe-2 mb-2">
                            <span class="fw-semibold py-2">Approve By:</span>&nbsp; <?php echo $row['app_b']; ?>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <span class="fw-semibold py-2">Status:</span>&nbsp; <?php echo $row['sts_b']; ?>
                          </div>
                          <div class="col-lg-5 col-md-2 ">
                            <span class=" fw-semibold py-2">On:</span>&nbsp; <?php echo $row['app_bd']; ?>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            if ($row['app_b'] == null) {
              echo "<script>alert('This case waiting for approval.');</script>";
              echo "<script>window.location.href='../user/brr_tbl.php?print_brr=$br_id'</script>";
            } else { ?>

              <div class="row">
                <!-- company name -->
                <div class="col-xl-12 ">
                  <div class="card">
                    <div class="card-body p-4">
                      <label for="return" class="mt-3">
                        <h6 class=" fw-bold"> Section Return </h6>
                      </label>
                      <hr>
                      <section class="case-area mt-0">
                        <div class="row mb-2">
                          <tr class="col-12 tab-cr">
                            <span class=" align-items-center">
                              <h6 class="fw-bold"><i>Returner</i></h6>
                            </span>
                          </tr>
                        </div>

                        <div class="row align-items-start justify-content-between text-start mb-3">
                          <div class="col-4 pd-0">
                            <span class="fw-semibold py-2">Name</span>&nbsp; <input type="text" class="form-control" id="name_r" name="name_r" value="<?php echo $row['user_name']; ?>">
                          </div>
                          <div class="col-4">
                            <span for="inputsection" class="fw-semibold py-2">Section</span>
                            <select id="usec_r" class="form-select" name="usec_r" value="" placeholder="Please Choose Area">
                              <span placeholder="Please Choose Area"></span>

                              <option value="ACC" <?php
                                                  if ($_SESSION['sec'] == "ACC") {
                                                    echo "selected=selected";
                                                  } ?>>ACC</option>
                              <option value="ADM" <?php
                                                  if ($_SESSION['sec'] == "ADM") {
                                                    echo "selected=selected";
                                                  } ?>>ADM</option>
                              <option value="BOI" <?php
                                                  if ($_SESSION['sec'] == "BOI") {
                                                    echo "selected=selected";
                                                  } ?>>BOI</option>
                              <option value="IT" <?php
                                                  if ($_SESSION['sec'] == "IT") {
                                                    echo "selected=selected";
                                                  } ?>>IT</option>
                              <option value="LOG" <?php
                                                  if ($_SESSION['sec'] == "LOG") {
                                                    echo "selected=selected";
                                                  } ?>>LOG</option>
                              <option value="PC" <?php
                                                  if ($_SESSION['sec'] == "PC") {
                                                    echo "selected=selected";
                                                  } ?>>PC</option>
                              <option value="PD" <?php
                                                  if ($_SESSION['sec'] == "PD") {
                                                    echo "selected=selected";
                                                  } ?>>PD</option>
                              <option value="PE" <?php
                                                  if ($_SESSION['sec'] == "PE") {
                                                    echo "selected=selected";
                                                  } ?>>PE</option>
                              <option value="PU" <?php
                                                  if ($_SESSION['sec'] == "PU") {
                                                    echo "selected=selected";
                                                  } ?>>PU</option>
                              <option value="QA" <?php
                                                  if ($_SESSION['sec'] == "QA") {
                                                    echo "selected=selected";
                                                  } ?>>QA</option>
                              <option value="QC" <?php
                                                  if ($_SESSION['sec'] == "QC") {
                                                    echo "selected=selected";
                                                  } ?>>QC</option>
                              <option value="QE" <?php
                                                  if ($_SESSION['sec'] == "QE") {
                                                    echo "selected=selected";
                                                  } ?>>QC</option>


                            </select>

                          </div>
                          <div class="col-4 ">
                          </div>
                        </div>

                        <div class="row justify-content-between text-start mb-2  text-start mb-3">
                          <div class="col-4 ">
                            <b class="fw-semibold">Device Name:</b>&nbsp<input type="text" class="form-control" id="dv_name" name="dv_name" value=<?php echo $row['dv_name']; ?>>
                          </div>
                          <div class="col-4 ">
                            <b class="fw-semibold">Return Date:</b>&nbsp <input type="date" class="form-control" id="rt_d" name="rt_d" placeholder="Add External provider" value=<?php echo date("dd-MM-YYYY"); ?>>
                          </div>
                          <div class="col-4"></div>
                        </div>
                      </section>

                    </div>
                  </div>
                </div>
              </div><?php } ?>
            <div class="row">
              <div class="card">
                <div class="col-xl-12">
                  <div class="card-body p-4 px-4">
                    <div class="row justify-content-between">
                      <div class="col-md-6"><button type="submit" onclick="window.location.href='../user/brr_tbl.php'" class="btn btn-primary d-flex w-100 justify-content-center" name="insert">Save</button></div>
                      <div class="col-md-6"><button onclick="window.location.href='../user/brr_tbl.php'" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</button></div>
                    </div>
                  </div>
                </div>
              </div><?php } ?>
            </div>
          </form>
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