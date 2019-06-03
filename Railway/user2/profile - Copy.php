<?php
  include '../dbcon.php';
  session_start();
  $email = $_SESSION["email"];
  if(isset($_REQUEST["submit"]))
{
  $firstName = $_POST["fname"];
  $lastName = $_POST["lname"];
  $gender = $_POST["gender"];
  $mobile = $_POST["mobile"];
  $district = $_POST["district"];
  $state = $_POST["selectedstate"];
  mysqli_query($con,"UPDATE `user` SET `firstname`='$firstName',`lastname`='$lastName,`gender`='$gender',`mobile`='$mobile'
 `district`='$district',`state`='$state' WHERE email=$email");
  header("Location:profile.php");
}
        $sql=mysqli_query($con,"select * from user where email='$email'");
        while ($row = mysqli_fetch_array($sql)) 
        {
?>
<?php
}
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
<script type='text/javascript'>

$(document).on("change", "#state", function (event) {

$("#dis").html("");


$.ajax({
    type: "GET",
     url: "http://districts.gov.in/doi_service/rest.php/district/" + $('#state :selected').val() + "/json", 
     success: function (data) {
        var strdis = "";
        strdis = "<option>Select District</option>";
        $.each(data.categories, function (obj, idk) {
            if (idk.category.district_name) {
                strdis += "<option>" + idk.category.district_name + "</option>";
            }
        });
        $("#dis").html("<ul>" + strdis + "</ul>");
    }

});
});

function LoadStatedrop(distval)
{
$.get("http://districts.gov.in/doi_service/rest.php/states/json",function(data){
var strstate="";
strstate="<option>Select State</option>";
var strname="";


$.each(data.categories, function(obj,idk) {
//alert(idk.state.state_id +"  " + distval);
if(idk.category.state_id==distval){
strstate+="<option value='"+idk.category.state_id+"' selected='selected'>"+idk.category.state_name+"</option>";
strname= idk.category.state_name;

}
else
{
strstate+="<option value='"+idk.category.state_id+"'>"+idk.category.state_name+"</option>";

}

 });

 //localStorage.setItem("statename", strname);
   $("#state").html("<ul>"+strstate+"</ul>");
$("#lblstatename").text(strname);
},'json');
}

LoadStatedrop();
</script>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../index.php"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="user_home.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="profile.php" class="nav-link">View Profile</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Reservation</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Food</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">PNR status</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Cancellation</a></li>
			  <li class="nav-item"><a href="#" class="nav-link">Search</a></li>
			  <li class="nav-item"><a href="../index.php" class="nav-link">logout</a></li>
        <img src="images/bg_2.jpg" alt="avathar" class="avathar">
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image:  url(../images/bg_7.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <style>
          .row1 {
            display: flex;
            width: 45%;
            height: 10.4 %;
            /*justify-content: space-between;*/
            background-color: #ffffff;
            margin: auto 15%;
            /*padding: 0.7%;*/
           line-height: 5.0 ;
           color: #111010;
            padding-left: 11%;
          }
          .colum1{
            width: 40%;

          }
          .colum2{
        width:40%;


          }
          </style>
          

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

  <form action="" enctype="multipart/form-data" class="oh-autoval-form" onsubmit="return" method="post">
    
            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name
                </label>
                <input type="text" name="fname" value="<?php echo $row[1] ?> "  />
              </div>

              <div class="field-wrap">
                <label>
                  Last Name
                </label>
                <input type="text" name="lname" class="av-name" av-message="invalid format" />
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Email Address
              </label>
              <input type="email" name="email" class="av-email" av-message="Email format validation" />
            </div>

  			 <div class="field-wrap">
  			   <select id="gender" name="gender">
  			   <option value="Male">Gender</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
           <option value="Others">Others</option>
           </select>
         </div>

  <div class="field-wrap">
<select id="state" name="state" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text" >
</select>
</div>
       <div class="field-wrap">
       <!-- <input list="dis" name="dis" required autocomplete="off"> -->
       <select id="dis" name="district" >
       <option> Select District </option>
       </select>
       </div>
              <div class="field-wrap">
              <label>
                Mobile No
              </label>
              <input type="mob" name="mobile" class="av-mobile" av-message="invalid format"/>
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
