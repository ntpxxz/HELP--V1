<?php
include_once('config/function.php');

$insertID = new DB_CON();
$sql = $insertID->fetchdata_job_id();
$job_id = $sql;


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

    $sql = $insertdata->insert_jobs($job_id, $job_date, $user_name, $user_lastname, $user_sec, $user_tel, $item_name, $item_ass, $job_cat, $job_detail);
    if ($sql) {
      echo "<script>alert('Request Successful');</script>";
      echo "<script>window.location.href='case_ist.php'</script>";
    } else
      echo "<script>alert('Something went wrong !');</script>";
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
    <link href="../assets/img/favicon.png" rel="Riso-logo">


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
                <a class="nav-link " aria-current="page" href="home_u.php">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="case_tbl.php">สถานะงานซ่อม</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">แจ้งซ่อม</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">ติดต่อ</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="<?php echo empty($row['user_img']) ? "..\upload\user_img\TEMPUSER.png" : "../upload/user_img/$row[user_img] " ?>" alt="Profile" class=" rounded-circle avatar-md-2 img-thumbnail">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?></span>

            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $_SESSION['name']; ?> </h6>
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
    <br>
    <main id="main-center" class="main">

      <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
        <div class="container">

          <form action="" method="POST" class="form-job" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body center ">

                    <h4 class="card-title text-center">Repair request form </h4>
                    <hr>
                    <!-- General Form Elements -->
                    <div class="row g-3">

                      <div class="col-md-6">

                        <label for="inputjobID" class="form-label">Job ID</label>
                        <input type="text" class="form-control" id="job_id" name="job_id" value="<?php echo $job_id; ?>" readonly>

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
                        <label for="item_name" class="form-label">item name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name">
                      </div>
                      <div class="col-md-3 ">
                        <label for=" item_ass" class="form-label">Item ID</label>
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
                        <label for="inputdetail class=" form-label">Job detail</label>
                        <textarea class="form-control" name="job_detail" id="job_detail" rows="5"></textarea>

                      </div><br>

                      <!--<div class="row g-3">
                      <div class="row mb-2 justify-content-center align-items-center ">

                        <div id="file-upload-form" class="uploader">
                          <input class="form-control" type="file" id="upload" hidden="" accept="image/*" name="upload" onchange="uploadPhotos(imageUploadUrl)">
                          <label for="upload" id="file-drag">
                            <div class="col-12 mb-2 mt-2 text-center">
                              <div id="start">
                                <div class="btn-container">
                                  <img src="<?php echo empty($row['job_img']) ? "..\upload\job_img\upphoto.png" : "../upload/item_img/$row[job_img]" ?>" width="400px" height="Auto" class="rounded w-100" id="uploadImageItem">
                                </div>
                              </div>
                              <div id="notimage" class="hidden">Please select an image</div>
                            </div>
                            
                          </label>
                        </div>

                      </div>-->



                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="insert">Send</button></div>
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
    <script>
      upload.onchange = evt => {
        const [file] = upload.files
        if (file) {
          uploadImageItem.src = URL.createObjectURL(file)
        }
      }
    </script>



  </body>

  </html><?php } ?>