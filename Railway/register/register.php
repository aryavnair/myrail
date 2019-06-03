<?php
include '../dbcon.php';
include("registerphp.php");

?>
<!DOCTYPE html>
<html lang="en" >
<link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css">
<script src="js/jquery_3.2.1.min.js"> </script>
<script src="js/oh-autoval-script.js"></script>

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style.css">
<style>
select
{
  font-size: 22px;
    display: block;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
    background: none;
    background-image: none;
    border: 1px solid #a0b3b0;
    color:#8d9499;
    border-radius: 0;
    transition: border-color .25s ease, box-shadow .25s ease;
}
</style>

</head>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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

  <div class="form">
    <a href="../index.php">Home</a><br></br>
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="" enctype="multipart/form-data" class="oh-autoval-form" onsubmit="return" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name
              </label>
              <input type="text" name="fname" class="av-name" av-message="invalid format"  />
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
		    <div class="field-wrap">
          <input type="file" name="file" id="fileToUpload" class="av-image" av-message="invalid format" />
        </div>
           <div class="field-wrap">
           <label>
              Password
           </label>
           <input type="password" class="av-password" av-message="invalid format" name="password" />
           </div>
           <div class="field-wrap">
           <label>
              Confirm Password
           </label>
           <input type="password" class="av-password" av-message="invalid format" name="confirmpassword" />
           </div>
    
          <button type="submit" class="button button-block" name="submit"/>Get Started</button>
          <input type="hidden" name="selectedstate" id="text_content" value="" />
          </form>

        </div>

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email_login" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password_login" required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="../mails/forgotpassword.php">Forgot Password?</a></p>

          <button class="button button-block" name="submit1"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script  src="js/index.js"></script>
</body>
</html>
