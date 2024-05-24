<?php
include_once('config\function.php');
$update = new DB_CON();
if (isset($_POST['update'])) {

    $item_name = $_GET['item_name '];
    $item_reg = $_POST['item_reg'];
    $item_cat = $_POST['item_cat'];
    $item_type = $_POST['item_type'];
    $item_no = $_POST['item_no'];
    $item_charger = $_POST['item_charger '];
    $item_sec = $_POST['item_sec '];
    $item_area = $_POST['item_area '];
    $item_detail = $_POST['item_detail '];
    $item_sup = $_POST['item_sup'];

    $sql = $update->update_items($item_reg, $item_cat, $item_type, $item_id, $item_charger, $item_sec, $item_area, $item_detail, $item_sup, $item_name);
    if ($sql) {
        echo "<script>alert('Update Successful');</script>";
        echo "<script>window.location.href='equip_tbl.php'</script>";
    } else
        echo "<script>alert('Something went wrong !');</script>";
    echo "<script>window.location.href='equip_tbl.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,800i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <title>Update Data Equipment </title>
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure Delete?');
        }
    </script>
</head>

<body>
    <div class="container">


        <hr>
        <!--UPDATE ITEM PHP FUNCTION-->

        <?php
        $item_name = $_GET['edit_item'];
        $update = new DB_CON();
        $sql =  $update->record_item($item_name);
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <section class="section register d-flex flex-column align-items-center justify-content-center py-5">
                <div class="container">

                    <form action="" method="POST" class="form-job" id="edit_item">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body center ">

                                        <h4 class="card-title text-center">Update Data Equipment</h4>
                                        <hr>
                                        <!-- General Form Elements -->
                                        <div class="row">
                                            <div class="col-xxl-4">
                                                <label for="itemReg" class=" form-label">Register Date</label>
                                                <input type="date" class="form-control" id="item_reg" name="item_reg" value="<?php echo $row['item_reg']; ?>">
                                            </div>
                                            <div class="col-xxl-4 col-xl-4">
                                                <label for="item_cat" class="form-label">Catagories</label>
                                                <select id="item_cat" class="form-select" name="item_cat">
                                                    <option selected>Choose...</option>
                                                    <option value="Client" <?php
                                                                            if ($row['item_cat'] == "Client") {
                                                                                echo "selected=selected";
                                                                            } ?>>Client</option>
                                                    <option value="Jig" <?php
                                                                        if ($row['item_cat'] == "Jig") {
                                                                            echo "selected=selected";
                                                                        } ?>>Jig</option>
                                                    <option value="Network" <?php
                                                                            if ($row['item_cat'] == "Network") {
                                                                                echo "selected=selected";
                                                                            } ?>>Network</option>
                                                    <option value="Server" <?php
                                                                            if ($row['item_cat'] == "Server") {
                                                                                echo "selected=selected";
                                                                            } ?>>Server</option>
                                                </select>
                                            </div><br>
                                            <div class="col-xxl-4 col-xl-4">
                                                <label for="item_type" class="form-label">Type</label>
                                                <select id="item_type" class="form-select" name="item_type">
                                                    <option selected>Choose...</option>
                                                    <option value="AD Server" <?php
                                                                                if ($row['item_type'] == "AD Server") {
                                                                                    echo "selected=selected";
                                                                                } ?>>AD Server</option>
                                                    <option value="AC Server" <?php
                                                                                if ($row['item_type'] == "AC Server") {
                                                                                    echo "selected=selected";
                                                                                } ?>>AC Server</option>
                                                    <option value="AP Controller" <?php
                                                                                    if ($row['item_type'] == "AP Controller") {
                                                                                        echo "selected=selected";
                                                                                    } ?>>AP Controller</option>
                                                    <option value="AP Wifi" <?php
                                                                            if ($row['item_type'] == "AP Wifi") {
                                                                                echo "selected=selected";
                                                                            } ?>>AP Wifi</option>
                                                    <option value="Backup Server" <?php
                                                                                    if ($row['item_type'] == "Backup Server") {
                                                                                        echo "selected=selected";
                                                                                    } ?>>Backup Server</option>
                                                    <option value="Desktop" <?php
                                                                            if ($row['item_type'] == "Desktop") {
                                                                                echo "selected=selected";
                                                                            } ?>>Desktop</option>
                                                    <option value="File Server" <?php
                                                                                if ($row['item_type'] == "File Server") {
                                                                                    echo "selected=selected";
                                                                                } ?>>File Server</option>
                                                    <option value="HUB" <?php
                                                                        if ($row['item_type'] == "HUB") {
                                                                            echo "selected=selected";
                                                                        } ?>>HUB</option>
                                                    <option value="Notebook" <?php
                                                                                if ($row['item_type'] == "Notebook") {
                                                                                    echo "selected=selected";
                                                                                } ?>>Notebook</option>
                                                    <option value="Tablet" <?php
                                                                            if ($row['item_type'] == "Tablet") {
                                                                                echo "selected=selected";
                                                                            } ?>>Tablet</option>
                                                    <option value="UPS" <?php
                                                                        if ($row['item_type'] == "UPS") {
                                                                            echo "selected=selected";
                                                                        } ?>>UPS</option>
                                                </select>
                                            </div><br>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-xxl-6">
                                                <label for="assNo" class="form-label">Asses No.</label>
                                                <input type="text" class="form-control" id="item_no" name="item_no" value="<?php echo $row['item_no']; ?>">
                                            </div>
                                            <div class="col-xxl-6">
                                                <label for="assName" class=" form-label">Equipment Name</label>
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="itemCharger" class="form-label">User/Charger</label>
                                                <input type="text" class="form-control" id="item_charger" name="item_charger" value="<?php echo $row['item_charger']; ?>">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-xxl-6">
                                                <label for="itemSec" class="form-label">Section</label>
                                                <select id="itemSec" class="form-select" id="item_sec" name="item_sec">
                                                    <option selected>Choose...</option>

                                                    <option value="IT" <?php
                                                                        if ($row['item_sec'] == "IT") {
                                                                            echo "selected=selected";
                                                                        } ?>>IT</option>
                                                    <option value="PE" <?php
                                                                        if ($row['item_sec'] == "PE") {
                                                                            echo "selected=selected";
                                                                        } ?>>PE</option>
                                                    <option value="PD" <?php
                                                                        if ($row['item_sec'] == "PD") {
                                                                            echo "selected=selected";
                                                                        } ?>>PD</option>
                                                    <option value="QE" <?php
                                                                        if ($row['item_sec'] == "QE") {
                                                                            echo "selected=selected";
                                                                        } ?>>QE</option>
                                                    <option value="QC" <?php
                                                                        if ($row['item_sec'] == "QC") {
                                                                            echo "selected=selected";
                                                                        } ?>>QC</option>
                                                    <option value="LOG" <?php
                                                                        if ($row['item_sec'] == "LOG") {
                                                                            echo "selected=selected";
                                                                        } ?>>LOG</option>
                                                    <option value="Other" <?php
                                                                            if ($row['item_sec'] == "Other") {
                                                                                echo "selected=selected";
                                                                            } ?>>Other</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-6">
                                                <label for=" item_area" class="form-label">Item area</label>
                                                <input type="text" class="form-control" id="item_area" name="item_area" value="<?php echo $row['item_area']; ?>">
                                            </div>
                                        </div><br>
                                        <div class="col-lg-12 col-12">
                                            <label for="itemDetail class=" form-label">Detail/Specification</label>
                                            <textarea class="form-control" name="item_detail" id="item_detail" rows="3"><?php echo $row['item_detail']; ?></textarea>

                                        </div><br>
                                        <div class="row">
                                            <div class="col-xxl-12">
                                                <label for="itemsup" class="form-label">Supplier</label>
                                                <select id="itemsup" class="form-select" name="item_sup">
                                                    <option selected>Choose...</option>
                                                    <option value="FDI" <?php
                                                                        if ($row['item_sup'] == "FDI") {
                                                                            echo "selected=selected";
                                                                        } ?>>FDI</option>
                                                    <option value="CSL / BTMU-3" <?php
                                                                                    if ($row['item_sup'] == "CSL / BTMU-3") {
                                                                                        echo "selected=selected";
                                                                                    } ?>>CSL /BTMU-3</option>
                                                    <option value="JPN" <?php
                                                                        if ($row['item_sup'] == "JPN") {
                                                                            echo "selected=selected";
                                                                        } ?>>JPN</option>
                                                    <option value="MAT" <?php
                                                                        if ($row['item_sup'] == "MAT") {
                                                                            echo "selected=selected";
                                                                        } ?>>MAT</option>
                                                    <option value="NTT" <?php
                                                                        if ($row['item_sup'] == "NTT") {
                                                                            echo "selected=selected";
                                                                        } ?>>NTT</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div><hr><br>
                                        
                                                <div class="row mb align-items-center justify-content-center ">
                                                    <div class="col-4"><button type="submit" class="btn btn-primary w-100" name="update">Update</button></div>
                                                    <div class="col-4"><a href=equip_del.php?del_user=<?php echo $row['item_name']; ?>" class="btn btn-danger w-100" onclick="return checkDelete()"><i class=" bi bi-trash"></i></a>
                                                    </div>
                                                    <div class="col-4"> <a href="equip_tbl.php" class="btn btn-secondary w-100 " name="cancel">cancel</a></div>
                                                </div><br>
                                            
                                        
                                    </div><?php } ?>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>

            </section>
            <!--END UPDATE USER PHP FUNCTION-->

    </div>


</html>