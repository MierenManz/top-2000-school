<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../static/PHPMailer/Exception.php';
require '../static/PHPMailer/PHPMailer.php';
require '../static/PHPMailer/SMTP.php';
require '..'
class EmailManager
{
  public static function sendGameMail($id, $html)
  {
    $mail = new PHPMailer(true);

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $config["Host"];                   //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $config["Username"];                       //SMTP username
      $mail->Password   = $config["Password"];                                 //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = $config["Port"];                                       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('student@ictcampus.nl', 'Ratjetoe');
      $mail->addAddress($values->email);     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = "Overzicht games";
      $mail->Body    = $html;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}
