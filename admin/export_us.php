<?php
//อ้างอิงไปยัง database

include_once('../config/function.php');

// เลือกตารางที่ต้องการ Export
$fetchdata = new DB_CON();
$sql = $fetchdata->fetchdata_users();
$date = date("Ymd");
$numrand = (mt_rand());
$fileName = "US" . $date.$numrand.".csv";
$header = array('user_id', 'user_name', 'user_lastname', 'user_pass', 'item_name', 'user_sec', 'user_reg',
 'user_address', 'user_mail', 'user_tel', 'user_type', 'user_img');

$case = array();
if (mysqli_num_rows($sql) > 0) {
while ($row = mysqli_fetch_assoc($sql)) {
$case[] = $row;
}
}
//คอลัมน์ที่ต้องการ เรียงลำดับตามตารางบน Database

//กำหนดชื่อไฟล์


header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename={$fileName}");
$output = fopen('php://output', 'w');
fputcsv($output,$header);

if (count($case) > 0) {
foreach ($case as $row) {
fputcsv($output, $row);
}
}
