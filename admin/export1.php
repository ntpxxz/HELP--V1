<?php

 use \PhpOffice\PhpSpreadsheet\Spreadsheet;
 use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export'])) {



    require_once '../vendor/autoload.php';

    // // Define the columns you want to select from the database table
    // // Create a new Spreadsheet object


    $spreadsheet = new Spreadsheet();
     $sheet = $spreadsheet->getActiveSheet();
  $sheet->setTitle('Thai Data');
  $sheet->setCellValue('A1', 'Borrow ID');
  $sheet->setCellValue('B1', 'Borrow Date');
  $sheet->setCellValue('C1', 'Return Plan Date');
  $sheet->setCellValue('D1', 'BUsername BR');
  $sheet->setCellValue('E1', 'Last Name BR');
  $sheet->setCellValue('F1', 'Section');
  $sheet->setCellValue('G1', 'Email');
  $sheet->setCellValue('H1', 'Device Name');
  $sheet->setCellValue('I1', 'Use Area');
  $sheet->setCellValue('J1', 'Remark');
  $sheet->setCellValue('K1', 'Borrow Status');
  $sheet->setCellValue('L1', 'Approve  By');
  $sheet->setCellValue('M1', 'Approve Date');
  $sheet->setCellValue('N1', 'Actual Return Date');
  $sheet->setCellValue('O1', 'Username Returner ');
  $sheet->setCellValue('P1', 'Lastname Returner');
  $sheet->setCellValue('Q1', 'section Returner');
  $sheet->setCellValue('R1', 'Email');
  $sheet->setCellValue('S1', 'Return Date');
  $sheet->setCellValue('T1', 'Status Return');
  $sheet->setCellValue('U1', 'Approve by');

    // // Fetch data from the database table
    // // Replace "your_table_name" with the actual name of your database table
    $fetchdata = new DB_CON();
    $sql = $fetchdata->fetchdata_br();

   $data = array();

  // // Fetch the data into an array
  while ($row = mysqli_fetch_assoc($sql)) {
   $data[] = $row;
   }



  // // Set the column headers in the Excel sheet
  $columnIndex = 1;
  $header = array(`br_id`, `br_d`, `rtp_d`, `user_name`, `user_lastname`, `user_sec`, `user_mail`, `dv_name`, `ar_u`, `rm_b`, `sts_b`, `app_b`, `app_bd`, `act_d`, `name_r`, `lname_r`, `usec_r`, `mail_r`, `rt_d`, `sts_r`, `app_r`, `app_rd`);
  foreach ($selectedColumns as $header) {
   $sheet->setCellValue($columnIndex, 1, $header);
   $columnIndex++;
 }

  // // Fill the data into the Excel sheet
  $rowIndex = 2;
  foreach ($data as $row) {
     $columnIndex = 1;
     foreach ($row as $cellData) {
       $sheet->setCellValue($columnIndex, $rowIndex, $cellData);
       $columnIndex++;
     }
     $rowIndex++;
   }

  // // Set the headers for the Excel file
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=csv_export.xlax');
   header('Cache-Control: max-age=0');

   // Create an Excel writer and save the file to the output
   $writer = new Xlsx($spreadsheet);
   $writer->save('php://output');
}




?>