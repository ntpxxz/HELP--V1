<?php
require('config/dbconnect.php');
$sql = "SELECT*FROM rith_jobcase";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jobs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <link rel="stylesheet" href="tableform.css">
</head>

<body>



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Job Status/all</h5>

      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr class="tablejob-head">
            <th class="column1">No</th>
            <th class="column2">Case ID</th>
            <th class="column3">Name</th>
            <th class="column4">Section</th>
            <th class="column5">Equip name</th>
            <th class="column6">Detail</th>
            <th class="column7">Management</th>
            <th class="column8">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td class="column1"></td>
              <td class="column2">
                <?php echo $row['job_id']; ?>
              </td>
              <td class="column3">
                <?php echo $row['job_user']; ?>
              </td>
              <td class="column4">
                <?php echo $row['job_sec']; ?>
              </td>
              <td class="column5">
                <?php echo $row['job_itemname']; ?>
              </td>
              <td class="column6">
                <?php echo $row['job_detail']; ?>
              </td>
              <td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
              <td class="column8"><span class="badge bg-success">Success</span></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>
  <script src="assets/js/main.js"></script>
  <script src="table-count.js"></script>
</body>

</html>