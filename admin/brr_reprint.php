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
$br_id =  $_GET['print_brr'];
$printbrr = new DB_CON();
$sql = $printbrr->record_br($br_id);
$row = mysqli_fetch_assoc($sql); {


  if (isset($_POST['report'])) {
    $mail = new PHPMailer(true);

    try {
      //Server settings

      $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
      $mail->isSMTP(); //Send using SMTP
      $mail->Host = 'mail.rith.riso.biz'; //Set the SMTP server to send through
      $mail->SMTPAuth = true;
      //Enable SMTP authentication
      $mail->Username = 'nattapon@rith.riso.biz'; //SMTP username
      $mail->Password = 'nA_11121112';
      $mail->SMTPSecure = "none"; //Enable implicit TLS encryption
      $mail->Port = 25; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('nattapon@rith.riso.biz', 'RITH - IT Support');
      $mail->addAddress($row['user_mail']); //Add a recipient

      //Content
      $mail->isHTML(true);
      //Set email format to HTML
      $mail->Subject = "Request No:&nbsp;{$br_id} has been ended";
      $mail->Body = "
  <strong>To:</strong>&nbsp;K. {$row['user_name']}<p>
    <b>Request No:</b>&nbsp;{$br_id}
  <p>
    <b>PC Name:</b>&nbsp;{$row['dv_name']}
  <p>
    <b>Status:</b>&nbsp;{$row['sts_r']}
  <p>
    <b>Approve by:</b>&nbsp;{$row['app_r']}
  <p>

    If you want to print report or For more information about this jobs
    please visit: http://172.16.68.109:8081/d2/user/brr_tbl.php and then select to Request No. that your want and click on Print Button.
  <p>
     ____________________________________________________________________________________________________________
  <p>

    <b>Sincerely<b>,<p>
          RITH IT Support
          If you have any questions. Please do not hesitate to contact me.
          Email: it@rith.riso.biz or Tel. ext 2204
          ";
      $mail->send();
      echo "<script>
            alert('Report has been Sent');
          </script>";
      echo "<script>
            window.location.href = 'brr_tbl.php'
          </script>";
    } catch (Exception $e) {
      echo "Message could not be sent. Mail";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
                  <i class=" bi bi-person"></i>
                  <span>My Profile</span>
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

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed " href="dash.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="case_tbl.php">
            <i class="bi bi-tools"></i></i><span>Job Status</span>
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
        <section class="section dashboard">
          <form action="" method="POST" class="form-job">
            <div class="row g-0">
              <!-- company name -->
              <div class="col-lg-12">
                <div class="row">
                  <div class="card" id="print-pdf">
                    <div class="card-body p-4">
                      <section class="top-content  d-flex   align-items-center justify-content-center py-2">
                        <div class="logo col-md-2 align-items-center mb-2 d-flex">
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
                          <div class=" border-black">
                            <section class="case-area mt-0">
                              <div class="row g-2">
                                <tr class="col-lg-12 tab-cr">
                                  <span class=" align-items-center">
                                    <h6 class="fw-bold"><i>Requester</i></h6>
                                  </span>
                                </tr>
                              </div>
                              <div class="row align-items-start justify-content-between text-start mb-3">
                                <div class="col-lg-4 pd-0">
                                  <b class="fw-semibold">Name:</b>&nbsp<?php echo $row['user_name']; ?>
                                </div>
                                <div class="col-lg-4">
                                  <b class="fw-semibold">Section:</b>&nbsp<?php echo $row['user_sec']; ?>
                                </div>
                                <div class="col-lg-4 ">
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
                                <div class="col-5 ">
                                  <b class="fw-semibold">Return Plane Date:</b>&nbsp<?php echo $row['br_d']; ?>
                                </div>
                                <div class="col-3 ">
                                </div>
                              </div>
                            </section>
                            <hr>
                            <section class="case-area mt-0">
                              <div class="row mb-2">
                                <div class="col-12">
                                  <span>
                                    <b class="fw-bold"><i>IT Supporter Approve</i></b>
                                  </span>
                                </div>
                              </div><?php
                                    if ($row['app_b'] == null) {
                                      echo "Wait Padding Please Admin";
                                    } else { ?>

                                <div class="row align-items-start justify-content-between text-start mb-2">


                                  <div class="col-lg-4 col-md-4">
                                    <span class="fw-semibold py-2">Status:</span>&nbsp; <?php echo $row['sts_b']; ?>
                                  </div>
                                  <div class="col-lg-4 pe-2 mb-2">
                                    <span class="fw-semibold py-2">Approve By:</span>&nbsp; <?php echo $row['app_b']; ?>
                                  </div>
                                  <div class="col-lg-4 col-md-2 ">
                                    <span class=" fw-semibold py-2">On:</span>&nbsp; <?php echo $row['app_bd']; ?>
                                  </div>


                                </div>
                            </section>
                          </div><?php } ?>
                        </section>
                        <hr> <?php
                              if ($row['app_b'] == null) {
                                echo "";
                              } else { ?>

                          <h6 class=" fw-bold mt-4"> Section Return </h6>
                          </label>
                          <hr>
                          <section class="case-area mt-4">

                            <div class="row mb-2  ">
                              <tr class="col-12 tab-cr">
                                <span class=" align-items-center">
                                  <h6 class="fw-bold"><i>Returner</i></h6>
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
                                <b class="fw-semibold">Return Date:</b>&nbsp<?php echo $row['rt_d']; ?>
                              </div>
                              <div class="col-4 ">
                              </div>
                            </div>
                          </section>
                          <hr>
                          <?php if ($row['app_r'] == null) {
                                  echo "Waiting for verification, please contact the administrator.";
                                } else { ?>
                            <section class="case-area mt-0">
                              <div class="row mb-2">
                                <div class="col-12">
                                  <span>
                                    <b class="fw-bold"><i>IT Supporter</i></b>
                                  </span>
                                </div>
                              </div>
                              <div class="row align-items-start justify-content-between text-start mb-2">

                                <div class="col-lg-4 col-md-2">
                                  <span class="fw-semibold py-2">Status:</span>&nbsp; <?php echo $row['sts_r']; ?>
                                </div>
                                <div class="col-lg-4 pe-2 mb-2">
                                  <span class="fw-semibold py-2">Approve By:</span>&nbsp; <?php echo $row['app_r']; ?>
                                </div>
                                <div class="col-lg-4 col-md-2 align-items-start">
                                  <span class=" fw-semibold py-2">On:</span>&nbsp; <?php echo $row['app_rd']; ?>
                                </div>
                              </div>
                            </section><?php } ?>


                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body row align-items-center justify-content-center text-start ">
                      <div class="col-md-4"><a href=../admin/brr_app.php?print_brr=<?php echo $row['br_id']; ?> class="btn btn-outline-primary  d-flex w-100 justify-content-center" name="update">Edit</a></div>
                      <div class="col-md-4"><button type="submit" class="btn btn-primary  d-flex w-100 justify-content-center" id="btn-generate" onclick="window.print()" value="Print">Print</button></div>
                      <div class="col-md-4"><button type="submit" class="btn btn-outline-primary  d-flex w-100 justify-content-center" name="report" id="report">Send Report</button></div>
                    </div>
                  </div>
                </div>
              </div>
            </div><?php } ?>
          </form>
        </section>
      </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id=" footer" class="footer">
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
    <script>
      const pdf_btn = document.querySelector('#btn-generate');
      const customers_table = document.querySelector('#print-pdf');

      const toPDF = function(customers_table) {
        const html_code = `


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
      <main class="" >${customers_table.innerHTML}</main>
           
              
    `;

        const new_window = window.open();
        new_window.document.write(html_code);

        setTimeout(() => {
          new_window.print();
          new_window.close();
          clearTimeout();
        }, 0);

      }
      pdf_btn.onclick = () => {
        toPDF(customers_table);

      }
    </script>



  </body>


  </html> <?php } ?>