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


$insertBRID = new DB_CON();
$sql = $insertBRID->fetchdata_br_id();
$br_id = $sql;

$insertdata = new DB_CON(); {
  if (isset($_POST['borrow'])) {

    $br_id = $_POST['br_id'];
    $br_d = $_POST['br_d'];
    $rtp_d = $_POST['rtp_d'];
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_sec = $_POST['user_sec'];
    $user_mail = $_POST['user_mail'];
    $dv_name = $_POST['dv_name'];
    $ar_u = $_POST['ar_u'];
    $rm_b = $_POST['rm_b'];


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
      $mail->addAddress('nattapon.mnz8898@gmail.com', 'sam');     //Add a recipient
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
                      
                      <h3><b>Request No:</b> {$br_id}</h3>
                      <b>Request Date:</b> {$br_d}<p>
                      <b>User Name:</b> {$_SESSION['name']}  {$_SESSION['lname']}<p>
                      <b>Section:</b> {$user_sec}<p>
                      <b>Device Name:</b> {$dv_name}<p>     
                      <b>Used Area:</b> {$ar_u}<p>
                      <b>Remark:</b> {$rm_b}<p>
                      ------------------------------------------------------------------------------------------------<p>
                      <b>Sincerely<b>,<p>
                      RITH IT Support
                      ";




      $sql = $insertdata->insert_br($br_id, $br_d, $rtp_d, $user_name, $user_lastname, $user_sec, $user_mail, $dv_name, $ar_u, $rm_b);
      if ($sql) {
        $mail->send();
        echo "<script>alert('Request Successful');</script>";
        echo "<script>window.location.href='brr_tbl.php'</script>";
      } else
        echo "<script>alert('Something went wrong !');</script>";
      echo "<script>window.location.href='brr_ist.php'</script>";
    } catch (Exception) {
    }
  }





?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RITH-IT HELPDESK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
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
        <section class="section register flex-column align-items-center justify-content-center mt-2">

          <form action="" method="POST" class="form-job" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body center ">

                    <h4 class="card-title text-center">Borrow Request Form</h4>
                    <hr>
                    <!-- General Form Elements -->
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="inputjobID" class="form-label">Borrow ID</label>
                        <input type="text" class="form-control " id="br_id" name="br_id" value="<?php echo $br_id; ?>" readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="inputBdate" class=" form-label">Borrow Date</label>
                        <input type="date" class="form-control" id="br_d" name="br_d">
                      </div>
                      <div class="col-md-4">
                        <label for="inputRdate" class=" form-label">Return Plan Date</label>
                        <input type="date" class="form-control" id="rtp_d" name="rtp_d">
                      </div>
                    </div><br>

                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="inputname" class="form-label">FirstName</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $_SESSION['name']; ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="inputlastname" class="form-label">LastName</label>
                        <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $_SESSION['lname']; ?>">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <label for="inputsection" class="form-label">Section</label>
                        <select id="user_sec" class="form-select" name="user_sec" value="" placeholder="Please Choose Area">
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
                      <div class="col-md-6">
                        <label for="inputMail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="user_mail" name="user_mail" value="<?php echo $_SESSION['mail']; ?>">
                      </div>
                    </div><br>

                    <div class="row g-3 mb-4">
                      <div class="col-lg-8 col-md-8">
                        <label for="inputsection" class="form-label">Equipment</label>
                        <select id="dv_name" class="form-select" name="dv_name" value="">
                          <option selected class="readonly">Please Choose Device</option>
                          <option value="Conference Set ">Conference Set </option>
                          <option value="External CD-1">External CD-1</option>
                          <option value="External CD-2">External CD-2</option>
                          <option value="External CD-3">External CD-3</option>
                          <option value="External CD-4">External CD-4</option>
                          <option value="HUB-1">HUB-1</option>
                          <option value="HUB-2">HUB-2</option>
                          <option value="HUB-3">HUB-3</option>
                          <option value="Mouse Pad">Mouse Pad</option>
                          <option value="NEC Pen-1">NEC Pen-1</option>
                          <option value="NEC Pen-2">NEC Pen-2</option>
                          <option value="PC068119">Notebook - PC068119</option>
                          <option value="Pointer-1">Pointer-1</option>
                          <option value="Pointer-2">Pointer-2</option>
                          <option value="WMC">Wireless Microphone</option>
                          <option value="USB-PORT">USB PORT</option>
                          <option value="USB RJ45-1">USB RJ45-1</option>
                          <option value="USB RJ45-2">USB RJ45-2</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputCat" class="form-label">Used Area</label>
                        <select id="inputCat" class="form-select" id="ar_u" name="ar_u">
                          <option selected>Please Choose Area</option>
                          <option value="IN">Internal</option>
                          <option value="OUT">External</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12 col-12 mt-4">
                      <label for="inputdetail" class=" form-label">Remark</label>
                      <textarea class="form-control" name="rm_b" id="rm_b" rows="5" placeholder="Ex.Could you come to set up please."></textarea>
                    </div><br>
                  </div>

                </div>

                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="borrow" value="job_img">Send</button></div>
                      <div class="col-6"><a href="brr_tbl.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">Cancel</a></div>
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
    <script>
      upload.onchange = evt => {
        const [file] = upload.files
        if (file) {
          uploadImageItem.src = URL.createObjectURL(file)
        }
      }
    </script>

    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>




  </body>

  </html><?php } ?>