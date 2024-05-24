<html>

<head>
	<title>ThaiCreate.Com Tutorial</title>
</head>

<body>
	<?php
	//connect database
	$condb = new mysqli("localhost", "root", "123456", "rith-ithelp") or die("connect error");


	//ประกาศตัวแปรปี แปลง คศ. เป็น พ.ศ.
	$y = date('Y');
	$m = date('m');

	echo $y . $m;
	echo '<hr>';


	//query last bill no
	$query = "SELECT MAX(bill_no) as lastbill FROM tbl_bill1 WHERE bill_no LIKE '%$y%' ";
	$resultlastbill = mysqli_query($condb, $query);
	$row = mysqli_fetch_array($resultlastbill);

	echo $query;
	echo '<hr>';


	$lastbill = $row['lastbill'];
	if ($lastbill == '') {
		$lastbill = $y . date('m') . '001';
	} else {
		$lastbill = ($lastbill + 1);
	}

	echo '<hr>';
	echo $lastbill;
	echo '<hr>';

	//insert new bill
	$sqlinsert = "INSERT INTO tbl_bill1 (bill_no) VALUES ($lastbill) ";
	$resultinsert = mysqli_query($condb, $sqlinsert);

	echo $sqlinsert;
	echo '<hr>';
	//query
	$querydata = "SELECT * FROM tbl_bill1 ORDER BY bill_no DESC";
	$rs = mysqli_query($condb, $querydata);

	//view data from table
	foreach ($rs as $v) {
		echo 'No. ' . $v['bill_no'] . ' date ' . $v['bill_date'];
		echo '<hr>';
	}
	//devbanban.com
	?>




	//AutoID//
	<?php

	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "rith-ithelp";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	?>

	<?php


	$query2 = "SELECT * FROM rith_jobcase  ORDER BY job_id DESC limit 1";
	$result2 = mysqli_query($conn, $query2);
	$row = mysqli_fetch_array($result2);
	
	$lastID = $row['job_id'];
	if ($lastID == "") {
		$lastID = "CS-" . date('ym') . "001";
	} else {
		$lastID = substr($lastID, 3);
		$lastID = intval($lastID);
		$lastID = "CS-" . ($lastID + 1);
	}
	?>


	<?php
	$conn = new mysqli("localhost", "root", "123456", "rith-ithelp") or die("connect error");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$lastID = $_POST['job_id'];
		$job_date = $_POST['job_date'];
		$user_name = $_POST['user_name'];
		$user_lastname = $_POST['user_lastname'];
		$user_sec = $_POST['user_sec'];
		$user_tel = $_POST['user_tel'];
		$item_name = $_POST['item_name'];
		$item_ass = $_POST['item_ass'];
		$job_cat = $_POST['job_cat'];
		$job_detail = $_POST['job_detail'];
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "INSERT INTO rith_jobcase(job_id,job_date, user_name,user_lastname, user_sec,user_tel, item_name,item_ass,job_cat,job_detail)
        
                    VALUES ('$lastID','$job_date', '$user_name', '$user_lastname', '$user_sec', '$user_tel', '$item_name', '$item_ass', '$job_cat', '$job_detail' )";

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Update Successful');</script>";
			echo "<script>window.location.href='case_ist.php'</script>";
		} else
			echo "<script>alert('Something went wrong !');</script>";
		echo "<script>window.location.href='tbl_user.php'</script>";
		mysqli_close($conn);
	}

	?>



	<?php
	session_start();
	$_SESSION['name'];
	$_SESSION['profile'];

	?>