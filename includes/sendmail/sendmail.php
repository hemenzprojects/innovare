<?php

//die("died");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'sendmail/vendor/autoload.php';
function connectdoDB(){
     $conn = mysqli_connect('localhost','pkutidam56','Genesis1:1-10','eganu321');
    if(!$conn){
        return null;
    }else{
        return $conn;
    }
  }

function Message($message){
    $body = '<p style="margin:10px"><img src="https://sts.ug.edu.gh/services/assets/images/ug.png"></p>';
    $body.=$message;
    return $body;
}

function fireSMS($conn,$fetch,$senderid='UG'){
            try {
               $mess=$fetch['message'];
                 $url ="https://api.wirepick.com/httpsms/send";
                   $param = array('phone'=>'233'.substr($fetch['sendto'],1),
                  'from'=>$senderid,'client'=>'UGLEGON','password'=>'123456','text'=>urlencode($mess));   

                    $rest = '';
                foreach($param as $key=>$value){
                  $rest.=$key.'='.$value.'&';
                   //$param[$key] =base64_encode($value);
                 }
                  $rest = substr($rest, 0,-1);
                  $newurl = $url.'?'.$rest;
                 // return $newurl;
                   $ch = curl_init($newurl);
                   //curl_setopt($ch, CURLOPT_URL, );
                   curl_setopt($ch, CURLOPT_POST, 0);
                   curl_setopt($ch, CURLOPT_VERBOSE, true); 
                  // curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                   $result = curl_exec($ch);

                    mysqli_query($conn,"UPDATE send_mails set status=1 where id=".$fetch['id']);
                   //$result = (json_decode($result,TRUE));    
            } catch (\Exception $e) {}
             
}
 function initEmailDefaults(){
    $mail = new PHPMailer(true); 
    $mail->SMTPDebug = false;
    $mail->isSMTP();                                       
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;  
    $mail->Username   = 'itservices@ug.edu.gh';                     
    $mail->Password   = 'Legon@21';                              
    $mail->SMTPSecure = 'tls';                                
    $mail->Port       = 587;      
    $mail->isHTML(true);  
    $mail->setFrom('itservices@ug.edu.gh', 'University of Ghana IT Services');
    return $mail;
 }

function fireEmail($conn,$mail,$fetch){
    $emails = explode(',', $fetch['sendto']);
      try {
    foreach ($emails as $e) {
       $mail->addAddress($e, ''); 
    }
    $mail->Subject = $fetch['subject'];
    $mail->Body    = Message($fetch['message']);
    $mail->send();
    $mail->ClearAddresses();
    $mail->ClearAttachments();
    $mail->ClearAllRecipients() ;
    $mail->ClearBCCs() ;
    $mail->ClearCCs() ; 
    $mail->ClearCustomHeaders() ;
    $mail->ClearReplyTos();
    mysqli_query($conn,"UPDATE send_mails set status=1 where id=".$fetch['id']);
     echo 'Message has been sent';
    } catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} - ".$fetch['id'];
    }
}

function sendMessages(){
    $conn = connectdoDB();
       if(is_null($conn)){
        return;
       }

    $res = mysqli_query($conn,"SELECT * FROM send_mails where status=0");
    if($res->num_rows==0){
        return;
    }
    $mail = initEmailDefaults(); 
    while ($fetch = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
        if($fetch['type']=='sms'){
            fireSMS($conn,$fetch);
        }
        if($fetch['type']=='email'){
            fireEmail($conn,$mail,$fetch);
        }
    }

}
//echo 'ok';
//sendMessages();
