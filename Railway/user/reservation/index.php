<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
include '../config.php';
CheckLogout();

if (!(isset($_SESSION['email']))) {
	header('location:../logout.php');
 }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css">
<script src="js/jquery_3.2.1.min.js"> </script>
<script src="js/oh-autoval-script.js"></script>
<head>
	<title>Train Ticket Booking</title>
	<link rel="stylesheet" href="css/style.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#fromtxt,#totxt").autocomplete({
            source: "autocomplete.php",
        });
    });
</script>
<style>
    /* body {
        font-size: 28px; 
    } */

    ul {
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

    li {
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


<body background="images/hi.jpg">
<ul>
        <li class=" active"><a href="../user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="../profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="../editProfile.php" class="nav-link">Edit Profile</a></li>
		<li class=""><a href="../reservation/index.php" class="nav-link">Reservation</a></li>
		<li class="nav-item"><a href="../reservedticket.php" class="nav-link">Reserved Details</a></li>
		<li class=""><a href="../food/allcatering.php" class="nav-link">Food</a></li>
        <li class=""><a href="../cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class=""><a href="../logout.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
	<h1>Train Ticket Booking</h1>
	<div class="main-agileinfo">
		<div class="sap_tabs">
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item"><span>Trip</span></li>
					<!-- <li class="resp-tab-item"><span>One way</span></li>
					<li class="resp-tab-item"><span>Multi city</span></li>		 -->
				</ul>
				
				<div class="clearfix"> </div>
				<div class="resp-tabs-container" style="background-color: black;">
					<div class="tab-1 resp-tab-content roundtrip">
						<form action="reservation1.php" method="post">
							<div class="from" >
								<h3>From</h3>
								<input type="text" name="from" id="fromtxt" class="city1" placeholder="Type Departure City" required="">
							</div>
							<div class="to">
								<h3>To</h3>
								<input type="text" name="to" id="totxt" class="city2" placeholder="Type Destination City" required="">
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3>Date</h3>
									<input  id="datepicker" name="datetxt" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
									<!-- <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Flexible with date</label>
									</span> -->
								</div>
								<div class="return">
									<h3>Berth</h3>
								<select id="w3_country1" name="berth" onchange="change_country(this.value)" class="frm-field required">
									    <option>Select</option>
                                <option value='upperberth'>upper</option>
                                <option value="midberth">middle </option>
                                <option value="lowerberth">lower </option>

								</select>
								</div>

							</div>
							<div class="class">
								<h3>Class</h3>
								<select id="w3_country1" name="class" onchange="change_country(this.value)" class="frm-field required">
							    <option>1A</option>
                                <option>2A </option>
                                <option>3A </option>
                                <!-- <option>EC</option> -->
                                <!-- <option>FC</option> -->
                                <option>CC</option>
                                <option>SL</option>
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3>No of Passenger</h3>
									<div class="quantity av-number">
										<div class="quantity-select">
										<input type="text" name="adult">
										</div>
									</div>
								</div>
								<!--<div class="child">
									<h3>Child:(0-11 yrs)</h3>
									<div class="quantity">
										<input type="text" name="child">
									</div>
								</div>-->
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input type="submit" value="Search Trains">
						</form>
					</div>
					
					

				</div>
			</div>
		</div>
	</div>
	<div class="footer-w3l">
		<p class="agileinfo"> &copy; 2016 Train Ticket Booking . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
	<!--script for portfolio-->
		<script src="js/jquery.min.js"> </script>
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
		</script>
		<!--//script for portfolio-->
				<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->
			<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--//quantity-->
						<!--load more-->
								<script>
	$(document).ready(function () {
		size_li = $("#myList li").size();
		x=1;
		$('#myList li:lt('+x+')').show();
		$('#loadMore').click(function () {
			x= (x+1 <= size_li) ? x+1 : size_li;
			$('#myList li:lt('+x+')').show();
		});
		$('#showLess').click(function () {
			x=(x-1<0) ? 1 : x-1;
			$('#myList li').not(':lt('+x+')').hide();
		});
	});
</script>
<!-- //load-more -->



</body>
</html>
