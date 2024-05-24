<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
  header("location:../index.php");
  exit();
}
$_SESSION['name'];
$_SESSION['lname'];
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <a class="nav-link nav-link-active " href="#">
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
        <a class="nav-link collapsed" href=" brr_tbl.php">
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
      <div class="row">
        <div class="col-xl-12">
          <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Overview</li>
              </ol>
            </nav>
          </div>
        </div>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-xxl-12">
            <div class="row">

              <!-- users Card -->
              <div class="col-xxl-4 col-md-6">
                <a href="user_tbl.php">
                  <div class="card info-card users-card">

                    <div class="card-body">
                      <h5 class="card-title">Users<span> | All</span></h5>
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3"> <?php
                                            require('../config/dbconnect.php');
                                            $sql = "SELECT COUNT(user_name) as total
                                                            FROM rith_user ";
                                            $result = mysqli_query($connect, $sql);
                                            $total = mysqli_fetch_assoc($result);
                                            ?>
                          <h6><?php echo $total['total']; ?></h6>
                          <span class="text-muted small pt-2 ps-1">Account</span>
                        </div>

                      </div>
                    </div>


                  </div>
                </a>
              </div><!-- End users Card -->

              <!-- Equips Card -->
              <div class="col-xxl-4 col-md-6">
                <a href="equip_tbl.php">
                  <div class="card info-card equips-card">

                    <div class="card-body">
                      <h5 class="card-title">Devices<span> | All</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-pc-display-horizontal"></i>
                        </div>
                        <div class="ps-2"> <?php
                                            require('../config/dbconnect.php');
                                            $sql = "SELECT COUNT(item_name) as total
                                                            FROM rith_item ";
                                            $result = mysqli_query($connect, $sql);
                                            $total = mysqli_fetch_assoc($result);
                                            ?>
                          <h6><?php echo $total['total']; ?></h6>
                          <span class="text-muted small pt-2 ps-1">unit</span>

                        </div>
                      </div>
                    </div>

                  </div>
                </a>
              </div><!-- End Equips Card -->

              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">
                <a href="case_tbl.php">
                  <div class="card info-card jobs-card">
                    <div class="card-body">
                      <h5 class="card-title">Jobs<span> | Jobs</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-wrench"></i>
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
                </a>
              </div><!-- End jobs Card -->



              <!-- Reports -->
              <div class="col-xl-12">
                <div class="card">


                  <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>
                    <?php
                    include_once('..\config\function.php');
                    $fetchdata = new DB_CON();
                    $sql = $fetchdata->fetchdata_jobs();
                    $data = array();
                    while ($row = $sql->fetch_assoc()) {
                      $data[] = $row;
                    }
                    $Success = 0;
                    $Failed = 0;
                    $Progress = 0;

                    foreach ($data as $row) {
                      if ($row['job_status'] == 'Completed') {
                        $Success++;
                      } elseif ($row['job_status'] == 'Cancel') {
                        $Failed++;
                      } elseif ($row['job_status'] == 'Progress') {
                        $Progress++;
                      }
                    }
                    ?>
                    <!-- Doughnut Chart -->
                    <canvas id="myChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 516px;" width="516" height="400"></canvas>
                    <script>
                      var Success = <?php echo $Success; ?>;
                      var Failed = <?php echo $Failed; ?>;
                      var Progress = <?php echo $Progress; ?>;
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: ['Complete', 'Cancel', 'Progress'],
                          datasets: [{
                            label: 'Job Status',
                            data: [Success, Failed, Progress],
                            backgroundColor: [
                              'rgba(159, 226, 191, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(243, 234, 93,0.8)'
                            ],
                            borderColor: [
                              'rgba(159, 226, 191,1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(243, 234, 93,0.5)'
                            ],
                            borderWidth: 1
                          }]
                        },
                        options: {
                          responsive: true,
                          maintainAspectRatio: false
                        }
                      });
                    </script>
                    <!-- End Doughnut CHart -->

                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Reports -->
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
                      <th scope="co1" class="th2">Date</th>
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
                          <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['job_id'] ?>"><i class="bi bi-eye"></i></a>

                            <!--<a href=../admin/case_reply.php?print_case=<?php echo $row['job_id']; ?> class="d-flex justify-content-center"><i class="bi bi-eye"></i></a>
                                                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop<?php echo $row['job_id'] ?>" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">JOBS ID:
                                      <?php echo $row['job_id']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-body mt-2">
                                    <div class="container">
                                      <table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <h6><b>Date :</b>
                                              <?php echo $row['job_date']; ?>
                                            </h6>
                                          </tr>
                                          <tr>
                                            <h6><b>Name :</b>
                                              <?php echo $row['user_name']; ?>
                                            </h6>
                                          </tr>
                                          <tr>
                                            <h6><b>Section : </b>
                                              <?php echo $row['user_sec']; ?>
                                            </h6>
                                          </tr>
                                          <tr>
                                            <div class="col-md-12">
                                              <h6><b>Item Name :</b>
                                                <?php echo $row['item_name']; ?>
                                              </h6>
                                            </div>
                                          </tr>
                                          <tr>
                                            <h6><b>Assets No :</b>
                                              <?php echo $row['item_ass']; ?>
                                            </h6>
                                          </tr>
                                          <tr>
                                            <h6><b>Detail :</b>
                                              <?php echo $row['job_detail']; ?>
                                            </h6>
                                          </tr>
                                          <tr>
                                            <h6><b>Status : </b>
                                              <?php echo $row['job_status']; ?>
                                            </h6>
                                          </tr>
                                          <tr>
                                            <h6><b>Charger : </b>
                                              <?php echo $row['job_charger']; ?>
                                            </h6>
                                          </tr>
                                        <tbody>
                                      </table>
                                    </div><hr>
                                  
                                  <div class="row align-items-center justify-content-between p-2">
                                    <div class="col-6 px-2"><a href=../admin/case_udt.php?print_case=<?php echo $row['job_id']; ?> class="btn btn-primary w-100" name="update">View Detail</a></div>
                                    <!--<div class="col-4"><a href=../admin/case_reprint.php?print_case=<?php echo $row['job_id']; ?>" class="btn btn-secondary w-100 d-flex justify-content-center"><i class="bi bi-eye"></i>&nbspView</a></div> -->
                                    <div class="col-6 px-2"><a href="" class="btn btn-secondary w-100" name="cancel" data-bs-dismiss="modal">Close</a></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--<a href=update_jobs.php?edit_job=<?php echo $row['job_id']; ?> class="bi bi-three-dots-vertical">
                                                        </a>-->
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
              </div>
              </tr> <?php } ?>


            </tbody>
            </table>

            </div>
          </div>
        </div>
    </div><!-- End jobs status -->



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