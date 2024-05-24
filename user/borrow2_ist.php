<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
  header("location:../pages-login.php");
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
    echo "<script>window.location.href='case_tbl.php'</script>";
  } else
    echo "<script>alert('Someting went wrong !');</script>";
  echo "<script>window.location.href='case_tbl.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>INSERT DATA JOB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
              <a class="nav-link " aria-current="page" href="../home.php">หน้าแรก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="case_tbl.php">สถานะงานซ่อม</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">แจ้งซ่อม</a>
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
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/logo mofuu V2.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $_SESSION['name']; ?> </h6>
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
  <main id="main-center" class="main">

    <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
      <div class="container">

        <form action="" method="POST" class="form-job">
          <div class="row g-3">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body center ">

                  <h4 class="card-title text-center">Borrow Request Form </h4>
                  <hr>
                  <!-- General Form Elements -->
                  <div class="row g-3">
                    <div class="col-md-2">
                      <label for="inputbrrID" class="form-label">Borrow ID</label>
                      <input type="text" class="form-control" id="br_id" name="br_id">
                    </div>
                    <div class="col-md-5">
                      <label for="inputBdate" class=" form-label">Borrow Date</label>
                      <input type="date" class="form-control" id="br_d" name="br_d">
                    </div>
                    <div class="col-md-5">
                      <label for="inputRdate" class=" form-label">Return Plan Date</label>
                      <input type="date" class="form-control" id="rtp_d" name="rtp_d">
                    </div>
                  </div><br>

                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputname" class="form-label">FirstName</label>
                      <input type="text" class="form-control" id="user_name" name="user_name">
                    </div>
                    <div class="col-md-6">
                      <label for="inputlastname" class="form-label">LastName</label>
                      <input type="text" class="form-control" id="user_lastname" name="user_lastname">
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
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
                    </div><br>
                    <div class="col-md-6">
                      <label for="inputPassword" class="form-label">Tel</label>
                      <input type="text" class="form-control" id=" user_tel" name="user_tel">
                    </div>
                  </div><br>

                  <div class="row g-3">
                    <div class="col-md-3">
                      <label for="item_name" class="form-label">item name</label>
                      <input type="text" class="form-control" id="item_name" name="item_name">
                    </div>
                    <div class="col-md-3 ">
                      <label for=" item_area" class="form-label">Item area</label>
                      <input type="text" class="form-control" id="item_area" name="item_area">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCat" class="form-label">Cause Categories</label>
                      <select id="inputCat" class="form-select" id="job_cat" name="job_cat">
                        <option selected>Choose...</option>
                        <option value="Request Install/Uninstall Program">Request Install/Uninstall Program</option>
                        <option value="Request setting">Request setting</option>
                        <option value="Hardware Damage">Hardware Damage</option>
                        <option value="Software Error">Software Error</option>
                        <option value="Human Error">Human Error</option>
                        <option value="Replacement Computer">Replacement Computer</option>
                        <option value="Other">Other</option>
                      </select>

                    </div><br>
                    <div class="col-lg-12 col-12">
                      <label for="inputdetail class=" form-label">Job detail</label>
                      <textarea class="form-control" name="job_detail" id="job_detail" rows="3"></textarea>

                    </div><br>

                    <div class="row g-3">
                      <div class="mb-2">
                        <label for="formFileMultiple" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="job_img">
                      </div>
                      <hr>
                    </div><br>
                    <div class="row">
                      <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="insert">Save</button></div>
                      <div class="col-6"><a href="tbl_user.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </form>
      </div>
    </section>
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