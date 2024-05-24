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
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create an Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row g-3">
                    <div class="modal-body">
                        <form action="" method="POST" class="fuser">

                            <div class="col-lg-12">
                                <div class="card-body">
                                    <!-- General Form Elements -->
                                    
                                        <div class="col-md-12">
                                            <label for="inputEmID" class="form-label">Employee ID</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id">
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputname" class="form-label">FirstName</label>
                                                <input type="text" class="form-control" id="user_name" name="user_name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputlastname" class="form-label">LastName</label>
                                                <input type="text" class="form-control" id="user_lastname" name="user_lastname">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id=" user_pass" name="user_pass">
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-4 col-md-4">
                                                <label for="inputgender" class="form-label">Gender</label> <br>
                                                <input type="radio" name="gender" value="male" id="male">
                                                <label for="male">Male</label>

                                                <input type="radio" name="gender" value="female" id="female">
                                                <label for="female">Female</label>
                                            </div>

                                            <div class="col-lg-4 col-md-4">
                                                <label for="inputsection" class="form-label">Section</label>
                                                <select id="inputsection" class="form-select" id="user_sec" name="user_sec">
                                                    <option selected>Choose...</option>
                                                    <option value="IT">IT</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PD">PD</option>
                                                    <option value="QE">QE</option>
                                                    <option value="QC">QC</option>
                                                    <option value="LOG">LOG</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-auto">
                                                <label for="inputDate" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="user_reg" name="user_reg">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <label for="inputAddress" class="form-label">Address</label>
                                            <textarea class="form-control" name="user_address" id="user_address" rows="3"></textarea>

                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="inputEmail" class="form-label">Email</label>
                                                <input type="mail" class="form-control" id="user_mail" name="user_mail">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="inputTel" class="form-label">Tel</label>
                                                <input type="text" class="form-control" id="user_tel" name="user_tel">
                                            </div>
                                        </div><br>
                                         <button type="submit" class="btn btn-primary " name="update">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                                    </div>

                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary " name="update">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        
    <!--END MODAL USER INSERT--> 

</body>

</html>
<!-- Modal -->