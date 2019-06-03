<?php
include '../dbcon.php';
if(isset($_POST['submit']))
{
	$password =$_POST["password"];
	$conpassword =$_POST["confirmpassword"];
	$repassword =$_POST["Retypepassword"];
	//$cpass=$_POST["Currentpassword"];
	//$npass = $_POST["Newpassword"];
	//$cnpass=$_POST["Retypepassword"];
	//$sql="select * from login where  password='$cpass' and login_id=$id";
	$sql="SELECT * FROM login WHERE password='$password' and email ='$email'";
	$res=mysqli_query($con,$sql);
	$no=mysqli_num_rows($res);
	if($no==1)
	{
		$sql1="update  login set password='$password' where email ='$email'";
		mysqli_query($con,$sql1);
		?>
	<?php }
	else
	{
		?>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">  
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper" >
		<div class="inner"   >
			<div class="item active" style="background-image: url(images/im.jpg)">
				<form action="#" method="post"  style=" border:solid 2px #000;width:450px;">
					<div style="display:inline-block;vertical-align:top;">
						<h3>Change Password</h3>
						<div class="row">
							<div class="col-sm-3 col-md-2 col-5">
								<label style="font-weight:bold;">Current Password</label>
							</div>
							<div class="col-md-8 col-6">
								<input  type="password" name="Currentpassword"style="width:330px;"required/>
							</div>
							<br/>
							<br>
							<div class="col-sm-3 col-md-2 col-5">
								<label style="font-weight:bold;">New password</label>
							</div>
							<div class="col-md-8 col-6">
								<input  type="password" name="Newpassword"style="width:330px;"required/>
							</div><br>
							<div class="col-sm-3 col-md-2 col-5">
								<label style="font-weight:bold;">Retype Password</label>
							</div>
							<div class="col-md-8 col-6">
								<input  type="password" name="Retypepassword"style="width:330px;"required/>
							</div>
							<input type="hidden" class="margin-right" name="id" value="<?php echo$_SESSION['mail'];?>">
							<div style="margin-top:100px;margin-left:100px;width:100px;">
								<input type="submit" name="submit" value="SUBMIT" class="form-control"required/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
		</html>
