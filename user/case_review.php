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
     <link href="../assets/css/style_u.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
   </head>

   <body>
     <!-- ======= Header ======= -->
     <header id="header" class="header fixed-top d-flex align-items-center">
       <nav class="navbar navbar-expand-lg" style="background-color: #ffffff;">
         <div class="container-fluid">
           <a class="navbar-brand" href="#"><img src="../assets/img/Riso-logo.jpg" alt="" width="100px" height="30px"></a>
           <div class="collapse navbar-collapse" id="navbarScroll">
             <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
               <li class="nav-item">
                 <a class="nav-link " aria-current="page" href="home_u.php">Home</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="case_tbl.php">Job Status</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link  " href="case_ist.php">Request Job </a>
               </li>

               <li class="nav-item">
                 <a class="nav-link" href="contact.php">Contact</a>
               </li>
             </ul>

           </div>
         </div>
       </nav>
       <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">
           <li class="nav-item dropdown pe-3">
             <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

               <img src="../upload/user_img/<?php echo $_SESSION['profile']; ?>" alt="" class="rounded-circle avatar-md-2 img-thumbnail">
               <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?>&nbsp<?php echo $_SESSION['lname']; ?></span>
             </a><!-- End Profile Iamge Icon -->

             <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
               <li class="dropdown-header">
                 <h6> <?php echo $_SESSION['name']; ?> </h6>
                 <span>IT Staff</span>
               </li>
               <li>
                 <hr class="dropdown-divider">
               </li>

               <li>
                 <a class="dropdown-item d-flex align-items-center" href="profile.phpprofile.php">
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
     <main id="main" class="main">
       <?php
        $job_id = $_GET['print_case'];
        $printjobs = new DB_CON();
        $sql = $printjobs->record_jobs($job_id);
        $row = mysqli_fetch_assoc($sql); { ?>
         <div class="container">
           <section class="section dashboard">
             <div class="row">
               <!-- company name -->
               <div class="col-8">
                 <div class="row">
                   <div class="card recent-sales overflow-auto" id="print-pdf">
                     <div class="card-body p-4">
                       <section class="top-content d-flex align-items-center justify-content-center py-2">

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
                               <b class="fw-semibold">Equipment Type:</b>&nbsp<?php echo $row['item_name']; ?>
                             </div>
                             <div class="col-4 ">
                               <b class="fw-semibold">Computer name:</b>&nbsp<?php echo $row['item_name']; ?>
                             </div>
                             <div class="col-4">
                               <b class="fw-semibold">Asset No.:</b>&nbsp<?php echo $row['item_name']; ?>
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
                           <div class="row align-items-center justify-content-center text-start mb-2">
                             <div class="col-6 pe-2">
                               <span class="fw-semibold">Received By: </span><?php echo $_SESSION['name']; ?>
                             </div>
                             <div class="col-6">
                               <b class="fw-semibold">Section:</b> <?php echo $row['user_sec']; ?>
                             </div>
                           </div>
                           <form action="" method="POST" class="source-item pt-0 px-0 ">
                             <div class="mb-2" data-repeater-list="group-a">
                               <div class="repeater-wrapper pt-0 pt-md-2" data-repeater-item="">
                                 <div class="d-flex rounded position-relative pe-0">
                                   <div class="col-md-12 col-12 mbmd-0 mb-3">
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
                         <section class="case-area mt-3">
                           <div class="row mb-2">
                             <div class="col-12 ">
                               <span>
                                 <b class="fw-bold"><i>Work Complete Report</i></b>
                               </span>
                             </div>
                           </div>
                           <tr class="d-flex rounded position-relative pe-2">
                             <div class="row repeater-wrapper d-flex align-items-center  justify-content-start">
                               <div class="col-lg-4 col-md-4">
                                 <div>
                                   <span class="fw-semibold">Work Status:</span>&nbsp<?php echo $row['job_status']; ?>

                                 </div>
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


         <div class="row g-0">
           <div class="col-8">
             <div class="card pd-2">
               <div class="card-body row align-items-center justify-content-center text-start ">
                 <div class="col-md-6"><button type="submit" class="btn btn-primary d-flex w-100 justify-content-center" id="btn-generate" onclick="window.print()" value=" Print">Print</button></div>
                 <div class="col-md-6"><a href="case_tbl.php" class="btn btn-secondary d-flex w-100 justify-content-center" name="cancel">cancel</a></div>
               </div>
             </div>
           </div>
         </div><?php } ?>
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
      <link href="assets/css/style.css" rel="stylesheet">
      <main class="main" >${customers_table.innerHTML}</main>
           
              
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