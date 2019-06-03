

<?php
include 'config.php';
CheckLogout();
 $email = $_SESSION["email"];
if (isset($_POST['submit'])) {
$name = $_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];
$result3=mysqli_query($con,"SELECT loginID FROM  login where email='$email'");
$loginID3=mysqli_fetch_array($result3);
$loginID=$loginID3['loginID'];
$sql1="insert into complaints(loginID,name,email,subject,message)
values ('$id','$name','$Email','$subject','$message')";
 $res=mysqli_query($con,$sql1);

}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/val.css">
	<script src="js/val_jquery.min.js"></script>
	<script src="js/val.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>



<h3>Complaint Form</h3>

<div class="container">
  <form action="#" class="form oh-autoval-form" method="post" enctype="multipart/form-data">
    <label for="name"> Name</label>
	<input type="hidden" name="valu">
    <input type="text"  class="form-control av-name" av-message="For name validation"  name="name" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="text"  name="email" class="form-control av-email"av-message="invalid format"  placeholder="Your email.">
    <label ">Subject</label>
    <input type="text"  name="subject" class="form-control av-name" av-message="please enter subject" placeholder="please enter subject..">
    <label>Message</label>
    <textarea  name="message" class="form-control av-name"  placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>
