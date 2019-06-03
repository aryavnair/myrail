<?php
include("database.php");
$email=$_POST["email"];
$sql="SELECT * FROM login WHERE email='$email'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "aryavnair08@gmail.com";
  $mail->Password = "aryaparu9";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "aryavnair08@gmail.com";
  $mail->FromName = "ADMIN";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "test mail";
  $mail->Body = "<i>this is your password:</i>".$row["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
	 
   echo "Message has been sent successfully";
  }
   header("location:../index.php");