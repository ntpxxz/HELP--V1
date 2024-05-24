
<?php
// Include the database configuration file
$conn = mysqli_connect("localhost", "root", "123456", "rith-ithelp") or die("connect error");

$statusMsg = '';

date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");
$numrand = (mt_rand());
$type = strrchr($_FILES['upload']['name'], ".");

// File upload path
$path_img = "job_img/";
$fileName =$numrand . $date . $type; 
$targetFilePath = $path_img . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST['save']) && !empty($_FILES['upload']['name'])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath)){
			// Insert image file name into database
			$sql = "INSERT INTO testpic(job_img) 
			VALUES('$fileName')";

			$result = mysqli_query($conn, $sql) or die("Error in query: $sql die(mysqli_error($conn))");	
            			
            if($result){
				
				echo "<script type='text/javascript'>";
				echo "alert('The file has been uploaded successfully.');";
				echo "window.location = 'index.php'; ";
				echo "</script>";
                
            }else{
				echo "<script type='text/javascript'>";
				echo "alert('File upload failed, please try again.');";
				echo "window.location = 'upload.html'; ";
				echo "</script>";
                
            } 
        }else{
			echo "<script type='text/javascript'>";
			echo "alert('Sorry, there was an error uploading your file.');";
			echo "window.location = 'upload.html'; ";
			echo "</script>";
            
        }
    }else{

		echo "<script type='text/javascript'>";
		echo "alert('Sorry, only JPG, JPEG, PNG,  files are allowed to upload');";
		echo "window.location = 'upload.html'; ";
		echo "</script>";
            
       
    }
}else{
	echo "<script type='text/javascript'>";
	echo "alert('Please select a file to upload.');";
	echo "window.location = 'upload.html'; ";
	echo "</script>";
            

}


// Display status message

?>











