   <?php
    include_once('..\config\function.php');
    session_start();
    if (!$_SESSION['role'] == "admin") {
        header("location:../pages-login.php");
        exit();
    }
    $_SESSION['name'];
    $insertdata = new DB_CON();
    if (isset($_POST['reply'])) {

        $chk_id = $_GET['print_case'];
        $chk_re = $_POST['chk_re'];
        $re_so = $_POST['re_so'];
        $re_date = $_POST['re_date'];
        $re_sts = $_POST['re_sts'];
        $re_com = $_POST['re_com'];

        $sql = $insertdata->reply_jobs($chk_re, $re_so, $re_date, $re_sts, $re_com, $chk_id);
        if ($sql) {
            echo "<script>alert('Record Successful');</script>";
            echo "<script>window.location.href='#'</script>";
        } else
            echo "<script>alert('Something went wrong !');</script>";
        echo "<script>window.location.href='#'</script>";
    }
    ?>


   <!doctype html>
   <html lang="en">

   <head>
       <title>CS-Form</title>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
       <!-- Custom Style -->
       <link rel="stylesheet" href="print.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
       <link href="../assets/css/style_u.css" rel="stylesheet">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

   </head>

   <body>

       <div class="btn btn-primary btn_print" id="btn-generate" onclick="window.print()" value=" Print">print</div>
       <button type="submit" class="btn btn-primary" name="reply">Add Result</button>
       <main class="page my-5" size="A4" id="pdf-content">
           <?php
            $job_id = $_GET['print_case'];
            $printjobs = new DB_CON();
            $sql = $printjobs->record_jobs($job_id);
            $row = mysqli_fetch_assoc($sql); { ?>
               <div class="p-5 ">
                   <div class="card-body">
                       <section class="top-content  d-flex justify-content-between ">

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
                               <div class="col-12 mt-4">
                                   <div class="row g-1 pb-2">
                                       <div class="col-6"></div>
                                       <div class="col-6">
                                           <table class="table table-hover d-flex text-center align-items-center justify-content-center">
                                               <tr>
                                                   <td class="top-stamp text-center border-black">
                                                       <h9>Section Manager</h9>
                                                   </td>
                                                   <td class="top-stamp text-center border-black">
                                                       <h9>Requester</h9>
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <td class="border-black ">
                                                       <div class="stamp">
                                                       </div>
                                                   </td>
                                                   <td class="border-black">
                                                       <div class="stamp ">
                                                       </div>
                                                   </td>
                                               </tr>
                                           </table>
                                       </div>
                                   </div>
                               </div>
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
                               <form class="source-item pt-0 px-0 px-sm-3">


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
                                                           <input type="checkbox"><label class="fw-semibold">&nbsp;&nbsp;Request to:</label>
                                                       </div>
                                                       <div class="col-lg-5">
                                                           <input type="text" class="form-control" id="re_so" name="re_so" placeholder="Please enter External provider" value="" name="re_ex">
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
                                                           <input type="checkbox"><label class="fw-semibold">&nbsp;&nbsp;Request to:</label>
                                                       </div>

                                                       <div class="col-lg-9">
                                                           <input type="text" class="form-control" id="re_so" placeholder="Please enter part details" value="" name="re_so">
                                                       </div>
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </form>
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

                                   <td class="col-4">&nbsp;&nbsp;&nbsp;<input type="checkbox" id="re_sts" name="re_sts"><label class=" fw-semibold">&nbsp; Repair Complete</label>
                                   </td>
                                   <td class="col-10"><input type="checkbox" id="re_sts" name="re_sts"><label class=" fw-semibold">&nbsp; Equipment can't be repaired (Please describe the reason)</label>
                                   </td>
                               </tr>
                               <form class="source-item pt-0 px-0 px-sm-3">
                                   <div class="mb-2" data-repeater-list="group-a">
                                       <div class="repeater-wrapper pt-0 pt-md-2" data-repeater-item="" ">
                                           <div class=" d-flex rounded position-relative pe-0">
                                           <div class="col-md-12 col-12 mb-md-0 mb-2">
                                               <textarea class="form-control" rows="2" placeholder="Please enter details" id="re_com" name="re_com"></textarea>
                                           </div>
                                       </div>
                                   </div>
                       </div>
                      
                       <div class="col-12 mt-4">
                           <div class="row g-1 pb-3">
                               <div class="col-1 m-1"></div>
                               <div class="col-10 m-1">
                                   <table class="table table-hover d-flex text-center justify-content-between ">
                                       <tr>
                                           <td class="top-stamp text-center border-black">
                                               <h9>Section Manager</h9>
                                           </td>
                                           <td class="top-stamp text-center border-black">
                                               <h9>Requester</h9>
                                           </td>
                                           <td class="top-stamp text-center border-black">
                                               <h9>IT Manager</h9>
                                           </td>
                                           <td class="top-stamp text-center border-black">
                                               <h9>IT Support</h9>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="border-black ">
                                               <div class="stamp">
                                               </div>
                                           </td>
                                           <td class="border-black">
                                               <div class="stamp ">
                                               </div>
                                           </td>
                                           <td class="border-black ">
                                               <div class="stamp">
                                               </div>
                                           </td>
                                           <td class="border-black">
                                               <div class="stamp ">
                                               </div>
                                           </td>
                                       </tr>
                                   </table>
                               </div>
                           </div>
                       </div>
                       </section>
                    </div>
               </div>
               </div>
       </main>
       <button type="submit" class="btn btn-primary" name="reply">Add Result</button>
   </body>
   <script>
       const pdf_btn = document.querySelector('#btn-generate');
       const customers_table = document.querySelector('#pdf-content');

       const toPDF = function(customers_table) {
           const html_code = `
          
        
           <link rel="stylesheet" href="print.css">
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
           <link href="../assets/css/style_u.css" rel="stylesheet">           
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

   </html>
   <?php } ?>