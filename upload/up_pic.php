<?php

$conn = mysqli_connect("localhost", "root", "123456", "rith-ithelp")or die("connect error");

$pic_upload = $_REQUEST['upload'];

 //--สุ่มวันที่่-ตัวเลข มาตั้งชื่อไฟล์--//
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");
$numrand = (mt_rand());
$pic_upload = $_FILES['upload'];
if ($pic_upload <> '') {

//--โฟลเดอร์ที่จะ upload file เ--//
$_img = "job_img/";

       
    //--เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล--//
    $type = strrchr($_FILES['upload']['name'], ".");

        //--ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม--//
        $newname = $numrand . $date . $type;
        $path_copy = $_img . $newname;
        $path_link = "job_img/" . $newname;
        move_uploaded_file($_FILES['upload']['tmp_name'],$path_copy);     	

    }
    $sql = "INSERT INTO testpic (job_img) 
		VALUES('$newname')";
		
		$result = mysqli_query($conn, $sql) or die ("Error in query: $sql die(mysqli_error($conn))");
	
	mysqli_close($conn);
	// javascript แสดงการ upload file
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Upload File Succesfuly');";
	echo "window.location = 'upload.html'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	echo "</script>";
}

?>

