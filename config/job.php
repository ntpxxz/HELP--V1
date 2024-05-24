<?php
require('dbconnect.php');
$sql = "SELECT*FROM rith_jobcase";
$result = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">All jobs <span>| Today</span></h5>

                    <table class="table table-borderless datatables">
                        <thead>
                            <tr>

                                <th scope="col" class="th1">No</th>
                                <th scope="col" class="th2">Case ID</th>
                                <th scope="col" class="th3">Name</th>
                                <th scope="col" class="th4">Section</th>
                                <th scope="col" class="th5">Equip ID</th>
                                <th scope="col" class="th6">Detail</th>
                                <th scope="col" class="th7">Management</th>
                                <th scope="col" class="th8">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                         <?php while($row=mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td class="column1"></td>
                                <td class="column2"><?php echo $row['Job_id']; ?></td>
                                <td class="column3"><?php echo $row['Job_user']; ?></td>
                                <td class="column4"><?php echo $row['Job_itemname']; ?></td>
                                <td class="column5"><?php echo $row['Job_itemid']; ?></td>
                                <td class="column6"><?php echo $row['Job_detail']; ?></td>
                                <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
                                <td class="column8"></td>

                            </tr> 
                          <?php } ?>

                            <td class="column1"></td>
                            <td class="column2"><a href="#">CS202211-001</a></td>
                            <td class="column3">Brandon Jacob******</td>
                            <td class="column4">IT</td>
                            <td class="column5">SV068014</td>
                            <td class="column6">backup exec and wsus server error backup exec and wsus
                                exec and wsus server error</td>
                            <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
                            <td class="column8"><span class="badge bg-danger">cancle </span></td>
                            </tr>
                            <tr>
                                <td class="column1"></td>
                                <td class="column2"><a href="#">CS202211-001</a></td>
                                <td class="column3">Brandon Jacob******</td>
                                <td class="column4">IT</td>
                                <td class="column5">SV068014</td>
                                <td class="column6">backup exec and wsus server error backup exec and wsus
                                    exec and wsus server error</td>
                                <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
                                <td class="column8"><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td class="column1"></td>
                                <td class="column2"><a href="#">CS202211-001</a></td>
                                <td class="column3">Brandon Jacob******</td>
                                <td class="column4">IT</td>
                                <td class="column5">SV068014</td>
                                <td class="column6">backup exec and wsus server error backup exec and wsus
                                    exec and wsus server error</td>
                                <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
                                <td class="column8"><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td class="column1"></td>
                                <td class="column2"><a href="#">CS202211-001</a></td>
                                <td class="column3">Brandon Jacob******</td>
                                <td class="column4">IT</td>
                                <td class="column5">SV068014</td>
                                <td class="column6">backup exec and wsus server error backup exec and wsus
                                    exec and wsus server error</td>
                                <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
                                <td class="column8"><span class="badge bg-success">Success</span></td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->

        </div>
        </div><!-- End Left side columns -->

        </section>

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.min.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        <script src="table-count.js"></script>
</body>
</html>