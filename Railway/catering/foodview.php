<?php
include 'config.php';
CheckLogout();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Railway</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            	<span>E-Catering</span>
            </h1>
	    <div class="container">

	      <a class="navbar-brand" href="index.php"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="catering_home.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
	         <!-- <li class="nav-item"><a href="#" class="nav-link">Change password</a></li>-->
	          <li class="nav-item"><a href="#" class="nav-link">Food list</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Order details</a></li>
	          <li class="nav-item"><a href="addfood.php" class="nav-link">Add food</a></li>
			  <li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_6.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          	  <!--<h2 class="subheading" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Welcome to indian railway!</h2>
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            	<span>Experience</span> . <span>Innovation</span> . <span>Excellence</span>
            </h1>-->
            <style>
   th,td{

       padding: 3% 0% 3% 1%;
       text-align: center;
   }
   td{
       background-color: white;
   color: black;
   }
   th{
       background-color: red;
   }
   table a{
       color:blue;
   }
   </style>
   <div align="center" >
    <h1>FOOD DETAILS </h1>
</div>
   <table id="table" border="2" style=" width: 80%;
   margin-left: 18%;"align="center">
          <thead>
            <tr>

            <th align="center">FOOD</th>
            <th align="center">TYPE</th>
            <th align="center">RATE</th>
            <th align="center">IMAGE</th>
            </tr>

            </thead>
            <tbody>
<?php
include '../dbcon.php';
session_start();
$email=$_SESSION["email"];
$res = mysqli_query($con,"select * from food where email='$email'");
while($row = mysqli_fetch_array($res))
{
?>
<tr >
<td><?php echo $row["food"];?></td>
<td><?php echo $row["type"];?></td>
<td><?php echo $row["rate"];?></td>
<td><img width="100" height="80"  src="../catering/food/<?php echo $row['image'] ?>"></td>
</tr>
<?php
}
?>
</tbody>
</table>

          </div>
        </div>
      </div>
    </div>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
  <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
  <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg>
  </div>

<?php
include("footer.php");
?>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
