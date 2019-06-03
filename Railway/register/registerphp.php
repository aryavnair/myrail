<?php
ob_start();
session_start();
include '../dbcon.php';

if (isset($_POST['submit'])) {
  $firstName = $_POST["fname"];
  $lastName = $_POST["lname"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $mobile = $_POST["mobile"];
  $password =md5($_POST["password"]);
  $conpassword =md5($_POST["confirmpassword"]);
  $district = $_POST["district"];
  $state = $_POST["selectedstate"];

  //$sqls = "SELECT email FROM  login WHERE email =$email";
 $filename=$_FILES["file"]["name"];


			 $exts=pathinfo($filename, PATHINFO_EXTENSION);

      $image="$email.$exts";
	   pathinfo($filename, PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["file"]["tmp_name"],"./uploads/$image");

  $results = mysqli_query($con, "SELECT * FROM login WHERE email ='$email'");
  $count = mysqli_num_rows($results);

  if ($count == 0) {
    if ($password == $conpassword)
    {
      $results = mysqli_query($con, "SELECT * FROM login order by loginID DESC");
      $fetch =mysqli_fetch_array($results);
      $userId=$fetch['loginID']+1 ;
      echo $userId;
      $q="insert into user(userId,firstname,lastname,email,gender,mobile,district,state,image) values('$userId','$firstName','$lastName','$email','$gender','$mobile','$district','$state','$image')";
      //"ALTER TABLE user ADD FOREIGN KEY (loginID) REFERENCES login(loginID)";
      mysqli_query($con,$q );
	  //echo $q;
     // $s=mysqli_insert_id($con);

	 mysqli_query($con, "insert into login values('','$email','$password','user','1')");
      echo "<script> alert('User Registered successfully'); window.location='register.php'</script>";
    }
    else{
      echo "<script> alert('incorrect password'); window.location='register.php'</script>";

    }
  }
  else {
   echo "<script> alert('User Already  registered please login '); window.location='register.php'</script>";
  }

}
?>
<?php

//database connection page


if (isset($_POST["submit1"])) {
  $email = $_POST["email_login"];   //username value from the form
  $pwd = md5($_POST["password_login"]);	//password value from the form


  $res = mysqli_query($con, "select * from login where email='$email' and password='$pwd'");  //query executing function
  $count = mysqli_num_rows($res);
  if($count>0)
  {
    $fetch =mysqli_fetch_array($res);
    if($fetch['status'] == '0')
        {
    echo "<script>alert('User Blocked!'); window.location='register.php'</script>";
}
else {
  session_start();
  $_SESSION["user_type"] = $fetch['user_type'];
  $_SESSION["email"] = $email;

  if ($fetch['user_type'] == 'admin') {
    header("location:../admin_dashboard/index.php");	//home page or the dashboard page to be redirected
  }
  elseif ($fetch['user_type'] == 'user') {
    $_SESSION["email"] = $email;	// setting username as session variable
    header("location:../user/user_home.php");
  }
  elseif ($fetch['user_type'] == 'staff') {
    header("location:../staff/staff_home.php");
  }
  elseif ($fetch['user_type'] == 'catering') {
    header("location:../catering/catering_home.php");
  }
  else {
   echo "<script>alert('invalid credentials!'); window.location='register.php'</script>";
 }

}

}

}
?>
