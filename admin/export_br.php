<?php
//อ้างอิงไปยัง database

include_once('../config/function.php');

// เลือกตารางที่ต้องการ Export
$fetchdata = new DB_CON();
$sql = $fetchdata->fetchdata_br();
$date = date("Ymd");
$numrand = (mt_rand());
$fileName = "BR" . $date.$numrand.".csv";
$header = array('br_id', 'br_d', 'rtp_d', 'user_name', 'user_lastname', 'user_sec', 'user_mail', 'dv_name', 'ar_u', 'rm_b', 'sts_b', 'app_b', 'app_bd', 'act_d', 'name_r', 'lname_r', 'usec_r', 'mail_r', 'rt_d', 'sts_r', 'app_r', 'app_rd');

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
