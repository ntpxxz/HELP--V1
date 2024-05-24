<?php
include_once('..\config\function.php');

if (!isset($_SESSION)) {
    session_start();
    if (!$_SESSION['role'] == "user") {  //check session
        Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form }    

        $update_job = new DB_CON();
        if (isset($_POST['update'])) {

            $job_id = $_GET['job_job'];
            $user_name = $_POST['user_name'];
            $user_lastname = $_POST['user_lastname'];
            $user_sec = $_POST['user_sec'];
            $user_tel = $_POST['user_tel'];
            $item_name = $_POST['item_name'];
            $item_ass = $_POST['item_ass'];
            $job_cat = $_POST['job_cat'];
            $job_detail = $_POST['job_detail'];
            $job_charger = $_POST['job_charger'];
            $job_status = $_POST['job_status'];

            $sql = $update_job->update_jobs($job_date, $user_name, $user_lastname, $user_sec, $user_tel, $item_name, $item_ass, $job_cat, $job_detail,  $job_charger, $job_status, $chk_re, $re_de1, $re_date1, $re_de2, $re_date2, $re_com, $job_id);
            if ($sql) {
                echo "<script>alert('Update Successful');</script>";
                echo "<script>window.location.href='tbl_user.php'</script>";
            } else
                echo "<script>alert('Something went wrong !');</script>";
            echo "<script>window.location.href='tbl_user.php'</script>";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicons -->

        <!-- Google Fonts -->
        <link href="../https://fonts.gstatic.com" rel="preconnect">
        <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


        <title>RITH-IT HELPDESK</title>

    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.php" class="logo d-flex align-items-center">
                    <img src="assets/img/Riso-logo.jpg" alt="">
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

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">4</span>
                        </a><!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                You have 4 new notifications
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Lorem Ipsum</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>30 min. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div>
                                    <h4>Atque rerum nesciunt</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>1 hr. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Sit rerum fuga</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>2 hrs. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-info-circle text-primary"></i>
                                <div>
                                    <h4>Dicta reprehenderit</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">Show all notifications</a>
                            </li>

                        </ul><!-- End Notification Dropdown Items -->

                    </li><!-- End Notification Nav -->


                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="../upload/user_img/<?php echo $_SESSION['profile']; ?>" alt="" class="rounded-circle avatar-md-2 img-thumbnail">
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>RITH TESTADMIN</h6>
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
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->
        <main id="main-center" class="main">
            <!--UPDATE JOB PHP FUNCTION--><?php
                                            $job_id = $_GET['edit_job'];
                                            $update_job = new DB_CON();
                                            $sql =  $update_job->record_jobs($job_id);
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
                    <div class="container">
                        <form action="" method="POST" class="form-job">

                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body center ">

                                            <h4 class="card-title text-center">Update job request </h4>
                                            <hr>
                                            <!-- General Form Elements -->

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputjobID" class="form-label">Job ID</label>
                                                    <input type="text" class="form-control" id="job_id" name="job_id" value="<?php echo $row['job_id']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputdate" class=" form-label">Date</label>
                                                    <input type="date" class="form-control" id="job_date" name="job_date" value="<?php echo $row['job_date']; ?>">
                                                </div>
                                            </div><br>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputname" class="form-label">FirstName</label>
                                                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $row['user_name']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputlastname" class="form-label">LastName</label>
                                                    <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $row['user_lastname']; ?>">
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="inputsection" class="form-label">Section</label>
                                                    <select id="inputsection" class="form-select" id="user_sec" name="user_sec">
                                                        <option selected>Choose...</option>
                                                        <option value="IT" <?php
                                                                            if ($row['user_sec'] == "IT") {
                                                                                echo "selected=selected";
                                                                            } ?>>IT</option>
                                                        <option value="PE" <?php
                                                                            if ($row['user_sec'] == "PE") {
                                                                                echo "selected=selected";
                                                                            } ?>>PE</option>
                                                        <option value="PD" <?php
                                                                            if ($row['user_sec'] == "PD") {
                                                                                echo "selected=selected";
                                                                            } ?>>PD</option>
                                                        <option value="QE" <?php
                                                                            if ($row['user_sec'] == "QE") {
                                                                                echo "selected=selected";
                                                                            } ?>>QE</option>
                                                        <option value="QC" <?php
                                                                            if ($row['user_sec'] == "QC") {
                                                                                echo "selected=selected";
                                                                            } ?>>QC</option>
                                                        <option value="LOG" <?php
                                                                            if ($row['user_sec'] == "LOG") {
                                                                                echo "selected=selected";
                                                                            } ?>>LOG</option>
                                                        <option value="Other" <?php
                                                                                if ($row['user_sec'] == "Other") {
                                                                                    echo "selected=selected";
                                                                                } ?>>Other</option>
                                                    </select>
                                                </div><br>
                                                <div class="col-md-6">
                                                    <label for="inputPassword" class="form-label">Tel</label>
                                                    <input type="text" class="form-control" id=" user_tel" name="user_tel" value="<?php echo $row['user_tel']; ?>">
                                                </div>
                                            </div><br>

                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label for="item_name" class="form-label">item name</label>
                                                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>">
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label for=" item_area" class="form-label">Item area</label>
                                                    <input type="text" class="form-control" id="item_area" name="item_area" value="<?php echo $row['item_area']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputCat" class="form-label">Cause Categories</label>
                                                    <select id="inputCat" class="form-select" id="job_cat" name="job_cat">
                                                        <option selected>Choose...</option>
                                                        <option value="Request Install/Uninstall Program" <?php
                                                                                                            if ($row['job_cat'] == "Request Install/Uninstall Program") {
                                                                                                                echo "selected=selected";
                                                                                                            } ?>>RequestInstall/Uninstall Program</option>
                                                        <option value="Request setting" <?php
                                                                                        if ($row['job_cat'] == "Request setting") {
                                                                                            echo "selected=selected";
                                                                                        } ?>>Request setting</option>
                                                        <option value="Hardware Damage" <?php
                                                                                        if ($row['job_cat'] == "Hardware Damage") {
                                                                                            echo "selected=selected";
                                                                                        } ?>>Hardware Damage</option>
                                                        <option value="Software Error" <?php
                                                                                        if ($row['job_cat'] == "Software Error") {
                                                                                            echo "selected=selected";
                                                                                        } ?>>Software Error</option>
                                                        <option value="Human Error" <?php
                                                                                    if ($row['job_cat'] == "Human Error") {
                                                                                        echo "selected=selected";
                                                                                    } ?>>Human Error</option>
                                                        <option value="Replacement Computer" <?php
                                                                                                if ($row['job_cat'] == "Replacement Computer") {
                                                                                                    echo "selected=selected";
                                                                                                } ?>>Replacement Computer
                                                        </option>
                                                        <option value="Other" <?php
                                                                                if ($row['job_cats'] == "Other") {
                                                                                    echo "selected=selected";
                                                                                } ?>>Other</option>
                                                    </select>

                                                </div><br>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <label for="inputdetail class=" form-label">Job detail</label>
                                                <textarea class="form-control" name="job_detail" id="job_detail" rows="3"> <?php echo $row['job_detail']; ?> </textarea>

                                            </div><br>

                                            <div class="row g-3">
                                                <div class="mb-2">
                                                    <label for="formFileMultiple" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="formFileMultiple" name="job_img" value="<?php echo $row['job_img']; ?>">
                                                </div>
                                                <hr>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" name="update">Save</button></div>
                                                <div class="col-6"><a href="job_status.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                </div>
        </main>
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

    </html>
<?php } ?>