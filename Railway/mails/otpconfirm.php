<?php
include 'db.php';
include("dbconnection.php");
$db = new DbConnection;
session_start();
if (!(isset($_SESSION['loginID']))) {
   header('location:../index.php');
}
$l_id=$_SESSION['loginID'];
$email=$_SESSION['email'];
//echo $l_id;
//echo $email;
if (isset($_POST['submitsn'])) {
    $otp=$_POST['otp'];
   // $email=getSession('email');
    // print_r($email);
    // return;
    $sql="select * from tbl_otp where email='$email' and status=1 and count>=0";
    // print_r($sql);
    //  return;
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
         	$row=mysqli_fetch_assoc($result);
            $a=$row['otp'];
            $co=$row['count'];
// print_r($co);
// return;
//      echo $co." ".$a." ".$otp;
//     if($co>0)
//     {


        if($a==$otp)
 	    {
             $sql1="UPDATE `tbl_otp` SET `status`=0,`count`=0 WHERE `email`='$email'";
             mysqli_query($con,$sql1);
             echo "<script>alert('Authentication Success ');window.location='changepassword.php';</script>";


         }
         else
         {

             $sql2="UPDATE `tbl_otp` SET `count`= count-1 WHERE `email`='$email'";
             //print_r($sql2);
             //return;
             mysqli_query($con,$sql2);
             echo "<script>alert('Wrong OTP ');window.location='otpconfirm.php';</script>";
         }
     }
  else
     {
        $sql3="UPDATE `tbl_otp` SET `count`=0,`status`=0 WHERE `email`='$email'";
        //print_r($sql2);
        //return;
        mysqli_query($con,$sql3);
        echo "<script>alert('OTP Expired ');window.location='../index.php';</script>";
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
	<form method="post">
<div class="container" style="margin-top: 100px">
	<div class="row justify-content-center">
	<div class="col-md-6 col-md-offset-3" align="center">
		<img src="img/forgotpassword-3.png"><br><br>
                <input type="number" class="form-control" id="otp" name="otp" placeholder="ENTER YOUR OTP">
		<br>
		<input type="submit"   value="ENTER" name="submitsn"><br>
                <a href="../index.php">BACK TO HOME PAGE</a>
		<p id="response"></p>

		</div>
	</div>
	</div>
</form>
</body>
</html>
