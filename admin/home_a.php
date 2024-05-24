<?php
include_once('../config/function.php');
session_start();

if (!$_SESSION['role'] == "user") {
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form//
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>RITH-IT HELPDESK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">




    <!-- Load Require CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Font CSS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@1,100&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../assets/css/templatemo_a.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link href="../assets/css/style.css" rel="stylesheet">



</head>

<body>
    <!-- Header -->
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
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link  collapsed" href="dash.php">
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
                <a class="nav-link nav-link-active" href="home_a.php">
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
                <a class="nav-link  collapsed" href="contact.php">
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
            <section class="hero-section hero-section-full-height">

                <div class="row">

                    <div class="col-lg-12 col-md-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../assets/img/bg-home.jpg" class="carousel-image img-fluid" alt="...">
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>RITH IT</h1>
                                        <h5>Riso industry (thailand) co., ltd</h5>
                                    </div>

                                </div>

                                <div class="carousel-item">
                                    <img src="../assets/img/computerrepair1.jpg" class="carousel-image img-fluid" alt="...">
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>RITH IT</h1>
                                        <h5>Riso industry (thailand) co., ltd</h5>
                                    </div>

                                </div>

                                <div class="carousel-item">
                                    <img src="../assets/img/services-05.jpg" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>RITH IT</h1>
                                        <h5>Riso industry (thailand) co., ltd</h5>
                                    </div>

                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
        </div>
        </section>

        <!-- Start Service -->
        <section class="section-padding container overflow-hidden py-5 mb-5 align-items-center justify-content-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="h2 text-center col-12 py-3 semi-bold-600">Services</h2>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="case_ist.php" class="d-block">
                                <img src="../assets/img/icon/maintenance.png" class="featured-block-image img-fluid" alt="">
                                <p class="featured-block-text"><strong>Request Maintenance</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="" class="d-block">
                                <img src="../assets/img/icon/laptop.png" class="featured-block-image img-fluid" alt="">
                                <p class="featured-block-text"><strong>Borrow Device</strong></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Service -->
        <!-- About -->
        <section class="col-12 section-padding section-bg" id="section_2">
            <div class="container ">
                <div class="row ">
                    <div class="col-lg-6 col-md-12 mb-lg-2 mb-4">
                        <img src="../assets/img/news-5.jpg" class="custom-text-box-image img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="custom-text-box">
                            <h2 class="mb-2">About Us</h2>

                            <h5 class="mb-3">We are a copier manufacturing company. High-speed copiers under the name "RISO"</h5>

                            <p class="mb-0"> Which has been distributed in Thailand
                                for more than 10 years, has opened a production line for copiers. Copier machine in Thailand for the first time using high technology.
                                located in Rojana 3 Industrial Estate</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="custom-text-box mb-lg-0">
                                    <h5 class="mb-2">Our Mission</h5>
                                    <p></p>
                                    <ul class="custom-list mt-2">
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Reduce Cost
                                        </li>
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Increase work efficiency
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="custom-text-box d-flex flex-wrap d-block mb-lg-0">


                                    <div class="counter-thumb">
                                        <div class="d-flex"><?php
                                                            require('../config/dbconnect.php');
                                                            $sql = "SELECT COUNT(item_name) as total
                                                            FROM rith_item ";
                                                            $result = mysqli_query($connect, $sql);
                                                            $total = mysqli_fetch_assoc($result);
                                                            ?>

                                            <span class="counter-number-text" data-from="1" data-to="68" data-speed="1000"></span>
                                            <span class="counter-number">
                                                <?php echo $total['total']; ?>
                                            </span>
                                        </div>

                                        <span class="counter-text  ">Devices</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End About -->
    </main>




    <!-- Start Footer -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RISO Industry (Thailand)Co.,Ltd.</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <!-- Bootstrap -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="../assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/click-scroll.js"></script>


</body>

</html>