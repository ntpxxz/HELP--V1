<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';


$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "none";
$mail->Host = "mail.rith.riso.biz"; // ถ้าใช้ smtp ของ server เป็นอยู่ในรูปแบบนี้ mail.domainyour.com
$mail->Port = 25;
$mail->isHTML();
$mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
$mail->Username   = 'nattapon@rith.riso.biz';               //SMTP username
$mail->Password   = 'nA_11121112';                           //SMTP password
$mail->setFrom('nattapon@rith.riso.biz', 'Sam');
$mail->FromName = "Sender Person"; //ชื่อที่ใช้ในการส่ง

$mail->Subject = "ทดสอบการส่งอีเมล์";  //หัวเรื่อง emal ที่ส่ง
$mail->Body = "ทดสอบส่งเมลล์ในส่วนของรายละเอียดเนื้อหา</b>"; //รายละเอียดที่ส่ง
$mail->addAddress('nattapon.mnz8898@gmail.com', 'Fern');     //Add a recipient



//ตรวจสอบว่าส่งผ่านหรือไม่
if ($mail->Send()) {
    echo "ข้อความของคุณได้ส่งพร้อมไฟล์แนบแล้ว!!";
} else {
    echo "การส่งไม่สำเร็จ : {$mail->ErrorInfo}";
}
