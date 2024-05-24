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
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link href="../assets/css/style_u.css" rel="stylesheet">
    <!--
    
TemplateMo 561 Purple Buzz

https://templatemo.com/tm-561-purple-buzz

-->
</head>

<body>
    <nav id="main_nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow mb-0 px-1">
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
                            <a class="nav-link rounded-pill active  px-3" href="home_u.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="case_tbl.php">Job Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_ist.php">Request Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  btn-outline-primary rounded-pill px-3" href="brr_tbl.php">Borrow Equipment</a>
                        <li class="nav-item">
                            <a class="nav-link  btn-outline-primary rounded-pill" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex dropdown mobile-menu-toggle">

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

    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12 p-0">
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
                            <p class="featured-block-text"><strong>(Coming Soon)</strong></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service -->
    <!-- About -->
    <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12  mb-lg-0 mb-4">
                    <img src="../assets/img/news-5.jpg" class="custom-text-box-image img-fluid" alt="">
                </div>

                <div class="col-lg-6 col-12">
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

                                        <span class="counter-number" data-from="1" data-to="68" data-speed="1000"></span>
                                        <span class="counter-number-text">
                                            <?php echo $total['total']; ?>
                                        </span>
                                    </div>

                                    <span class="counter-text">Devices</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About -->




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