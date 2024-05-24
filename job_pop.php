<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="popup.css">
    <title>Document</title>
</head>

<body>
    <!-- Modal -->
    <div class="model">
        <div class="modal-fade" id="testpop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <?php ($row = mysqli_fetch_assoc($sql)); ?>
                        <h5 class="modal-title">JOBS ID:</h5>
                        <h4 id="job_id" name="job_id" value="<?php echo $row['job_id']; ?>"></h4>
                        </id=> <button id="close" class="close" value="closebtn"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        include_once('config\function.php');
                        $fetchdata = new DB_CON();
                        $sql = $fetchdata->fetchdata_jobs();{

                        ?>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Date :</b></h6>
                                    <h6 id="job_date" name="job_date" value="<?php echo $row['job_date']; ?>">
                                    </h6><br>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Name :</b></h6>
                                    <h6 id="user_name" name="user_name" value="<?php echo $row['user_name']; ?>">
                                        <h6 id="user_lastname" name="user_lastname" value="<?php echo $row['user_lastname']; ?>">
                                        </h6>
                                    </h6><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Section :</b></h6>
                                    <h6 id="user_sec" name="user_sec" value="<?php echo $row['user_sec']; ?>">
                                    </h6><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Equipment Name :</b></h6>
                                    <h6 id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>">
                                    </h6><br>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Area :</b></h6>
                                    <h6 id="item_area" name="item_area" value="<?php echo $row['item_area']; ?>">
                                    </h6><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Catagories :</b></h6>
                                    <h6 id="job_cat" name="job_cat" value="<?php echo $row['job_cat']; ?>">
                                    </h6><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Detail :</b></h6>
                                    <h6 id="job_detail" name="job_detail" value="<?php echo $row['job_detail']; ?>">
                                    </h6><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Charger : </b></h6>
                                    <h6 id="job_charger" name="job_charger" value="<?php echo $row['job_charger']; ?>">
                                    </h6><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 .ms-auto">
                                    <h6><b>Status :</b></h6>
                                    <h6 id="job_status" name="job_status" value="<?php echo $row['job_status']; ?>">
                                    </h6><br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <a href=delete_jobs.php?del_user=<?php echo $row['job_id']; ?>" class="btn btn-danger onclick=" return checkDelete()"><i class=" bi bi-trash"></i> Delete</a>
                            <a href=update_jobs.php?edit_job=<?php echo $row['job_id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>