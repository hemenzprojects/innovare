<?php
// include 'includes/sendmail/sendmail.php';
require_once "includes/sendmail/sendmail.php'";
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// It is mandatory to set the content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers. From is required, rest other headers are optional
$headers .= "From:".$name."<".$email.">\r\n";
// $headers .= 'Cc: sales@example.com' . "\r\n";
// $mailheader = "From:".$name."<".$email.">\r\n";
$smtpinfo["host"] = "smtp.gmail.com";
$smtpinfo["port"] = "587";
$smtpinfo["auth"] = true;
$smtpinfo["MAIL_ENCRYPTION"] = "tls";
$smtpinfo["username"] = "hemenmike@gmail.com";
$smtpinfo["password"] = "mike7692";

$recipient = "hemenmike@gmail.com";

$mail_object =& Mail::factory("smtp", $smtpinfo);
mail($recipient, $subject, $message, $headers) or die("Error!");



?>