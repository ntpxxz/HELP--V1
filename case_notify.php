
<?php
if(isset($_POST['insert'])){
    $user = $_POST['user_name'] .$_POST['user_lastname'];
    $pcname =   $_POST['item_name'];
    $issue = $_POST['job_detail'];
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");

$sToken = "US31TjtR5Qkj7b8uX2HfbEwy0EjpgN4nlA7fhvgW2UI ";
$sMessage = "RITH IT Request";
$sMessage = "User Request:" . $user . "\n"; 
$sMessage = "Equipment Name:" . $pcname."\n"; 
$sMessage = "Issue: " . $issue."\n";

$chOne = curl_init();
curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($chOne, CURLOPT_POST, 1);
curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($chOne);

//Result error 
if (curl_error($chOne)) {
    echo 'error:' . curl_error($chOne);
} else {
    $result_ = json_decode($result, true);
    echo "status : " . $result_['status'];
    echo "message : " . $result_['message'];
}
curl_close($chOne);
?>