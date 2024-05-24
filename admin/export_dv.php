<?php
//อ้างอิงไปยัง database

include_once('../config/function.php');

// เลือกตารางที่ต้องการ Export
$fetchdata = new DB_CON();
$sql = $fetchdata->fetchdata_items();
$date = date("Ymd");
$numrand = (mt_rand());
$fileName = "DV" . $date.$numrand.".csv";
$header = array('item_reg', 'item_cat', 'item_type', 'item_ass', 'item_name', 'item_charger', 'item_sec', 
'item_area', 'item_detail', 'item_sup', 'item_war', 'item_img');

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
