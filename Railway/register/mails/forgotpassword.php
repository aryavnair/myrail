<?php
include 'db.php';
 session_start();
if (isset($_POST['submits'])) {
	$email=$_POST['email'];
	$sqs="SELECT * FROM login WHERE email='$email'";
	$result=mysqli_query($con,$sqs);
	$row=mysqli_fetch_assoc($result);
    $a=$row['email'];
    $b=$row['loginID'];
    //$lidres="SELECT * FROM kalolsavam_tb1_login WHERE l_id='$b'";
	//$result2=mysqli_query($con,$lidres);
	//$rows=mysqli_fetch_assoc($result2);
      //  $pass=$rows['l_id'];
    if($a==$email)
	{
		$e=$row['email'];
		$_SESSION['email']=$row['email'];
    $_SESSION['loginID']=$row['loginID'];
		$n = 6;
		// Function to generate OTP
   function generateNumericOTP($n) {

       // Take a generator string which consist of
       // all numeric digits
       $generator = "1357902468";

       // Iterate for n-times and pick a single character
       // from generator and append it to $result

       // Login for generating a random character from generator
       //	 ---generate a random number
       //	 ---take modulus of same with length of generator (say i)
       //	 ---append the character at place (i) from generator to result

       $result = "";

       for ($i = 1; $i <= $n; $i++) {
           $result .= substr($generator, (rand()%(strlen($generator))), 1);
       }

       // Return result
       return $result;
   }
   // Main program

   $pa=generateNumericOTP($n);
   $sql="INSERT INTO `tbl_otp`(`email`, `otp`, `status`,`count`) VALUES ('$e','$pa',1,3) ";
//    print_r($sql);
//    return;
   $r2=mysqli_query($con,$sql);
  // $link=
    // $pass=$row['password'];
    // $pa=base64_decode($pass);
     $p="Your OTP:".$pa;
    // $m="Go to the link to recover your account:".$link."\r\n".$p;
	// mail($e,"Recover",$p);
    // echo "<script>alert('Authentication Success Please check your mail');window.location='otpconfirm.php';</script>";

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
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  //Set TCP port to connect to

  //$mail->to = "jomiyajohn@mca.ajce.in";
  //$mail->From = "jomiyajohn@mca.ajce.in";
  //$mail->FromName = "noora";

$mail->addAddress($row["email"]);

  $mail->isHTML(true);

  $mail->Subject = "forgot password";
  $mail->Body = "<i>this is your OTP:</i>".$p;
  $mail->AltBody = "For Chenge password enter your  OTP in ";
  if(!$mail->send())
   {
      echo "<script>alert('Authentication not Success Please try again');window.location='forgotpassword.php';</script>";
   //echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
      echo "<script>alert('Authentication Success Please check your mail');window.location='../index.php';</script>";
   //echo "Message has been sent successfully";
  }
	}
	else{
         echo "<script>alert('Please provide valid informations');window.location='../index.php';</script>";
     }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
<body>
    <form method="post" >
<div class="container" style="margin-top: 100px">
	<div class="row justify-content-center">
	<div class="col-md-6 col-md-offset-3" align="center">
		<img src="../img/forgotpassword-3.png"><br><br>
		<input type="email" class="form-control" id="email" name="email" placeholder="Your Email id">
		<br>
                <input type="submit"   value="ENTER" name="submits"><br>
                <a href="../index.php">BACK TO HOME PAGE</a>
		<p id="response"></p>

		</div>
	</div>
	</div>
</form>
<!-- <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  	vae email=$("email");
  	$(document).redy(function(){
  		email.on('click', function(){
  			if (email.val()!="") {
  				email.css('border','1px solid green');
  				$AJAX({
  					url:'forgotpassword.php',
  					method:'POST',
  					datatype:'json',
  					data:{
  						email:email.val()
  					}, success: function(response)
  					{
  						if(!response.success)
  							$("#response").html(response.msg).css('color',"red");
  						else

  							$("#response").html(response.msg).css('color',"green");
  					}
  				});
  			}
  			else{
  				email.css('border','1px solid red');
  			}
  		});
  	});
  </script> -->

</body>
</html>
