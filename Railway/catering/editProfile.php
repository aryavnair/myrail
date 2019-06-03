<?php
include 'config.php';
CheckLogout();
?>

<?php

session_start();
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
                strdis += "<option style='color:black'>" + idk.category.district_name + "</option>";
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
strstate+="<option value='"+idk.category.state_id+"' style='color:black'  selected='selected'>"+idk.category.state_name+"</option>";
strname= idk.category.state_name;

}
else
{
strstate+="<option value='"+idk.category.state_id+"' style='color:black'>" +idk.category.state_name+"</option>";

}

 });

 //localStorage.setItem("statename", strname);
   $("#state").html("<ul>"+strstate+"</ul>");
$("#lblstatename").text(strname);
},'json');
}

LoadStatedrop();
</script>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" style="background-color: black !important" id="ftco-navbar">
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

    <!-- <div class="hero-wrap js-fullheight" style="height: 143px !important;"> -->
    <!-- <div class="overlay" style="opacity: 1.5;"></div> -->
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <style>
                .row1 {
                    display: flex;
                    width: 75%;
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
            <form action="" name="form1" enctype="multipart/form-data" method="post">
                <?php


                include '../dbcon.php';


                if (isset($_POST['submit'])) {
                    $name = $_POST["name"];
                    $licenseno = $_POST["licenseno"];
                    $email = $_POST["email"];
                    $mobile = $_POST["mobile"];
                    $address = $_POST["address"];
                    $district = $_POST["district"];
                    $state = $_POST["selectedstate"];
                    //$sqls = "SELECT email FROM  login WHERE email =$email";
                   

                    $q = "update catering set name = '$name',licenseno = '$licenseno',mobile = '$mobile',address = '$address',
                    district = '$district',state = '$state' where email = '$email'";
                    mysqli_query($con, $q);
                   // echo $q;


                     //echo "<script> alert('Catering modified successfully'); window.location='editProfile.php'</script>";
                }
                ?>

                <?php


                $email = $_SESSION["email"];
                $sql = mysqli_query($con, "select * from catering where email='$email'");

                while ($row = mysqli_fetch_array($sql)) {
                    ?>

                    <div class="row1" style="margin-top:200px">
                        <div class="colum1">Name</div>
                        <div class="colum2"> <input type="text" name="name" style=" color: black !important;" class="av-name" av-message="invalid format" value=" <?php echo $row[1] ?>" />
                        </div>
                    </div>
                    <div class="row1">
                        <div class="colum1">Licenseno</div>
                        <div class="colum2"> <input type="text" style=" color: black !important;" name="licenseno" value=" <?php echo $row[2] ?>" />

                        <input type="hidden" name="email" class="av-name" av-message="invalid format" value="<?php echo $row[3] ?>"></div>
                    </div>
                    
                    <div class="row1">
                        <div class="colum1">Mobile</div>
                        <div class="colum2"><input type="mob" style=" color: black !important;" name="mobile" class="av-mobile" value=" <?php echo $row[4] ?>" av-message="invalid format" />
                        </div>
                    </div>
                    
                    <div class="row1">
                        <div class="colum1">Address</div>
                        <div class="colum2"> <input type="text" name="address" style=" color: black !important;" class="av-name" av-message="invalid format" value=" <?php echo $row[5] ?>" />
                        </div>
                    </div>
                    <div class="row1">
                        <div class="colum1">State</div>
                        <div class="colum2"><select id="state" style=" color: black !important;" name="state" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
                                <option value="<?php echo $row[7] ?>" ><?php echo $row[7] ?></option>
                            </select></div>
                    </div>
                    <div class="row1">
                        <div class="colum1">District</div>
                        <div class="colum2"><select id="dis" style=" color: black !important;" name="district">
                                <option  value="<?php echo $row[6] ?>"><?php echo $row[6] ?></option>
                            </select></div>
                    </div>
                    <div class="row1">
                        <div class="colum1"></div>
                        <div class="colum2"> <input type="hidden" name="selectedstate" id="text_content" value=""/>
                         <button type="submit" class="button button-block" style=" color: black !important;" name="submit" >submit</button></div>
                    </div>
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
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    </form>

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
