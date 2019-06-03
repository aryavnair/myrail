 <?php
session_start();
include '../db.php';
        if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $conpassword = $_POST['confirmpassword'];
		$sql="select * from login where  password='$cpass' and email='$email'";
	    $res=mysqli_query($con,$sql);
	    $no=mysqli_num_rows($res);
	    if($no==1)
	    {
		$sql1="update  login set password='$newpassword' where email='$email'";
		mysqli_query($con,$sql1);
		
       //$result = mysqli_query("SELECT password FROM login WHERE email='$email'");
        //if(!$result)
        //{
        //echo "The email you entered does not exist";
        //}
        //else if($password!= mysql_result($result, 0))
        //{
        //echo "You entered an incorrect password";
        //}
        //if($newpassword=$confirmnewpassword)
        //$sql=mysqli_query("UPDATE login SET password='$newpassword' where email='$email'");
        //if($sql)
        //{
        //echo "Congratulations You have successfully changed your password";
        //}
      // else
       // {
       //echo "Passwords do not match";
       //}
		}
		}
      ?>
	  <html>
     <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Password Change</title>
     </head>
    <body>
    <h1>Change Password</h1>
   <form method="POST" action="#">
    <table>
    <tr>
   <td>Enter your email</td>
    <td><input type="email" name="email"></td>
    </tr>
    <tr>
    <td>Enter your existing password:</td>
    <td><input type="password" name="password"></td>
    </tr>
  <tr>
    <td>Enter your new password:</td>
    <td><input type="password" size="10" name="newpassword"></td>
    </tr>
    <tr>
   <td>Re-enter your new password:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" value="SUBMIT" name="submit">
    </form>
   <p><a href="indexx.php">Home</a>
   <p><a href="logout.php">Logout</a>
   </body>
    </html> 