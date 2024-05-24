 <?php
    require('config/dbconnect.php');
    $sql = "SELECT * FROM rith_jobcase";
    $result = mysqli_query($connect, $sql);
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="assets/img/favicon.png" rel="icon">
     <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

     <!-- Google Fonts -->
     <link href="https://fonts.gstatic.com" rel="preconnect">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
     <!-- Template Main CSS File -->
     <link href="assets/css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/popup.css">

     <title>Jobs_status_Popup</title>

 </head>

 <body>
     <div class="center">
         <button id="show-jobs">SHOW</div>
     <!-- modalBox for detailjobs -->
     <?php
        require('config/function.php');
        $fetchdata = new DB_CON();
        $sql = $fetchdata->fetchdata_jobs();
        while ($row = mysqli_fetch_assoc($result)){

        
        ?>
        <?php   }
        ?>
     <div class="modalBox" id="popupBox">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title">JOBS ID:
                         <?php echo $row['job_id']; ?>
                     </h5>
                     <button id="close" class="close"><i class="bi bi-x-lg"></i></button>
                 </div>
                 <div class="modal-body">
                     <div class="container-fluid">
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Date :</b>
                                     <?php echo $row['job_date']; ?>
                                 </h6><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Name :</b>
                                     <?php echo $row['user_name']; ?>
                                 </h6><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Employee ID :</b>
                                     <?php echo $row['user_id']; ?>
                                 </h6><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Section : </b>
                                     <?php echo $row['user_sec']; ?>
                                 </h6><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Name :</b>
                                     <?php echo $row['item_name']; ?>
                                 </h6><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Detail : </b>
                                     <?php echo $row['job_detail']; ?>
                                 </h6><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12 .ms-auto">
                                 <h6><b>Charger : </b>
                                     <?php echo $row['job_charger']; ?>
                                 </h6><br>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="bt-success">Success</button>
                         <button type="button" class="bt-warning">Edit</button>
                         <button type="button" class="bt-danger">Cancel</button>
                     </div>
                 </div>
             </div>

         </div>
         <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
         </script>
         <script src="js/popup.js"></script>
 </body>

 </html>