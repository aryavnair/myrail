<?php
include 'db.php';
?>

<?php
session_start();
if(isset($_POST['submit']))
{

$email=$_REQUEST["email"];
$query=mysqli_query($con,"select * from kalolsavam_tb2_user where email='$email'");
$row=mysqli_fetch_array($query);
//echo $row['email'];die();
//print_r($row);die;
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
  $mail->Username = "anjuthomas4454@gmail.com";
  $mail->Password = "pippykochu8713";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  //Set TCP port to connect to

  //$mail->to = "jomiyajohn@mca.ajce.in";
  //$mail->From = "jomiyajohn@mca.ajce.in";
  //$mail->FromName = "noora";

$mail->addAddress($row["email"]);

  $mail->isHTML(true);

  $mail->Subject = "test mail";
  $mail->Body = "<i>this is your password:</i>".$row["pass"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
   {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
  }
}?>
