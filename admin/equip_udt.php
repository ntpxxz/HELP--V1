<?php
include_once('../config/function.php');
session_start();
if (!$_SESSION['role'] == "admin") {
    header("location:../index.php");
    exit();
}
$update_items = new DB_CON();
if (isset($_POST['update'])) {

    $item_name = $_GET['edit_item'];
    $item_reg = $_POST['item_reg'];
    $item_cat = $_POST['item_cat'];
    $item_type = $_POST['item_type'];
    $item_ass = $_POST['item_ass'];
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

    if (isset($_POST['update']) && !empty($_FILES['upload']['name'])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath))
                $sql = $update_items->update_items($item_reg, $item_cat, $item_type, $item_ass, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_warrant, $fileName);
            if ($sql) {
                echo "<script>alert('Update Successful');</script>";
                echo "<script>window.location.href=''equip_tbl.php'</script>";
            } else
                echo "<script>alert('Something went wrong !');</script>";
            echo "<script>window.location.href='equip_udt.php?edit_item=$item_name'; </script>";
        } else
            echo "<script type='text/javascript'>";
        echo "alert('Sorry, there was an error uploading your file.');";
        echo "window.location = 'equip_udt.php?edit_item=$item_name'; ";
        echo "</script>";
    } else if (isset($_POST['update']) && !empty($_FILES['upload']['name'])) {
        echo "<script type='text/javascript'>";
        echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
        echo "<script>window.location.href='equip_udt.php?edit_item=$item_name'; </script>";
        echo "</script>";
    } else


    $update = new DB_CON();
    $sql =  $update->record_item($item_name);
    $row = mysqli_fetch_array($sql);
    $fileName = $row['user_img'];
    $sql = $update_items->update_items($item_reg, $item_cat, $item_type, $item_ass, $item_name, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_warrant, $fileName);
    if ($sql) {
        echo "<script>alert('Update Successful');</script>";
        echo "<script>window.location.href=''equip_tbl.php'</script>";
    } else
        echo "<script>alert('Something went wrong !');</script>";
}


$_SESSION['name'];
$_SESSION['profile'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/favicon.png" rel="Riso-logo">


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

    <title>RITH-IT HELPDESK</title>
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
                <a class="nav-link collapsed" href=" brr_tbl.php">
                    <i class="bi bi-bag-plus"></i><span>Borrow</span>
                </a>
            </li><!-- End Profile Page Nav -->


            <li class="nav-item">
                <a class="nav-link nav-link-active" href="equip_tbl.php">
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
    <main class="main " id="main">
        <div class="container">
            <!--UPDATE ITEM PHP FUNCTION-->
            <?php
            $item_name = $_GET['edit_item'];
            $update = new DB_CON();
            $sql =  $update->record_item($item_name);
            $row = mysqli_fetch_array($sql); {
            ?>
                <section class="section register flex-column align-items-center justify-content-center mt-2 ">
                    <form action="" method="POST" class="form-job" id="edit_item" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center">Update Data Devices</h4>
                                        <hr>
                                        <!-- General Form Elements -->
                                        <div class="row">
                                            <div class="col-xxl-4">
                                                <label for="itemReg" class=" form-label">Register Date</label>
                                                <input type="date" class="form-control" id="item_reg" name="item_reg" value="<?php echo $row['item_reg']; ?>">
                                            </div>
                                            <div class="col-xxl-4 col-xl-4">
                                                <label for="item_cat" class="form-label">Catagories</label>
                                                <select id="item_cat" class="form-select" name="item_cat">
                                                    <option selected>Choose...</option>
                                                    <option value="Client" <?php
                                                                            if ($row['item_cat'] == "Client") {
                                                                                echo "selected=selected";
                                                                            } ?>>Client</option>
                                                    <option value="Jig" <?php
                                                                        if ($row['item_cat'] == "Jig") {
                                                                            echo "selected=selected";
                                                                        } ?>>Jig</option>
                                                    <option value="Network" <?php
                                                                            if ($row['item_cat'] == "Network") {
                                                                                echo "selected=selected";
                                                                            } ?>>Network</option>
                                                    <option value="Server" <?php
                                                                            if ($row['item_cat'] == "Server") {
                                                                                echo "selected=selected";
                                                                            } ?>>Server</option>
                                                </select>
                                            </div><br>
                                            <div class="col-xxl-4 col-xl-4">
                                                <label for="item_type" class="form-label">Type</label>
                                                <select id="item_type" class="form-select" name="item_type">
                                                    <option selected>Choose...</option>
                                                    <option value="AD Server" <?php
                                                                                if ($row['item_type'] == "AD Server") {
                                                                                    echo "selected=selected";
                                                                                } ?>>AD Server</option>
                                                    <option value="AC Server" <?php
                                                                                if ($row['item_type'] == "AC Server") {
                                                                                    echo "selected=selected";
                                                                                } ?>>AC Server</option>
                                                    <option value="AP Controller" <?php
                                                                                    if ($row['item_type'] == "AP Controller") {
                                                                                        echo "selected=selected";
                                                                                    } ?>>AP Controller</option>
                                                    <option value="AP Wifi" <?php
                                                                            if ($row['item_type'] == "AP Wifi") {
                                                                                echo "selected=selected";
                                                                            } ?>>AP Wifi</option>
                                                    <option value="Backup Server" <?php
                                                                                    if ($row['item_type'] == "Backup Server") {
                                                                                        echo "selected=selected";
                                                                                    } ?>>Backup Server</option>
                                                    <option value="Desktop" <?php
                                                                            if ($row['item_type'] == "Desktop") {
                                                                                echo "selected=selected";
                                                                            } ?>>Desktop</option>
                                                    <option value="File Server" <?php
                                                                                if ($row['item_type'] == "File Server") {
                                                                                    echo "selected=selected";
                                                                                } ?>>File Server</option>
                                                    <option value="HUB" <?php
                                                                        if ($row['item_type'] == "HUB") {
                                                                            echo "selected=selected";
                                                                        } ?>>HUB</option>
                                                    <option value="Notebook" <?php
                                                                                if ($row['item_type'] == "Notebook") {
                                                                                    echo "selected=selected";
                                                                                } ?>>Notebook</option>
                                                    <option value="Tablet" <?php
                                                                            if ($row['item_type'] == "Tablet") {
                                                                                echo "selected=selected";
                                                                            } ?>>Tablet</option>
                                                    <option value="UPS" <?php
                                                                        if ($row['item_type'] == "UPS") {
                                                                            echo "selected=selected";
                                                                        } ?>>UPS</option>
                                                </select>
                                            </div><br>
                                        </div>

                                        <div class="row g-3 pt-4">
                                            <div class="col-xxl-6">
                                                <label for="assNo" class="form-label">Asses No.</label>
                                                <input type="text" class="form-control" id="item_ass" name="item_ass" value="<?php echo $row['item_ass']; ?>">
                                            </div>
                                            <div class="col-xxl-6">
                                                <label for="assName" class=" form-label">Equipment Name</label>
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="row g-3 pt-4">
                                            <div class="col-12">
                                                <label for="itemCharger" class="form-label">User/Charger</label>
                                                <input type="text" class="form-control" id="item_charger" name="item_charger" value="<?php echo $row['item_charger']; ?>">
                                            </div>
                                        </div>
                                        <div class="row g-3 pt-4">
                                            <div class="col-xxl-6">
                                                <label for="itemSec" class="form-label">Section</label>
                                                <select id="itemSec" class="form-select" id="item_sec" name="item_sec">
                                                    <option value="AC" <?php
                                                                        if ($row['item_sec'] == "ACC") {
                                                                            echo "selected=selected";
                                                                        } ?>>AC</option>
                                                    <option value="ADM" <?php
                                                                        if ($row['item_sec'] == "ADM") {
                                                                            echo "selected=selected";
                                                                        } ?>>ADM</option>
                                                    <option value="BOI" <?php
                                                                        if ($row['item_sec'] == "BOI") {
                                                                            echo "selected=selected";
                                                                        } ?>>BOI</option>
                                                    <option value="IT" <?php
                                                                        if ($row['item_sec'] == "IT") {
                                                                            echo "selected=selected";
                                                                        } ?>>IT</option>
                                                    <option value="LG" <?php
                                                                        if ($row['item_sec'] == "LG") {
                                                                            echo "selected=selected";
                                                                        } ?>>LG</option>
                                                    <option value="PC" <?php
                                                                        if ($row['item_sec'] == "PC") {
                                                                            echo "selected=selected";
                                                                        } ?>>PC</option>
                                                    <option value="PD" <?php
                                                                        if ($row['item_sec'] == "PD") {
                                                                            echo "selected=selected";
                                                                        } ?>>PD</option>
                                                    <option value="PE" <?php
                                                                        if ($row['item_sec'] == "PE") {
                                                                            echo "selected=selected";
                                                                        } ?>>PE</option>
                                                    <option value="PU" <?php
                                                                        if ($row['item_sec'] == "PU") {
                                                                            echo "selected=selected";
                                                                        } ?>>PU</option>
                                                    <option value="QA" <?php
                                                                        if ($row['item_sec'] == "QA") {
                                                                            echo "selected=selected";
                                                                        } ?>>QA</option>
                                                    <option value="QC" <?php
                                                                        if ($row['item_sec'] == "QC") {
                                                                            echo "selected=selected";
                                                                        } ?>>QC</option>
                                                    <option value="QE" <?php
                                                                        if ($row['item_sec'] == "QE") {
                                                                            echo "selected=selected";
                                                                        } ?>>QE</option>

                                                    <option value="Other" <?php
                                                                            if ($row['item_sec'] == "Other") {
                                                                                echo "selected=selected";
                                                                            } ?>>Other</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-6 pt-0">
                                                <label for=" item_area" class="form-label">Item area</label>
                                                <input type="text" class="form-control" id="item_area" name="item_area" value="<?php echo $row['item_area']; ?>">
                                            </div>
                                        </div><br>
                                        <div class="col-lg-12 col-12">
                                            <label for="itemDetail class=" form-label">Detail/Specification</label>
                                            <textarea class="form-control" name="item_detail" id="item_detail" rows="3"><?php echo $row['item_detail']; ?></textarea>

                                        </div>
                                        <div class="row pt-4">
                                            <div class="col-xxl-4">
                                                <label for="itemsup" class="form-label">Supplier</label>
                                                <input type="text" class="form-control" id="item_sup" name="item_sup" value="<?php echo $row['item_sup']; ?>">
                                            </div>
                                            <div class="col-xxl-8  ">
                                                <label for=" Warranty" class="form-label">S/N serial</label>
                                                <input type="text" class="form-control" id="item_war" name="item_war" value=" <?php echo $row['item_war']; ?>">
                                            </div>
                                        </div>


                                        <div class="row g-3 mt-3">
                                            <div class="col-12 mb-2 align-items-center justify-content-center ">
                                                <!-- Upload  -->
                                                <!--<div id="file-upload-form" class="uploader">
                                   <input class="form-control" type="file" id="file-upload" class="hidden" accept="image/*" name="fileUpload">
                                   <label for="file-upload" id="file-drag">
                                       <img id="file-image" src="#" alt="Preview" class="hidden">
                                       <div id="start">
                                           <i class="bi bi-images" aria-hidden="true"></i>
                                           <div>Select a file or drag here</div>
                                           <div id="notimage" class="hidden">Please select an image</div>
                                           <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                       </div>
                                       <div id="response" class="hidden">
                                           <div id="messages"></div>
                                           <progress class="progress" id="file-progress" value="0">
                                               <span>0</span>%
                                           </progress>
                                       </div>
                                   </label>
                               </div>-->

                                                <div class="row mb-2 justify-content-center align-items-center">
                                                    <div id="file-upload-form" class="uploader">
                                                        <input class="form-control" type="file" id="upload" hidden="" accept="image/*" name="upload" onchange="uploadPhotos(imageUploadUrl)">
                                                        <label for="upload" id="file-drag" class="img-responsive">
                                                            <div class="col-12 mb-2 mt-2 text-center">
                                                                <div id="start">
                                                                    <div class="btn-container">
                                                                        <?php if (!empty($row['item_img'])) : ?>
                                                                            <img src="../upload/item_img/<?php echo $row['item_img']; ?>" class="img-responsive img-thumbnail" id="uploadImageItem">
                                                                        <?php else : ?>
                                                                            <img src="../upload/item_img/uppic.png" class="img-responsive img-thumbnail" id="uploadImageItem">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div id="notimage" class="hidden">Please select an image</div>
                                                            </div>
                                                            <div id="response" class="hidden">
                                                                <div id="messages"></div>
                                                                <progress class="progress" id="file-progress" value="0">
                                                                    <span>0</span>%
                                                                </progress>
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
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-md-4 mb-2 mt-2"><button type="submit" class="btn btn-primary w-100" name="update">Update</button></div>
                                            <div class="col-md-4 mb-2 mt-2"><a href=equip_del.php?del_item=<?php echo $row['item_name']; ?> class="btn btn-danger w-100" onclick="return checkDelete()">Delete</a>
                                            </div>
                                            <div class="col-md-4 mb-2 mt-2"><a href="equip_tbl.php" class="btn btn-secondary w-100 " name="cancel">cancel</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </section>
        </div>
    </main>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RISO Industry (Thailand)Co.,Ltd.</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

</body>
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


</html><?php } ?>