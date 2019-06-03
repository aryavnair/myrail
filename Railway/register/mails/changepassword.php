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
if (isset($_POST['register'])) {
    //$newpassword1 = $_POST["newpassword"];
    $newpassword = md5('$newpassword');

        $sqll = "update login set password='$newpassword' where loginID='$l_id'";
        $up = ($db->executeNonQuery($sqll));
        if ($up) {

    echo "<script>alert('Password changed succesfully, Pleas login');window.location='../index.php';</script>";

           // <script> alert("Password changed succesfully");</script>

        } else {
            ?>
            <script> alert("Error!!");</script>
            <?php
        }

}
?>
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
                <input type="password" class="form-control" name="newpassword" id="npwd" placeholder="NEW PASSWORD" onChange="CheckPassword();" required>
               <br> <input type="password" class="form-control" name="confirmpassword" id="cnpwd"  placeholder="RETYPE PASSWORD"  onChange="pwdChek();" required>

                <br>
		<input type="submit"   value="Reset Password" name="register">
                <a href="../index.php">BACK TO HOME PAGE</a>
		<p id="response"></p>

		</div>
	</div>
	</div>
</form>
    <script>

            function CheckPassword()
            {


                var p = document.getElementById('npwd').value;
                var passw = /^[A-Za-z]\w{7,14}$/;
                var error = "";
                var illegalChars = /[\W_]/; // allow only letters and numbers

                if (p == "") {
                    $("#pswrd_l").html('You didnt enter a password.').fadeIn().delay(3000).fadeOut();

                    npwd.value = "";
                    npwd.focus();
                    return false;
                } else if ((p.length < 7) || (p.value.length > 15) && (p.search(/[a-zA-Z]+/) == -1) || (p.search(/[0-9]+/) == -1)) {

                    $("#pswrd_l").html('The password is the wrong length,minimum 8  and 15 charecter and The password must contain at least one numeral ').fadeIn().delay(3000).fadeOut();

                    npwd.value = "";
                    npwd.focus();

                    return false;

                } else if ((p.search(/[a-zA-Z]+/) == -1) || (p.search(/[0-9]+/) == -1)) {

                    $("#pswrd_l").html('The password must contain at least one numeral').fadeIn().delay(3000).fadeOut();

                    npwd.value = "";
                    npwd.focus();
                    return false;

                } else {
                    p.style.background = 'White';
                }
                return true;
            }

            function pwdChek()
            {
                if (document.getElementById("npwd").value == document.getElementById("cnpwd").value)
                {
                    return true;
                } else
                {
                    $("#pswrd_2").html('***Password Mismatch***').fadeIn().delay(3000).fadeOut();


                    cnpwd.value = "";
                    cnpwd.focus();
                    document.getElementById("cnpwd").focus();
                    return false;
                }
            }







        </script>


</body>>
</html>
