 <?php
    include_once('..\config\function.php');
    session_start();
    if (!$_SESSION['role'] == "admin") {
        header("location:../pages-login.php");
        exit();
    }
    $_SESSION['name'];
    $job_id = $_GET['print_case'];
    $printjobs = new DB_CON();
    $sql = $printjobs->record_jobs($job_id);
    $row = mysqli_fetch_assoc($sql); {
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
         <link href="../assets/css/style_u.css" rel="stylesheet">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

         <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


     <body>
         <button id="btn-generate" class="btn-generate" onclick="window.print()">Generate PDF</button>
         <div class="my-5 page" size="A4" id="cs_from">
             <div class="p-5 ">
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
                                         <span><b><i>Received By:</i></b><?php echo $row['job_charger']; ?></span>
                                     </td>
                                     <td class="col-4">
                                         <span><b><i>Section:</i></b></span>
                                     </td>
                                 </tr>
                             </thead>
                         </table>
                         <table>
                             <tbody>
                                 <tr>
                                     <div class="row">
                                         <td class="col-4"><b>&nbsp;&nbsp;Checked result:</b>
                                             &nbsp;&nbsp;&nbsp;................................................................................................................................................................................................
                                             &nbsp;&nbsp;&nbsp;................................................................................................................................................................................................
                                             &nbsp;&nbsp;&nbsp;................................................................................................................................................................................................
                                         </td>
                                     </div>
                                 </tr>
                                 <tr class="mt-2 d-flex justify-content-between">
                                     <td class="col-2"><b>&nbsp;&nbsp;Resolution:</b>&nbsp;<input type="checkbox"></td>

                                     <td class="col-10">&nbsp;Request to external Provider for repair ...................................................................................
                                     </td>

                                 </tr>
                                 <tr class="d-flex justify-content-between">
                                     <td class="col-2"></td>
                                     <td class="col-10">
                                         <div class="">&nbsp;Request Date: ....................................................................................................................................
                                     </td>
                                 </tr>
                                 <tr class="d-flex justify-content-between">

                                     <td class="col-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         &nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
                                     <td class="col-10">
                                         <div class="">&nbsp;Need to replace parts for repair (Please describe part details) .....................................
                                             &nbsp;.................................................................................................................................................................
                                             &nbsp;.................................................................................................................................................................
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
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


                         <table>
                             <tbody>
                                 <tr class="d-flex ">

                                     <td class="col-4">&nbsp;&nbsp;&nbsp;<input type="checkbox">&nbsp; Repair Completed
                                     </td>
                                     <td class="col-10"><input type="checkbox">&nbsp; Equipment can't be repaired (Please describe the reason)
                                     </td>
                                 </tr>
                                 <tr class="d-flex ">
                                     <td class="col-12">
                                         &nbsp;&nbsp;&nbsp;................................................................................................................................................................................................
                                         &nbsp;&nbsp;&nbsp;................................................................................................................................................................................................
                                         &nbsp;&nbsp;&nbsp;................................................................................................................................................................................................
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
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

     </body>
     <script>
         var buttonElement = document.querySelector("#btn-generate");
         buttonElement.addEventListener('click', function() {
             var pdfContent = document.querySelector('#pdf-content').innerHTML;
             var html_code = `
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
           <!-- Custom Style -->
           <link rel="stylesheet" href="print.css">
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
           <link href="../assets/css/style_u.css" rel="stylesheet">           
            <div>${customers_table.innerHTML}</div>
    `;
             var windowObject = window.open();
             new_window.document.write(html_code);

             var opt = {
                 margin: 1,
                 filename: 'pageContent_' + js.Autocode() + '.pdf',
                 image: {
                     type: 'jpeg',
                     quelity: 0.98
                 },
                 html12canvas: {
                     scale: 2
                 },
                 jsPDF: {
                     unit: 'in',
                     format: 'A4',
                     orientation: 'portrait'
                 }
             };
             pdf_btn.onclick = () => {
                 toPDF(customers_table);
             }

     
         });
     </script>

     </html> <?php } ?>