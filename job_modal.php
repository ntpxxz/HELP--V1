<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button> <?php
                require('config/dbconnect.php');
                $sql = "SELECT * FROM rith_jobcase";
                $result = mysqli_query($connect, $sql); {
                ?>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <?php ($row = mysqli_fetch_array($result)); ?>

                        <h5 class="modal-title fs-5">JOBS ID:
                            <?php echo $row['job_id']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row g-3">
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
                                        <h6><b>Area :</b>
                                            <?php echo $row['item_area']; ?>
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
                                <div class="col-4"><a href="#" class="btn btn-light w-100 d-flex justify-content-center"><i class="bi bi-printer"></i>Print</a></div>
                                <div class="col-4"><a href="" class="btn btn-secondary w-100 d-flex justify-content-center" name="cancel" data-bs-dismiss= "modal">Cancel</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL USER INSERT-->
</body>

</html>
<!-- Modal -->