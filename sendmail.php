<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
session_start();
if (!$_SESSION['role'] == "user") {
    header("location:../index.php");
    exit();
}

    $job_id = $_POST['job_id'];
    $job_date = $_POST['job_date'];
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_sec = $_POST['user_sec'];
    $user_mail= $_POST['user_mail'];
    $item_name = $_POST['item_name'];
    $item_ass = $_POST['item_ass'];
    $job_cat = $_POST['job_cat'];
    $job_detail = $_POST['job_detail'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;              //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.rith.riso.biz';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    //Enable SMTP authentication
    $mail->Username   = 'nattapon@rith.riso.biz';               //SMTP username
    $mail->Password   = 'nA_11121112';    
    $mail->SMTPSecure = "none";            //Enable implicit TLS encryption
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nattapon@rith.riso.biz', 'RITH - IT Support');
    $mail->addAddress('nattapon.mnz8898@gmail.com', 'sam');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'RITH-Request'; //
    $mail->Body    = "<b>Request No:</b> {$job_id}<p>
                      <b>Request Date:</b> {$job_date}<p>
                      <b>User Name:</b> {$_SESSION['name']}  {$_SESSION['lname']}<p>
                      <b>Section:</b> {$user_sec}<p>
                      <b>PC Name:</b> {$item_name}<p>
                      <b>Asset No:</b> {$item_ass}<p>
                      <b>job categories</b> {$job_cat}<p>
                      <b>Description:</b> {$job_detail}<p>
                      ------------------------------------------------------------------------------------------------<p>
                      Sincerely,<p>
                      RITH IT Support
                      "
                    ;
    

    $mail->send();
 
} catch (Exception) {
  
}

