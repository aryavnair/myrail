<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
include '../config.php';
CheckLogout();
?>
<!DOCTYPE html>
<html>
<head>
<title>Shopping Cart Widget Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopping Cart Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.message1').fadeOut('slow', function(c){
	  		$('.message1').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close2').on('click', function(c){
		$('.message2').fadeOut('slow', function(c){
	  		$('.message2').remove();
		});
	});	  
});
</script>
<style>

    .ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: -webkit-sticky;
        /* Safari */
        position: sticky;
        top: 0;
    }

    .li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }

    .active {
        background-color: #4CAF50;
    }
</style>
</head>
<body>
<<!--ul class="ul">
            <li class="nav-item active   li"><a href="catering_home.php" class="nav-link">Home</a></li>
            <li class="nav-item li" ><a href="#" class="nav-link">Edit Profile</a></li>
            <li class="nav-item li"><a href="#" class="nav-link">Change password</a></li>
            <li class="nav-item li"><a href="#" class="nav-link">Food status</a></li>
            <li class="nav-item li"><a href="#" class="nav-link">Order details</a></li>
            <li class="nav-item li"><a href="addfood.php" class="nav-link">Add food</a></li>
            <li class="nav-item li"><a href="../logout.php" class="nav-link">logout</a></li>
		</ul>-->
		<ul>
        <li class=" active li"><a href="../user_home.php" class="nav-link">Home</a></li>
        <li class="nav-item li"><a href="../profile.php" class="nav-link">Profile</a></li>
        <li class="nav-item li"><a href="../editProfile.php" class="nav-link">Edit Profile</a></li>
        <li class="nav-item li"><a href="../reservation/index.php" class="nav-link">Reservation</a></li>
        <li class="nav-item li"><a href="../reservedticket.php" class="nav-link">Reserved Details</a></li>
        <li class="nav-item li"><a href="../food/allcatering.php" class="nav-link">Food</a></li>
        <li class="nav-item li"><a href="../cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class="nav-item li"><a href="../logout.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
	<!-- main -->
		<div class="main">
			<h1>Shopping Cart Widget</h1>
			<div class="main-grid1">
				<ul>
					<li><a href="#" class="car">Cart</a></li>
				</ul>
			</div>
			<div class="main-grid2">
				<!-- <h2>My Shopping Bag (3)</h2> -->
                <?php
                    include '../../dbcon.php';
								$user=$_SESSION["email"];
								$total=0;
               $sql= mysqli_query($con, "select * from cart where user='$user'");
    while($row=mysqli_fetch_array($sql))
    {

			$pic="$row[1].$row[2].$row[3]"."jpg";
			$total+=$row[2]*$row[3];
           echo"     <div class='cart_box'>
					<div class='message'>
						<a href='remove.php?id=$row[0]'> <div class='alert-close'> </div> </a>
						<div class='list_desc'><h4><a href='#'>$row[1]</a></h4>
						<span class='actual'>$row[2]</span></div>
						  <div class='clear'></div>
					</div>
				</div>";
    }
                ?>
				
				<!-- <div class="cart_box">
				 <div class="message1">
					 <div class="alert-close1"> </div> 
					<div class="list_img"><img src="images/2.jpg" class="img-responsive" alt=""/></div>
					<div class="list_desc"><h4><a href="#">Velit esse molestie</a></h4><span class="actual">
					 $15.00</span></div>
					  <div class="clear"></div>
				  </div>
				</div> -->
				<!-- <div class="cart_box1">
				  <div class="message2">
					 <div class="alert-close2"> </div> 
					<div class="list_img"><img src="images/3.jpg" class="img-responsive" alt=""/></div>
					<div class="list_desc"><h4><a href="#">Velit esse molestie</a></h4><span class="actual">
					 $20.00</span></div>
					  <div class="clear"></div>
				  </div> -->
				</div>
				<div class="total">
					<div class="total-left">
						<p>Total :<span> <?php echo $total ; $_SESSION["foodrate"]=$total?></span></p>
					</div>
					<div class="total-right">
						<a href="foodpayment.php">Check Out</a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="copy-right">
				<p>Copyright &copy; 2015 Shopping Cart Widget. All rights  Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		</div>
	<!-- //main -->
</body>
</html>