<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  
  $Vemail = $_SESSION['visitorEmail'];


  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hcvs.ps@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'hcvs2021'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('hcvs.ps@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($Vemail); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Your QR Code For HCVS';
    $mail->AddEmbeddedImage('qr.png','testImage','qr.png');
    $mail->Body = 
    '<hr><h3>here is your QR code</h3><img src="cid:testImage">';


    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
