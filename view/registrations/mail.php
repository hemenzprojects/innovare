<?php

print_r('sdf');
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// It is mandatory to set the content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers. From is required, rest other headers are optional
$headers .= "From:".$name."<".$email.">\r\n";
$headers .= 'Cc: sales@example.com' . "\r\n";
// $mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "hemenmike@gmail.com";

mail($recipient, $subject, $message, $headers) or die("Error!");

?>