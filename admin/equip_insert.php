<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
    header("location:../index.php");
    exit();
}

$insertdata = new DB_CON();
if (isset($_POST['insert'])) {
    $item_reg = $_POST['item_reg'];
    $item_cat = $_POST['item_cat'];
    $item_type = $_POST['item_type'];
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_charger = $_POST['item_charger'];
    $item_sec = $_POST['item_sec'];
    $item_area = $_POST['item_area'];
    $item_detail = $_POST['item_detail'];
    $item_sup = $_POST['item_sup'];
    $item_warrant = $_POST['item_war'];


    $statusMsg = '';

    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");
    $numrand = (mt_rand());
    $type = strrchr($_FILES['upload']['name'], ".");

    // File upload path
    $path_img = "../upload/item_img/";
    $fileName = $numrand . $date . $type;
    $targetFilePath = $path_img . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST['insert']) && !empty($_FILES['upload']['name'])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath))
                $sql = $insertdata->insert_items($item_reg, $item_cat, $item_type, $item_id, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_warrant, $fileName);
            if ($sql) {
                echo "<script>alert('Record Successful');</script>";
                echo "<script>window.location.href=''equip_tbl.php'</script>";
            } else
                echo "<script>alert('Someting went wrong !');</script>";
            echo "<script>window.location.href='equip_tbl.php'</script>";
        } else
            echo "<script type='text/javascript'>";
        echo "alert('Sorry, there was an error uploading your file.');";
        echo "window.location = ''equip_tbl.php'; ";
        echo "</script>";
    } else
        echo "<script type='text/javascript'>";
    echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
    echo "window.location = ''equip_tbl.php'; ";
    echo "</script>";
}
$_SESSION['profile'];
$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="assets/img/Riso-logo.jpg" rel="icon">
    <link href="assets/imgRiso-logo.jpg" rel="Riso-logo">

    <!-- Google Fonts -->
    <link href="../https://fonts.gstatic.com" rel="preconnect">
    <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure Delete?');
        }
    </script>

    <title>Insert EQUIPMENTS</title>
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
                        <img src="../upload/user_img/<?php echo $_SESSION['profile']; ?>" alt="" class="avatar-sd rounded-circle">
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



    <!-- ADD EQUIPMENT -->
    <main id="main-center" class="main">

        <div class="container">

            <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
                <div class="container">

                    <form action="" method="POST" class="form-job" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body center ">

                                        <h4 class="card-title text-center">Register Equipment</h4>
                                        <hr>
                                        <!-- General Form Elements -->
                                        <div class="row">
                                            <div class="col-xxl-4">
                                                <label for="itemReg" class=" form-label">Register Date</label>
                                                <input type="date" class="form-control" id="item_reg" name="item_reg">
                                            </div>
                                            <div class="col-xxl-4 col-xl-4">
                                                <label for="item_cat" class="form-label">Catagories</label>
                                                <select id="item_cat" class="form-select" name="item_cat">
                                                    <option selected>Choose...</option>
                                                    <option value="Client">Client</option>
                                                    <option value="Jig">Jig</option>
                                                    <option value="Network">Network</option>
                                                    <option value="Server">Server</option>
                                                </select>
                                            </div><br>
                                            <div class="col-xxl-4 col-xl-4">
                                                <label for="item_type" class="form-label">Type</label>
                                                <select id="item_type" class="form-select" name="item_type">
                                                    <option selected>Choose...</option>
                                                    <option value="AD Server">AD Server</option>
                                                    <option value="AC Server">AC Server</option>
                                                    <option value="AP Controller">AP Controller</option>
                                                    <option value="AP Wifi">AP Wifi</option>
                                                    <option value="Backup Server">Backup Server</option>
                                                    <option value="Desktop" type="text">Desktop</option>
                                                    <option value="File Server">File Server</option>
                                                    <option value="HUB">HUB</option>
                                                    <option value="Notebook">Notebook</option>
                                                    <option value="Tablet" type="text">Tablet</option>
                                                    <option value="UPS">UPS</option>
                                                </select>
                                            </div><br>
                                        </div><br>

                                        <div class="row g-3">
                                            <div class="col-xxl-6">
                                                <label for="assNo" class="form-label">Asses No.</label>
                                                <input type="text" class="form-control" id="item_id" name="item_id">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="assName" class=" form-label">Equipment Name</label>
                                                <input type="text" class="form-control" id="item_name" name="item_name">
                                            </div>
                                        </div><br>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="itemCharger" class="form-label">User/Charger</label>
                                                <input type="text" class="form-control" id="item_charger" name="item_charger">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-xxl-6">
                                                <label for="itemSec" class="form-label">Section</label>
                                                <select id="itemSec" class="form-select" id="item_sec" name="item_sec">
                                                    <option selected>Choose...</option>
                                                    <option value="IT">IT</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PD">PD</option>
                                                    <option value="QE">QE</option>
                                                    <option value="QC">QC</option>
                                                    <option value="LOG">LOG</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-6">
                                                <label for=" item_area" class="form-label">Item area</label>
                                                <input type="text" class="form-control" id="item_area" name="item_area">
                                            </div>
                                        </div><br>
                                        <div class="col-lg-12 col-12">
                                            <label for="itemDetail class=" form-label">Detail/Specification</label>
                                            <textarea class="form-control" name="item_detail" id="item_detail" rows="3"></textarea>

                                        </div><br>
                                        <div class="row">
                                            <div class="col-xxl-12">
                                                <label for="itemSup" class="form-label">Supplier</label>
                                                <select id="itemSup" class="form-select" name="item_sup">
                                                    <option selected>Choose...</option>
                                                    <option value="FDI">FDI</option>
                                                    <option value="CSL / BTMU-3">CSL / BTMU-3</option>
                                                    <option value="JPN">JPN</option>
                                                    <option value="MAT">MAT</option>
                                                    <option value="NTT">QE</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="insert" value="item_img">Save</button></div>
                                            <div class="col-6"><a href="equip_tbl.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </section>
            <!--END UPDATE USER PHP FUNCTION-->

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