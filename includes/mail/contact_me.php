<?php
// Check for empty fields
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../includes/phpmailer/Exception.php';
require '../../includes/phpmailer/PHPMailer.php';
require '../../includes/phpmailer/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

/*
$secretKey = "6LeFwMcaAAAAAP75XNDdj0mcp6hG8SvqEuTsyLhQ";
$responseKey = $_POST['g-recaptcha-response'];
$UserIP = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify?
secret=$secretKey&response=$responseKey&remoteip=$UserIP";

$response = file_get_contents($url);
$response = json_decode($response);

if($response->success){



}else{

}*/


if ($_POST['name'] != null && $_POST['email'] != null && $_POST['phone'] && $_POST['message'] != null) {
  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'box.luke-else.co.uk';                  //Set the SMTP server to send through
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('enquiries@snexo.co.uk');
      $mail->addAddress('enquiries@snexo.co.uk');     //Add a recipient


      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Website Contact Form: ' . $_POST['email'];
      $mail->Body    = 
      '<br /><b> Name: </b>' . $_POST['name'] . 
      '<br /> <b>E-Mail: </b>' . $_POST['email'] . 
      '<br /> <b>Phone Number: </b>' . $_POST['phone'] . 
      '<br /><br /> <b>Message: </b><br />' . $_POST['message'];

      $mail->send();
      
  } catch (Exception $e) {
    http_response_code(500);
  }
}else{
  http_response_code(500);
}




?>
