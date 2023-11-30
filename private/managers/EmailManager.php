<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require '../../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../static/autoloader.php';
class EmailManager
{
  public static function sendTop2000Mail($id, $html)
  {
    global $config;
    $mail = new PHPMailer(true);

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $config->smtp->host;                   //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $config->smtp->username;                      //SMTP username
      $mail->Password   = $config->smtp->password;                                 //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = $config->smtp->port;                                       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('student@ictcampus.nl', 'Top 2000');
      // $mail->addAddress($values->email);     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = "Top 2000 Stemwijzer";
      $mail->Body    = $html;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}
