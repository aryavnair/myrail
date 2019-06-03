
<?php
include 'config.php';
CheckLogout();
?>

<!DOCTYPE html>

<html lang="en">
  <head>
<style>
  .avathar{
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
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../index.php"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="catering_home.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item"><a href="menu.php" class="nav-link">Food list</a></li>
	          <li class="nav-item"><a href="vieworders.php" class="nav-link">Order details</a></li>
	          <li class="nav-item"><a href="addfood.php" class="nav-link">Add food</a></li>
			  <li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image:  url(../images/bg_7.jpg);    position: absolute;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" style="margin-top: 100px;" data-scrollax-parent="true">
        <style>
          .row1 {
            display: flex;
            width: 45%;
            height: 10.4 %;
            /*justify-content: space-between;*/
            background-color: black;
            margin: auto 15%;
            /*padding: 0.7%;*/
           line-height: 6.0 ;
           color: blue;
            padding-left: 11%;
          }
          .colum1{
            width: 40%;

          }
          .colum2{
        width:40%;
      

          }
          </style>
          <?php
        include '../dbcon.php';
      
        $email=$_SESSION["email"];
        $sql=mysqli_query($con,"select * from catering where email='$email'");
      
        while ($row = mysqli_fetch_array($sql)) {
        ?>
      
        <div class="row1" style="margin-top:100px">
        <div class="colum1">Name</div>
        <div class="colum2"><?php echo $row[1] ?></div>
        </div>
        <div class="row1">
        <div class="colum1">LicenseNo</div>
        <div class="colum2"><?php echo $row[2] ?></div>
        </div>

        <div class="row1">
        <div class="colum1">Email</div>
        <div class="colum2"><?php echo $row[3] ?></div>
        </div>
        <div class="row1">
        <div class="colum1">Mobile</div>
        <div class="colum2"><?php echo $row[4] ?></div>
        </div>
        <div class="row1">
        <div class="colum1">Address</div>
        <div class="colum2"><?php echo $row[5] ?></div>
        </div>
        <div class="row1">
        <div class="colum1">District</div>
        <div class="colum2"><?php echo $row[6] ?></div>
        </div>
        <div class="row1">
        <div class="colum1">State</div>
        <div class="colum2"><?php echo $row[7] ?></div>
        </div>

        <br>
        <?php
        
         }
        ?>

          <!--<div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <h2 class="subheading" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Welcome to home!</h2>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            	<span>Experience</span> . <span>Innovation</span> . <span>Excellence</span>
            </h1>

          </div>-->
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
