<?php
include_once('../config/function.php');
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

session_start();
if (!$_SESSION['role'] == "admin") {
  header("location:../index.php");
  exit();
}


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
    $user_mail = $_POST['user_mail'];
    $item_name = $_POST['item_name'];
    $item_ass = $_POST['item_ass'];
    $job_cat = $_POST['job_cat'];
    $job_detail = $_POST['job_detail'];

    $statusMsg = '';


    $mail = new PHPMailer(true);
    try {
      //Server settings

      $mail->SMTPDebug = SMTP::DEBUG_SERVER;              //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'mail.rith.riso.biz';                       //Set the SMTP server to send through
      $mail->SMTPAuth   = true;
      //Enable SMTP authentication
      $mail->Username   = 'nattapon@rith.riso.biz';               //SMTP username
      $mail->Password   = 'nA_11121112';
      $mail->SMTPSecure = "none";            //Enable implicit TLS encryption
      $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('nattapon@rith.riso.biz', 'RITH - IT Support');
      $mail->addAddress('nattapon@rith.riso.biz', 'Sam');     //Add a recipient
      //$mail->addAddress('kornsirinat@rith.riso.biz', 'Fern');     //Add a recipient
      //$mail->addAddress('nantaporn@rith.riso.biz', 'Au');     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('../upload/TP/Header_mail.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);
      //Set email format to HTML
      $mail->Subject = 'RITH-Request'; //
      $mail->Body    = "
                      
                      <h3><b>Request No:</b> {$job_id}</h3>
                      <b>Request Date:</b> {$job_date}<p>
                      <b>User Name:</b> {$_SESSION['name']}  {$_SESSION['lname']}<p>
                      <b>Section:</b> {$user_sec}<p>
                      <b>PC Name:</b> {$item_name}<p>
                      <b>Asset No:</b> {$item_ass}<p>
                      <b>job categories</b> {$job_cat}<p>
                      <b>Description:</b> {$job_detail}<p>

                      Please Visit: http://172.16.68.109:8081  For Check Request.<p>                      
                      ________________________________________________________________________________<p>
                      <b>Sincerely<b>,<p>
                      RITH IT Support
                      If you have any questions. Please do not hesitate to contact me.
                      Email: it@rith.riso.biz or Tel. ext 2204
                      ";




      date_default_timezone_set('Asia/Bangkok');
      $date = date("Ymd");
      $numrand = (mt_rand());
      $type = strrchr($_FILES['upload']['name'], ".");

      // File upload path
      $path_img = "../upload/job_img/";
      $fileName = $numrand . $date . $type;
      $targetFilePath = $path_img . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

      if (isset($_FILES['upload']['name'])) {

        function imageResize($imageResourceId, $width, $height)
        {
          $targetWidth = $width < 1280 ? $width : 1280;
          $targetHeight = ($height / $width) * $targetWidth;
          $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
          imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
          return $targetLayer;
        }

        if (isset($_POST['insert']) && !empty($_FILES['upload']['name'])) {
          // Allow certain file formats
          $allowTypes = array('jpg', 'png', 'jpeg');
          if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath))
              $sql = $insertdata->insert_jobs($job_id, $job_date, $user_name, $user_lastname, $user_sec, $user_mail, $item_name, $item_ass, $job_cat, $job_detail, $fileName);
            if ($sql) {
              $mail->send();
              echo "<script>alert('Request Successful');</script>";
              echo "<script>window.location.href='case_tbl.php'</script>";
            } else
              echo "<script>alert('Something went wrong !');</script>";
            echo "<script>window.location.href='case_ist.php'</script>";
          } else
            echo "<script type='text/javascript'>";
          echo "alert('Sorry, there was an error uploading your file.');";
          echo "window.location = 'case_ist.php'; ";
          echo "</script>";
        } else if (isset($_POST['insert']) && !empty($_FILES['upload']['name'])) {
          echo "<script type='text/javascript'>";
        echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
        echo "window.location = 'case_ist.php'; ";
        echo "</script>";
      } else
        $fileName = Null; 
        $sql = $insertdata->insert_jobs($job_id, $job_date, $user_name, $user_lastname, $user_sec, $user_mail, $item_name, $item_ass, $job_cat, $job_detail, $fileName);
        if ($sql) {
        $mail->send();
        echo "<script>alert('Request Successful');</script>";
        echo "<script>window.location.href='case_tbl.php'</script>";
      } 
      
      else
        echo "<script>alert('Something went wrong !');</script>";
        echo "<script>window.location.href='case_ist.php'</script>";
    } 
  }catch (Exception){

  } 
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
          <a class="nav-link collapsed  " href="dash.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link active " href="case_tbl.php">
            <i class="bi bi-tools"></i></i><span>Job Status</span>
          </a>
        </li><!-- End job status Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href=" brr_tbl.php">
            <i class="bi bi-bag-plus"></i><span>Borrow</span>
          </a>
        </li><!-- End borrow Page Nav -->


        <li class="nav-item">
          <a class="nav-link collapsed" href="equip_tbl.php">
            <i class="bi bi-pc-display"></i><span>Equipments</span>
          </a>
        </li><!-- End Equip Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed " href="user_tbl.php">
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
            <i class=" bi bi-house"></i>
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
          <a class="nav-link nav-link collapsed" href="user_ist.php">
            <i class="bi bi-card-list"></i>
            <span>Register</span>
          </a>
        </li><!-- End Register Page Nav -->

      </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
      <div class="container">
        <section class="section register  align-items-center justify-content-center ">
          <form action="" method="POST" class="form-job" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">

                    <h4 class="card-title text-center">Repair request form </h4>
                    <hr>
                    <!-- General Form Elements -->
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="inputjobID" class="form-label ">Job ID</label>
                        <input type="text" class="form-control " id="job_id" name="job_id" value="<?php echo $job_id; ?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="inputdate" class=" form-label ">Date</label>
                        <input type="date" class="form-control" id="job_date" name="job_date" value="<?php echo $job_date; ?>">
                      </div>
                    </div><br>

                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="inputname" class="form-label ">FirstName</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $_SESSION['name']; ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="inputlastname" class="form-label ">LastName</label>
                        <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $_SESSION['lname']; ?>">
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <label for="inputsection" class="form-label ">Section</label>
                        <select id="user_sec" class="form-select" name="user_sec" value="">
                          <option selected>Choose...</option>
                          <option value="ACC" <?php
                                              if ($_SESSION['sec'] == "ACC") {
                                                echo "selected=selected";
                                              } ?>>ACC</option>
                          <option value="ADM" <?php
                                              if ($_SESSION['sec'] == "ADM") {
                                                echo "selected=selected";
                                              } ?>>Admin</option>
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

                          <option value="Other" <?php
                                                if ($_SESSION['sec'] == "Other") {
                                                  echo "selected=selected";
                                                } ?>>Other</option>
                        </select>
                      </div><br>
                      <div class="col-md-6">
                        <label for="inputMail" class="form-label ">Email</label>
                        <input type="text" class="form-control" id="user_mail" name="user_mail" value="<?php echo $_SESSION['mail']; ?>">
                      </div>
                    </div><br>

                    <div class="row g-3">
                      <div class="col-md-3">
                        <label for="item_name" class="form-label ">Equipment Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name">
                      </div>
                      <div class="col-md-3 ">
                        <label for=" item_ass" class="form-label ">Asset No</label>
                        <input type="text" class="form-control" id="item_ass" name="item_ass">
                      </div>
                      <div class="col-md-6">
                        <label for="inputCat" class="form-label ">Cause Categories</label>
                        <select id="inputCat" class="form-select" id="job_cat" name="job_cat">
                          <option selected>Please Choose Categories</option>
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
                        <label for="inputdetai" class="  form-label">Job detail</label>
                        <textarea class="form-control" name="job_detail" id="job_detail" rows="5"></textarea>

                      </div><br>

                      <div class="row g-3">
                        <div class="row mb-2 justify-content-center align-items-center ">

                          <div id="file-upload-form" class="uploader">
                            <input class="form-control" type="file" id="upload" hidden="" accept="image/*" name="upload" onchange="uploadPhotos(imageUploadUrl)">
                            <label for="upload" id="file-drag">
                              <div class="col-12 mb-2 mt-2 text-center">
                                <div id="start">
                                  <div class="btn-container">
                                    <img src="<?php echo empty($row['job_img']) ? "..\upload\job_img\uppic.png" : "../upload/item_img/$row[job_img]" ?>" width="200px" height="Auto" class="rounded w-100" id="uploadImageItem">
                                  </div>
                                </div>
                                <div id="notimage" class="hidden">Please select an image</div>
                              </div>

                            </label>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="insert" value="job_img">Send</button></div>
                      <div class="col-6"><a href="tbl_user.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
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