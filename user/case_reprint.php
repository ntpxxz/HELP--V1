   <?php
    include('..\config\function.php');
    session_start();
    if (!$_SESSION['role'] == "user") {
      header("location:../index.php");
      exit();
    }
    $_SESSION['name'];
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
     <link href="../assets/img/Riso-logo.jpg" rel="icon">
     <link href="../assets/imgRiso-logo.jpg" rel="Riso-logo">


     <!-- Load Require CSS -->
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
     <!-- Load Tempalte CSS -->
     <link rel="stylesheet" href="../assets/css/templatemo.css">
     <!-- Custom CSS -->
     <link rel="stylesheet" href="../assets/css/custom.css">

     <!--
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
     <link href="../assets/css/style_u.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
   </head>

   <body>

     <!-- ======= Header ======= -->
     <nav id="main_nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow mb-1 px-4">
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
                 <a class="nav-link btn-outline-primary rounded-pill px-3" href="home_u.php">Home</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link rounded-pill active px-3" href="case_tbl.php">Job Status</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link  btn-outline-primary rounded-pill px-3" href="case_ist.php">Request Job</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link  btn-outline-primary rounded-pill px-3" href="#">Borrow Equipment</a>
               <li class="nav-item">
                 <a class="nav-link  btn-outline-primary rounded-pill" href="contact.php">Contact</a>
               </li>
             </ul>
           </div>
           <div class="navbar align-self-center d-flex dropdown">

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

     <!-- ======= Sidebar ======= -->
     <main id="main" class="main">
       <?php
        $job_id = $_GET['print_case'];
        $printjobs = new DB_CON();
        $sql = $printjobs->record_jobs($job_id);
        $row = mysqli_fetch_assoc($sql); { ?>
         <div class="container py-4">
           <section class="section dashboard">
             <form action="" method="POST" class="form-job">
               <div class="row g-0">
                 <!-- company name -->
                 <div class="col-xl-8 ">
                   <div class="row">
                     <div class="card " id="print-pdf">
                       <div class="card-body p-4">
                         <section class="top-content  d-flex   align-items-center justify-content-center py-2">
                           <div class="logo col-2 align-items-center mb-2 d-flex">
                             <img src="../assets/img/Riso-logo.jpg">
                           </div>
                           <div class="col-10 align-items-center text-end">
                             <h5 class="fw-bold">Computer Service Request Form</h5>
                             <h6 class="fw-semibold">Req. No:<?php echo $row['job_id']; ?></h6>

                           </div>
                         </section>
                         <hr>
                         <div class=" border-black">
                           <section class="case-area mt-0">
                             <div class="row mb-2  ">
                               <tr class="col-12 tab-cr">
                                 <span class=" align-items-center">
                                   <h6 class="fw-bold"><i>Requester</i></h6>
                                 </span>
                               </tr>
                             </div>

                             <div class="row align-items-start justify-content-between text-start mb-2">
                               <div class="col-4 pd-0">
                                 <b class="fw-semibold">Name:</b>&nbsp<?php echo $row['user_name']; ?>
                               </div>

                               <div class="col-4">
                                 <b class="fw-semibold">Section:</b>&nbsp<?php echo $row['user_sec']; ?>
                               </div>
                             </div>
                             <div class="row justify-content-between text-start mb-2  text-start mb-2">

                               <div class="col-4 ">
                                 <b class="fw-semibold">Computer name:</b>&nbsp<?php echo $row['item_name']; ?>
                               </div>
                               <div class="col-4 ">

                               </div>
                               <div class="col-4">
                                 <b class="fw-semibold">Asset No.:</b>&nbsp<?php echo $row['item_ass']; ?>
                               </div>

                             </div>
                             <div class="row mb-2">
                               <div class="col-12">
                                 <b class="fw-semibold">Problem Details:</b>&nbsp<?php echo $row['job_detail']; ?>
                               </div>
                             </div>
                           </section>
                           <hr>


                           <section class="case-area mt-0">
                             <div class="row mb-2">
                               <div class="col-12">
                                 <span>
                                   <b class="fw-bold"><i>IT Supporter</i></b>
                                 </span>
                               </div>
                             </div>
                             <div class="row align-items-center justify-content-between text-start mb-2">
                               <div class="col-8 pe-2">
                                 <span class="fw-semibold">Received By: </span><?php echo $row['job_charger']; ?>
                               </div>
                               <div class="col-4 pe-2">
                                 <b class="fw-semibold">Section:</b> IT
                               </div>
                             </div>
                             <form action="" method="POST" class="source-item pt-0 px-0 px-sm-3">
                               <div class="mb-2" data-repeater-list="group-a">
                                 <div class="repeater-wrapper pt-0 pt-md-2" data-repeater-item="">
                                   <div class="d-flex rounded position-relative pe-0">
                                     <div class="col-md-12 col-12 mb-md-0 mb-3">
                                       <div class="mb-2 repeater-title">
                                         <span class="fw-semibold">Checked result:</span>
                                       </div>
                                       <div class="col-11 mb-2"><?php echo $row['chk_re']; ?></div>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               <div class="row">
                                 <div class="col-md- mb-md-0 mt">
                                   <div class="repeater-wrapper d-flex align-items-center mb-2">
                                     <div class="col-md-12 col-12 mb-md-0 mb-2 justify-content-between">
                                       <span class="fw-semibold">Resolution:</span>
                                       <div class="row g-3 d-flex align-items-center mb-2">
                                         <div class="col-lg-8 mb-0">
                                           <span class="fw-semibold">Request to External Provider Repair:&nbsp;</span><?php echo $row['re_de1']; ?>
                                         </div>
                                         <div class="col-lg-4 mt-0">
                                           <span class="fw-semibold">On: </span><?php echo $row['re_date1']; ?>
                                         </div>
                                       </div>
                                       <div class="row g-3 align-items-center mb-2">
                                         <div class="col-lg-8 mb-0">
                                           <span class="fw-semibold">Request to replace parts:&nbsp;</span><?php echo $row['re_de2']; ?>
                                         </div>
                                         <div class="col-lg-4 mt-0">
                                           <span class="fw-semibold">On: </span><?php echo $row['re_date2']; ?>
                                         </div>
                                       </div>

                                     </div>
                                   </div>
                                 </div>
                               </div>

                           </section>
                           <hr>
                           <section class="case-area mt-4">
                             <div class="row g-3 mb-2">
                               <div class="col-12 ">
                                 <span>
                                   <b class="fw-bold"><i>Work Complete Report</i></b>
                                 </span>
                               </div>
                             </div>
                             <tr class="d-flex rounded position-relative pe-0">
                               <div class="row g-3 align-items-center mb-2">
                                 <div class="col-lg-8">
                                   <span class="fw-semibold">Work Status:</span>&nbsp<?php echo $row['job_status']; ?>
                                 </div>
                                 <div class="col-lg-4">
                                   <span class="fw-semibold">On:</span><?php echo $row['re_date3']; ?>
                                 </div>

                               </div>
                             </tr>
                             <div class="mb-2" data-repeater-list="group-a">
                               <div class="repeater-wrapper pt-2 pt-md-2" data-repeater-item="" ">
                              <div class=" d-flex rounded position-relative pe-0">
                                 <div class="col-md-12 col-12 mb-md-0 mb-2">
                                   <div>
                                     <span class="fw-semibold">Solution Details:&nbsp;</span>
                                     <span><?php echo $row['re_com']; ?></span>
                                   </div>
                                 </div>
                               </div>
                             </div>
                         </div>
           </section>

         </div>
         </div>

         </div>
         </div>

         </div>
         </div>

         </form>
         <div class="row">
           <div class="col-xl-8">
             <div class="row">
               <div class="card pd-2">
                 <div class="card-body p-d row align-items-center justify-content-center d-flex  ">
                   <div class="col-md-4"><button type="submit" class="btn btn-primary  d-flex w-100 justify-content-center" id="btn-generate" onclick="window.print()" value="Print">Print</button></div>
                   <div class="col-4"></div>
                   <div class="col-md-4"><a href="case_tbl.php" hidden="" class="btn btn-secondary d-flex justify-content-center" name="Send Report">Back</a></div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       <?php } ?>
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
         }, 300);

       }

       pdf_btn.onclick = () => {
         toPDF(customers_table);

       }
     </script>



   </body>


   </html>