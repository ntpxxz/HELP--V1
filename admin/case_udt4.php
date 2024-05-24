   <?php
    include_once('..\config\function.php');
    session_start();
    if (!$_SESSION['role'] == "admin") {
        header("location:../pages-login.php");
        exit();
    }
    $_SESSION['name'];
    $insertdata = new DB_CON();
    if (isset($_POST['update'])) {

        $chk_id = $_GET['print_case'];
        $chk_re = $_POST['chk_re'];

        $re_so = "";
        if (isset($_POST['re_detail1']) && $_POST['re_detail1'] != "") {
            $re_so = ($_POST['re_detail1']);
        } else {
            $re_so = ($_POST['re_detail2']);
        }

        $re_date = $_POST['re_date'];
        $re_sts = $_POST['re_sts'];
        $re_com = $_POST['re_com'];


        $sql = $insertdata->insert_reply($chk_id, $chk_re, $re_so, $re_date, $re_sts, $re_com);
        if ($sql) {
            echo "<script>alert('Record Successful');</script>";
            echo "<script>window.location.href='#'</script>";
        } else
            echo "<script>alert('Something went wrong !');</script>";
        echo "<script>window.location.href='#'</script>";
    }
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
       <link href="https://fonts.gstatic.com" rel="preconnect">
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

       <!-- Vendor CSS Files -->
       <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
       <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
       <link href="../ssets/vendor/quill/quill.snow.css" rel="stylesheet">
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
                           <img src="../assets/img/logo mofuu V2.jpg" alt="Profile" class="rounded-circle">
                           <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span>
                       </a><!-- End Profile Iamge Icon -->

                       <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                           <li class="dropdown-header">
                               <h6><?php echo $_SESSION['name']; ?></h6>
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
                   <a class="nav-link  collapsed" href="dash.php">
                       <i class="bi bi-grid"></i>
                       <span>Dashboard</span>
                   </a>
               </li><!-- End Dashboard Nav -->

               <li class="nav-item">
                   <a class="nav-link nav-link-active " href="#">
                       <i class="bi bi-tools"></i></i><span>Job Status</span>
                   </a>
               </li><!-- End job status Nav -->

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
                   <a class="nav-link collapsed" href="index.php">
                       <i class="bi bi-house"></i>
                       <span>RITH</span>
                   </a>
               </li><!-- End Dashboard Nav -->

               <li class="nav-item">
                   <a class="nav-link collapsed" href="users-profile.html">
                       <i class="bi bi-person"></i>
                       <span>Profile</span>
                   </a>
               </li><!-- End Profile Page Nav -->

               <li class="nav-item">
                   <a class="nav-link collapsed" href="pages-contact.html">
                       <i class="bi bi-envelope"></i>
                       <span>Contact</span>
                   </a>
               </li><!-- End Contact Page Nav -->

               <li class="nav-item">
                   <a class="nav-link collapsed" href="insertuser.html">
                       <i class="bi bi-card-list"></i>
                       <span>Register</span>
                   </a>
               </li><!-- End Register Page Nav -->

           </ul>
       </aside><!-- End Sidebar-->

       <div class="col-xl-9 col-md-6 col-12 mb-md-0 mb-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                       <div class="mb-xl-0 mb-4">
                           <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">

                               <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0"></path>
                                   <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616"></path>
                                   <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616"></path>
                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0"></path>
                               </svg>

                               <span class="app-brand-text fw-bold fs-4">
                                   Vuexy
                               </span>
                           </div>
                           <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                           <p class="mb-2">San Diego County, CA 91905, USA</p>
                           <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                       </div>
                       <div>
                           <h4 class="fw-semibold mb-2">INVOICE #86423</h4>
                           <div class="mb-2 pt-1">
                               <span>Date Issues:</span>
                               <span class="fw-semibold">April 25, 2021</span>
                           </div>
                           <div class="pt-1">
                               <span>Date Due:</span>
                               <span class="fw-semibold">May 25, 2021</span>
                           </div>
                       </div>
                   </div>
               </div>
               <hr class="my-0">
               <div class="card-body">
                   <div class="row p-sm-3 p-0">
                       <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                           <h6 class="mb-3">Invoice To:</h6>
                           <p class="mb-1">Thomas shelby</p>
                           <p class="mb-1">Shelby Company Limited</p>
                           <p class="mb-1">Small Heath, B10 0HF, UK</p>
                           <p class="mb-1">718-986-6062</p>
                           <p class="mb-0">peakyFBlinders@gmail.com</p>
                       </div>
                       <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                           <h6 class="mb-4">Bill To:</h6>
                           <table>
                               <tbody>
                                   <tr>
                                       <td class="pe-4">Total Due:</td>
                                       <td><strong>$12,110.55</strong></td>
                                   </tr>
                                   <tr>
                                       <td class="pe-4">Bank name:</td>
                                       <td>American Bank</td>
                                   </tr>
                                   <tr>
                                       <td class="pe-4">Country:</td>
                                       <td>United States</td>
                                   </tr>
                                   <tr>
                                       <td class="pe-4">IBAN:</td>
                                       <td>ETD95476213874685</td>
                                   </tr>
                                   <tr>
                                       <td class="pe-4">SWIFT code:</td>
                                       <td>BR91905</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="table-responsive border-top">
                   <table class="table m-0">
                       <thead>
                           <tr>
                               <th>Item</th>
                               <th>Description</th>
                               <th>Cost</th>
                               <th>Qty</th>
                               <th>Price</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td class="text-nowrap">Vuexy Admin Template</td>
                               <td class="text-nowrap">HTML Admin Template</td>
                               <td>$32</td>
                               <td>1</td>
                               <td>$32.00</td>
                           </tr>
                           <tr>
                               <td class="text-nowrap">Frest Admin Template</td>
                               <td class="text-nowrap">Angular Admin Template</td>
                               <td>$22</td>
                               <td>1</td>
                               <td>$22.00</td>
                           </tr>
                           <tr>
                               <td class="text-nowrap">Apex Admin Template</td>
                               <td class="text-nowrap">HTML Admin Template</td>
                               <td>$17</td>
                               <td>2</td>
                               <td>$34.00</td>
                           </tr>
                           <tr>
                               <td class="text-nowrap">Robust Admin Template</td>
                               <td class="text-nowrap">React Admin Template</td>
                               <td>$66</td>
                               <td>1</td>
                               <td>$66.00</td>
                           </tr>
                           <tr>
                               <td colspan="3" class="align-top px-4 py-4">
                                   <p class="mb-2 mt-3">
                                       <span class="ms-3 fw-semibold">Salesperson:</span>
                                       <span>Alfie Solomons</span>
                                   </p>
                                   <span class="ms-3">Thanks for your business</span>
                               </td>
                               <td class="text-end pe-3 py-4">
                                   <p class="mb-2 pt-3">Subtotal:</p>
                                   <p class="mb-2">Discount:</p>
                                   <p class="mb-2">Tax:</p>
                                   <p class="mb-0 pb-3">Total:</p>
                               </td>
                               <td class="ps-2 py-4">
                                   <p class="fw-semibold mb-2 pt-3">$154.25</p>
                                   <p class="fw-semibold mb-2">$00.00</p>
                                   <p class="fw-semibold mb-2">$50.00</p>
                                   <p class="fw-semibold mb-0 pb-3">$204.25</p>
                               </td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="card-body mx-3">
                   <div class="row">
                       <div class="col-12">
                           <span class="fw-semibold">Note:</span>
                           <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance
                               projects. Thank You!</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>













       <main class="page my-2" size="A4" id="pdf-content">
           <!--UPDATE JOB PHP FUNCTION--><?php
                                            $job_id = $_GET['edit_job'];
                                            $update_job = new DB_CON();
                                            $sql =  $update_job->record_jobs($job_id);
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>


               <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
                   <div class="container">

                       <div class="col-xl-9 col-md-6 col-12 mb-md-0 mb-4">
                           <div class="card">
                               <div class="card-body">
                                   <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                                       <div class="mb-xl-0 mb-4">
                                           <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">

                                               <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0"></path>
                                                   <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616"></path>
                                                   <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616"></path>
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0"></path>
                                               </svg>

                                               <span class="app-brand-text fw-bold fs-4">
                                                   Vuexy
                                               </span>
                                           </div>
                                           <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                                           <p class="mb-2">San Diego County, CA 91905, USA</p>
                                           <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                       </div>
                                       <div>
                                           <h4 class="fw-semibold mb-2">INVOICE #86423</h4>
                                           <div class="mb-2 pt-1">
                                               <span>Date Issues:</span>
                                               <span class="fw-semibold">April 25, 2021</span>
                                           </div>
                                           <div class="pt-1">
                                               <span>Date Due:</span>
                                               <span class="fw-semibold">May 25, 2021</span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <hr class="my-0">
                               <div class="card-body">
                                   <div class="row p-sm-3 p-0">
                                       <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                           <h6 class="mb-3">Invoice To:</h6>
                                           <p class="mb-1">Thomas shelby</p>
                                           <p class="mb-1">Shelby Company Limited</p>
                                           <p class="mb-1">Small Heath, B10 0HF, UK</p>
                                           <p class="mb-1">718-986-6062</p>
                                           <p class="mb-0">peakyFBlinders@gmail.com</p>
                                       </div>
                                       <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                           <h6 class="mb-4">Bill To:</h6>
                                           <table>
                                               <tbody>
                                                   <tr>
                                                       <td class="pe-4">Total Due:</td>
                                                       <td><strong>$12,110.55</strong></td>
                                                   </tr>
                                                   <tr>
                                                       <td class="pe-4">Bank name:</td>
                                                       <td>American Bank</td>
                                                   </tr>
                                                   <tr>
                                                       <td class="pe-4">Country:</td>
                                                       <td>United States</td>
                                                   </tr>
                                                   <tr>
                                                       <td class="pe-4">IBAN:</td>
                                                       <td>ETD95476213874685</td>
                                                   </tr>
                                                   <tr>
                                                       <td class="pe-4">SWIFT code:</td>
                                                       <td>BR91905</td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                               <div class="table-responsive border-top">
                                   <table class="table m-0">
                                       <thead>
                                           <tr>
                                               <th>Item</th>
                                               <th>Description</th>
                                               <th>Cost</th>
                                               <th>Qty</th>
                                               <th>Price</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td class="text-nowrap">Vuexy Admin Template</td>
                                               <td class="text-nowrap">HTML Admin Template</td>
                                               <td>$32</td>
                                               <td>1</td>
                                               <td>$32.00</td>
                                           </tr>
                                           <tr>
                                               <td class="text-nowrap">Frest Admin Template</td>
                                               <td class="text-nowrap">Angular Admin Template</td>
                                               <td>$22</td>
                                               <td>1</td>
                                               <td>$22.00</td>
                                           </tr>
                                           <tr>
                                               <td class="text-nowrap">Apex Admin Template</td>
                                               <td class="text-nowrap">HTML Admin Template</td>
                                               <td>$17</td>
                                               <td>2</td>
                                               <td>$34.00</td>
                                           </tr>
                                           <tr>
                                               <td class="text-nowrap">Robust Admin Template</td>
                                               <td class="text-nowrap">React Admin Template</td>
                                               <td>$66</td>
                                               <td>1</td>
                                               <td>$66.00</td>
                                           </tr>
                                           <tr>
                                               <td colspan="3" class="align-top px-4 py-4">
                                                   <p class="mb-2 mt-3">
                                                       <span class="ms-3 fw-semibold">Salesperson:</span>
                                                       <span>Alfie Solomons</span>
                                                   </p>
                                                   <span class="ms-3">Thanks for your business</span>
                                               </td>
                                               <td class="text-end pe-3 py-4">
                                                   <p class="mb-2 pt-3">Subtotal:</p>
                                                   <p class="mb-2">Discount:</p>
                                                   <p class="mb-2">Tax:</p>
                                                   <p class="mb-0 pb-3">Total:</p>
                                               </td>
                                               <td class="ps-2 py-4">
                                                   <p class="fw-semibold mb-2 pt-3">$154.25</p>
                                                   <p class="fw-semibold mb-2">$00.00</p>
                                                   <p class="fw-semibold mb-2">$50.00</p>
                                                   <p class="fw-semibold mb-0 pb-3">$204.25</p>
                                               </td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>

                               <div class="card-body mx-3">
                                   <div class="row">
                                       <div class="col-12">
                                           <span class="fw-semibold">Note:</span>
                                           <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance
                                               projects. Thank You!</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>





                       <form action="" method="POST" class="form-job">

                           <div class="row g-3 p-4">
                               <div class="col-lg-6">
                                   <div class="card ">
                                       <div class="card-body center p-4">

                                           <section class="top-content  d-flex   align-items-center justify-content-center py-5">

                                               <div class="col-2 align-self-start mb-2 d-flex">
                                                   <div class="logo">
                                                       <img src="../assets/img/Riso-logo.jpg" alt="" class="img-fluid">
                                                   </div>
                                               </div>
                                               <div class="col-6 align-self-end text-start">
                                                   <h5>Computer Service Request Form</h5>
                                               </div>
                                               <div class="col-4 align-self-end text-end">
                                                   <div>
                                                       <h6>Req. No:<?php echo $row['job_id']; ?></h6>
                                                   </div>
                                               </div>

                                           </section>
                                           <div class=" border-black">
                                               <section class="case-area mt-0 ">

                                                   <table class="table table-hover">
                                                       <thead>
                                                           <tr>
                                                               <td class="col-3">
                                                                   <span><b><i>Requester</i></b> </span>
                                                               </td>
                                                               <td class="col-5">
                                                                   <span><b><i>Name:</i></b> <?php echo $row['user_name']; ?> </span>
                                                               </td>
                                                               <td class="col-4">
                                                                   <span><b><i>Section:</i></b> <?php echo $row['user_sec']; ?></span>
                                                               </td>
                                                           </tr>
                                                       </thead>
                                                   </table>

                                                   <table>
                                                       <tbody>
                                                           <tr>
                                                               <div class="row">
                                                                   <td class="col-4 pd-3"><b>&nbsp;&nbsp;&nbsp;Equipment Type:</b></td>
                                                               </div>
                                                           </tr>
                                                           <tr class="mt-2 d-flex justify-content-between">
                                                               <div class="">
                                                                   <td class="col-6 "><b>&nbsp;&nbsp;&nbsp;Computer name:</b>&nbsp;<?php echo $row['item_name']; ?></td>
                                                                   <td class="col-6"><b>&nbsp;&nbsp;&nbsp;Asset No. :</b>&nbsp;OE-522002</td>
                                                               </div>
                                                           </tr>
                                                       </tbody>
                                                   </table>
                                                   <table class="mt-2">
                                                       <tbody>
                                                           <tr>
                                                               <div class="col-12">
                                                                   <td class="col-12"> <b>&nbsp;&nbsp;&nbsp;Problem Details:</b> <?php echo $row['job_detail']; ?>.</td>
                                                               </div>

                                                           </tr>
                                                       </tbody>
                                                   </table>

                                               </section>
                                               <section class="case-area mt-0">
                                                   <table class="table table-hover">
                                                       <thead>
                                                           <tr>
                                                               <td class="col-2">
                                                                   <span><b><i>IT Support</i></b> </span>
                                                               </td>
                                                               <td class="col-4">
                                                                   <span><b><i>Received By:</i></b>&nbsp;<?php echo $row['job_charger']; ?></span>
                                                               </td>
                                                               <td class="col-4">
                                                                   <span><b><i>Section:</i></b></span>
                                                               </td>
                                                           </tr>
                                                       </thead>
                                                   </table>
                                                   <form action="" method="POST" class="source-item pt-0 px-0 px-sm-3">
                                                       <div class="mb-2" data-repeater-list="group-a">
                                                           <div class="repeater-wrapper pt-0 pt-md-2" data-repeater-item="">
                                                               <div class="d-flex rounded position-relative pe-0">
                                                                   <div class="col-md-12 col-12 mb-md-0 mb-2">
                                                                       <p class="mb-2 repeater-title"><b>Checked result:</b></p>
                                                                       <textarea class="form-control" rows="2" placeholder="Please enter details" id="chk_re" name="chk_re"></textarea>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="row">
                                                           <div class="col-md- mb-md-0 mb-3">
                                                               <div class="repeater-wrapper d-flex align-items-center mb-2">
                                                                   <div class="col-md-12 col-12 mb-md-0 mb-2 justify-content-start">
                                                                       <label for="salesperson" class="form-label me-4"><b>Resolution:</b></label>
                                                                       <div class="row g-3 d-flex align-items-center  mb-2">
                                                                           <div class="col-lg-3">
                                                                               <input type="checkbox" id="re_so" name="re_so"><label class="fw-semibold">&nbsp;&nbsp;Request to:</label>
                                                                           </div>
                                                                           <div class="col-lg-5">
                                                                               <input type="text" class="form-control" id="re_detail1" name="re_detail1" placeholder="Please enter External provider" value="">
                                                                           </div>
                                                                           <div class="col-lg-1">
                                                                               <b>&nbsp;On: </b>
                                                                           </div>

                                                                           <div class="col-lg-3">
                                                                               <input type="date" class="form-control" id="re_date" placeholder="Add External provider" value="" name="re_date">
                                                                           </div>
                                                                       </div>
                                                                       <div class="row g-3 d-flex align-items-center mb-2">
                                                                           <div class="col-lg-3">
                                                                               <input type="checkbox" id="re_so" name="re_so"><label class="fw-semibold">&nbsp;&nbsp;Request to replace parts:</label>
                                                                           </div>

                                                                           <div class="col-lg-5">
                                                                               <input type="text" class="form-control" id="re_detail2" placeholder="Please enter part details" value="" name="re_detail2">
                                                                           </div>
                                                                           <div class="col-lg-1">
                                                                               <b>&nbsp;On: </b>
                                                                           </div>

                                                                           <div class="col-lg-3">
                                                                               <input type="date" class="form-control" id="re_date" placeholder="Add External provider" value="" name="re_date">
                                                                           </div>
                                                                       </div>

                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                               </section>
                                               <section class="case-area mt-3">
                                                   <table class="table table-hover ">
                                                       <thead>
                                                           <tr>
                                                               <td class="col-12">
                                                                   <b><i>Work Completed Report</i></b>
                                                               </td>

                                                           </tr>
                                                       </thead>
                                                   </table>
                                                   <tr class="d-flex rounded position-relative pe-2">
                                                       <div class="col-lg-4 col-md-4">
                                                           <select id="inputsection" class="form-select" id="re_sts" name="re_sts">
                                                               <option selected>Choose...</option>
                                                               <option value="IT">Repair Complete</option>
                                                               <option value="PE">Equipment can't be repaired</option>
                                                           </select>
                                                       </div>
                                                   </tr>
                                                   <form class="source-item pt-2 px-0 px-sm-3">
                                                       <div class="mb-2" data-repeater-list="group-a">
                                                           <div class="repeater-wrapper pt-2 pt-md-2" data-repeater-item="" ">
                                           <div class=" d-flex rounded position-relative pe-0">
                                                               <div class="col-md-12 col-12 mb-md-0 mb-2">
                                                                   <textarea class="form-control" rows="2" placeholder="Please enter details" id="re_com" name="re_com"></textarea>
                                                               </div>
                                                           </div>
                                                       </div>
                                           </div>
                       </form>
               </section>
               </div>
               </div>
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