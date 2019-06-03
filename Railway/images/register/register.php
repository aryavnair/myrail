<?php
include '../dbcon.php';



if (isset($_POST['submit'])) {
  $firstName = $_POST["fname"];
  $lastName = $_POST["lname"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $mobile = $_POST["mobile"];
  $password = $_POST['password'];

  $district = $_POST["district"];
  $state = $_POST["selectedstate"];
  $image = $_POST["image"];
  
  // $sqls = "SELECT email FROM register WHERE email =$email";


  $results = mysqli_query($con, "SELECT * FROM user WHERE email ='$email'");
  $count = mysqli_num_rows($results);

  if ($count == 0) {
    mysqli_query($con, "insert into user values('','$firstName','$lastName','$email','$gender','$mobile', AES_ENCRYPT('$password','pass'),'$district','$state','$image')");
    mysqli_query($con, "insert into login values('','$email',AES_ENCRYPT('$password','pass'),'user')");
    echo "<script> alert('User Registered successfully'); window.location='register.php'</script>";
  } else {
    echo '<script> alert("User Already registered please login");</script>';
  }

}
?>
<?php

//database connection page


if (isset($_POST["submit1"])) {
  $email = $_POST["email_login"];   //username value from the form
  $pwd = $_POST["password_login"];	//password value from the form


  $res = mysqli_query($con, "select * from login where email='$email' and password = AES_ENCRYPT('$pwd','pass')");  //query executing function
  $count = mysqli_num_rows($res);
  if($count>0)
  {
  $fetch =mysqli_fetch_array($res);
    session_start();
    $_SESSION["user_type"] = $fetch['user_type'];
    $_SESSION["email"] = $email;

    if ($fetch['user_type'] == 'admin') {
      header("location:../admin_dashboard/index.php");	//home page or the dashboard page to be redirected
    } elseif ($fetch['user_type'] == 'user') {
      $_SESSION["email"] = $email;	// setting username as session variable 
      header("location:../user_home.php");
    } elseif ($fetch['user_type'] == 'staff') {
      header("location:../staff_home.php");
    } elseif ($fetch['user_type'] == 'catering') {
      header("location:../catering_home.php");
    }
  } else {
    echo "<script>alert('invalid credentials!'); window.location='register.php'</script>";
  }
} 

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
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
    type: "GET", url: "http://districts.gov.in/doi_service/rest.php/district/" + $('#state :selected').val() + "/json", success: function (data) {
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
strstate="<option>  Select State</option>";
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
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fname" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>

			 <div class="field-wrap">
			 <label>
			  Gender<span class="req">*</span>
			  </label>
			 <input list="gender" name="gender" required autocomplete="off">
			 <datalist id="gender">
  <option value="Male">
  <option value="Female">
  <option value="Others">
</datalist>
         </div>

         <div class="field-wrap">
			 <select id="state" name="state"  onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">

      
  <option value="Male">
  <option value="Female">
  <option value="Others">
</select>
         </div>
         <div class="field-wrap">

			 <!-- <input list="dis" name="dis" required autocomplete="off"> -->
			 <select id="dis" name="district">
<option> Select District </option>
</select>
</div>

<!--<div class="form-wrapper">
      <input type="file" placeholder="Company Icon" name="Icon"class="form-control">
      <i class="zmdi zmdi-email"></i>
     </div>-->


                    
           <div class="field-wrap">
            <label>
              Mobile No<span class="req">*</span>
            </label>
            <input type="mob" name="mobile" required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            <input type="file" name="image" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
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
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block" name="submit1"/>Log In</button>
        
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script  src="js/index.js"></script>
</body>
</html>