<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
  header("location:../index.php");
  exit();
}
$insertdata = new DB_CON(); {
  if (isset($_POST['insert'])) {
    $job_id = $_POST['job_id'];
    $job_date = $_POST['job_date'];
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_sec = $_POST['user_sec'];
    $user_tel = $_POST['user_tel'];
    $item_name = $_POST['item_name'];
    $item_ass = $_POST['item_ass'];
    $job_cat = $_POST['job_cat'];
    $job_detail = $_POST['job_detail'];
    $statusMsg = '';

    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");
    $numrand = (mt_rand());
    $type = strrchr($_FILES['upload']['name'], ".");

    // File upload path
    $path_img = "../upload/job_img/";
    $fileName = $numrand . $date . $type;
    $targetFilePath = $path_img . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST['insert']) && !empty($_FILES['upload']['name'])) {
      // Allow certain file formats
      $allowTypes = array('jpg', 'png', 'jpeg');
      if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath))
          $sql = $insertdata->insert_jobs($job_id, $job_date, $user_name, $user_lastname, $user_sec, $user_tel, $item_name, $item_ass, $job_cat, $job_detail, $fileName);
        if ($sql) {
          echo "<script>alert('Record Successful');</script>";
          echo "<script>window.location.href='case_tbl.php'</script>";
        } else
          echo "<script>alert('Someting went wrong !');</script>";
        echo "<script>window.location.href='case_tbl.php'</script>";
      } else
        echo "<script type='text/javascript'>";
      echo "alert('Sorry, there was an error uploading your file.');";
      echo "window.location = 'case_tbl.php'; ";
      echo "</script>";
    } else
      echo "<script type='text/javascript'>";
    echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
    echo "window.location = 'case_tbl.php'; ";
    echo "</script>";
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

  <title>INSERT DATA JOB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
      <a href="#" class="logo d-flex align-items-center">
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
        <a class="nav-link nav-link-active" href="case_tbl.php">
          <i class="bi bi-tools"></i></i><span>Job Status</span>
        </a>
      </li><!-- End job status Nav -->

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
        <a class="nav-link  collapsed"" href=" #">
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
      <section class="section register d-flex flex-column align-items-center justify-content-center py-1">

        <form action="" method="POST" class="form-job" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body center ">

                  <h4 class="card-title text-center">Repair request form </h4>
                  <hr>
                  <!-- General Form Elements -->
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputjobID" class="form-label">Job ID</label>
                      <input type="text" class="form-control" id="job_id" name="job_id">
                    </div>
                    <div class="col-md-6">
                      <label for="inputdate" class=" form-label">Date</label>
                      <input type="date" class="form-control" id="job_date" name="job_date">
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
                      <label for="item_name" class="form-label">Item name</label>
                      <input type="text" class="form-control" id="item_name" name="item_name">
                    </div>
                    <div class="col-md-3 ">
                      <label for=" item_area" class="form-label">Assets No.</label>
                      <input type="text" class="form-control" id="item_ass" name="item_ass">
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
                      <label for="inputdetail class=" form-label">Detail</label>
                      <textarea class="form-control" name="job_detail" id="job_detail" rows="3"></textarea>

                    </div><br>

                    <div class="row g-3">
                      <div class="mb-2">
                        <label for="formFileMultiple" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="upload">
                      </div>
                      <hr>
                    </div><br>
                    <div class="row">
                      <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="insert" value="job_img">Save</button></div>
                      <div class="col-6"><a href="tbl_user.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
                    </div>
                  </div>
                </div>
              </div>
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