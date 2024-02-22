<?php
session_start();
include("email.php");
if (isset($_SESSION["ministry_email"])) {
    $ministryEmail = $_SESSION["ministry_email"];
    $otp = rand(100000, 999999);   
    $_SESSION["ministry_otp"] = $otp;
    if (sendOTP($ministryEmail, $otp)) {
        header("Location: Ministry_login_3.php");
        exit();
    } else {
        echo 'Error sending OTP. Check your email sending function.';
    }
} else {
    echo 'Error occur. Session variable not set.';
}
?>
