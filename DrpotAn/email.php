<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'C:\xampp\htdocs\DrpotAn\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\DrpotAn\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\DrpotAn\PHPMailer-master\src\SMTP.php';

function sendOTP($email, $otp)
{
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kanthariyahimeshkanthariya@gmail.com';
    $mail->Password = 'ljnhkayujckpnmty';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('kanthariyahimeshkanthariya@gmail.com', 'Himesh');
    $mail->addAddress($email);

    $mail->isHTML(true);
    
    
    $mail->Subject = 'OTP Verification';
    $mail->Body = 'Your OTP for Ministry Login is:'. $otp . PHP_EOL ;
    $mail->AltBody = 'This is the plain text message body for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
        return true;
    }
}
