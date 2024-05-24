<?php
//อ้างอิงไปยัง database

include_once('../config/function.php');

// เลือกตารางที่ต้องการ Export
$fetchdata = new DB_CON();
$sql = $fetchdata->fetchdata_jobs();
$date = date("Ymd");
$numrand = (mt_rand());
$fileName = "CS" . $date.$numrand.".csv";
$header = array('job_id', 'job_date', 'user_name', 'user_lastname', 'user_sec', 'user_mail', 'item_name', 'item_ass', 'job_cat', 'job_detail', 'job_charger', 'job_img', 'chk_re', 're_de1', 're_date1', 're_de2', 're_date2', 'job_status', 're_date3', 're_com');

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
