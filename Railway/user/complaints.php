<?php
include 'config.php';
CheckLogout();
 $email = $_SESSION["email"];
if (isset($_POST['valu'])) {
//$login_id=$_POST["loginid"];
$name = $_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];
$result3=mysqli_query($con,"SELECT loginID FROM login where email='$email'");
$loginID3=mysqli_fetch_array($result3);
$loginID=$loginID3['loginID'];
$sql1="insert into complaints(login_id,name,email,subject,message) values ('$login_id','$name','$email','$subject','$message')";
//$stat = mysqli_query($con, "insert into reservation values('','$trainID','$class','$date','$berth','paid','$user','$coach','$from','$to','$rate')");
 $res=mysqli_query($con,$sql1);
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <style>
        .avathar {
            vertical-align: middle;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-left: 00px;
        }
    </style>
    <title>Railway</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">


    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/jquery-3.2.1.min.js"> </script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" style="background-color: black !important" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../index.php"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="user_home.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="profile.php" class="nav-link">View Profile</a></li>
	          <li class="nav-item"><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item"><a href="reservation/index.php" class="nav-link">Reservation</a></li>
            <li class="nav-item"><a href="reservedticket.php" class="nav-link">Reserved Details</a></li>
	          <li class="nav-item"><a href="food/allcatering.php" class="nav-link">Food</a></li> 
	          <li class="nav-item"><a href="cancelticket.php" class="nav-link">Cancellation</a></li>
			      <li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
	        </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <!-- <div class="hero-wrap js-fullheight" style="height: 143px !important;"> -->
    <!-- <div class="overlay" style="opacity: 1.5;"></div> -->
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <style>
                .row1 {
                    display: flex;
                    width: 45%;
                    height: -5.6px %;
                    /* justify-content: space-between; */
                    background-color: #ffffff;
                    margin: auto 15%;
                    margin-top: 1%;
                    /* padding: 0.7%; */
                    line-height: 2;
                    color: black ;
                    padding-left: 11%;
                }

                .colum1 {
                    width: 40%;
                    color: black !important;
                 
                }

                .colum2 {
                    width: 40%;
                    color: black ;
                }
        
  
            </style>
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

    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/jquery.timepicker.min.js"></script>
    <script src="../js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../js/google-map.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>
