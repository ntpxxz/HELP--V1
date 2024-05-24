 <?php
    require('config/dbconnect.php');
    $sql = "SELECT * FROM rith_jobcase";
    $result = mysqli_query($connect, $sql); {
    ?>
     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link rel="stylesheet" href="popup.css">
         <title>Document</title>
     </head>

     <body>
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
             Launch static backdrop modal
         </button>

         <!-- Modal -->
         <div class="modal-fade" id="#staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header  bg-#51678f">
                         <?php ($row = mysqli_fetch_array($result)); ?>
                         
                         <h5 class="modal-title">JOBS ID:
                             <?php echo $row['job_id']; ?>
                         </h5> <button id="close" class="close" value="close-btn" id="staticBackdropLabel"><i class="bi bi-x"></i></button>
                     </div>
                     <div class="modal-body c-black">
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
                                     <h6><b>Detail :</b>
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
                             </div> <?php } ?>
                         </div>
                         <hr>

                         <div class="row align-items-center justify-content-center">
                             <div class="col-4"><a href=update_jobs.php?edit_job=<?php echo $row['job_id']; ?> class="btn btn-primary w-100 d-flex justify-content-center" name="update">Edit</a>
                             </div>
                             <div class="col-4"><a href=deleteuser.php?del_user=<?php echo $row['item_name']; ?> class=" btn btn-info w-100 d-flex justify-content-center" < onclick="return checkDelete()"><i class="bi bi-printer"></i>Print</a></div>
                             <div class="col-4"><a href="tbl_user.php" class="btn btn-secondary w-100 d-flex justify-content-center" name="cancel">cancel</a></div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     </body>

     </html>