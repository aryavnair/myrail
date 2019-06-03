<?php
include 'config.php';
CheckLogout();
?>

<?php
include '../dbcon.php';
$stop = 1;
if (isset($_POST['submit'])) {
  $name = $_POST["name"];
  $licenseno = $_POST["licenseno"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $address = $_POST["address"];
  $district = $_POST["district"];
  $state = $_POST["selectedstate"];
  $password =md5 ($_POST['password']);
  $results = mysqli_query($con, "SELECT * FROM catering WHERE email ='$email'");
  $count = mysqli_num_rows($results);
  if ($count == 0) {
   $q= "insert into catering (name,licenseno,email,mobile,address,district,state)
    values('$name','$licenseno','$email','$mobile','$address','$district','$state')";
    //"ALTER TABLE catering ADD FOREIGN KEY (loginID) REFERENCES login(loginID)";
    mysqli_query($con,$q);
    echo $s=mysqli_insert_id($con);
    echo mysqli_query($con, "insert into login values($s,'$email','$password','catering','1')");
    //echo "<script> alert('Registered successfully'); window.location='registerCatering.php'</script>";
  }
  else {
    echo '<script> alert("Already registered please login");</script>';
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css">
<script src="js/jquery_3.2.1.min.js"> </script>
<script src="js/oh-autoval-script.js"></script>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style>

div {
 padding-bottom:20px;
}
.form-control {
    display: block;
    width: 50%;
    height: 38px;
    padding: 8px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: black;
    background-color: #ffffff;

    border: 1px solid #282828;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
/* margin-left: 230px; */
}
select {
  text-transform: none;
  width: 50%;
  height: 38px;
  color: #060606;
}
</style>
</head>
<body>

    <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Back to Admin</a>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul id="active" class="nav navbar-nav side-nav">
                  <li class="selected"><a href="index.php">Home</a></li>
        
                 <li><a href="registerTrain.php">Register Train</a></li>
                 <li><a href="registerStation.php">Register Station</a></li>
                 <li><a href="registerStop.php">Add Stop</a></li>
                 <li><a href="registercatering.php">Register Catering</a></li>
                 <li><a href="managestation.php">Remove Stop</a></li>
                 <li><a href="userview.php">User Profile</a></li>
                 <li><a href="cateringview.php">Catering Profile</a></li>
                 <li><a href="foodview.php">Food details</a></li>
                
              </ul>
              <ul class="nav navbar-nav navbar-right navbar-user">

                  <li class="dropdown user-dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Admin<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-user"></i>Change Password</a></li>

                          <li class="divider"></li>
                          <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>

                      </ul>
                  </li>
                  <li class="divider-vertical"></li>
                  <li>
                       <!--<form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                        </form>-->
                  </li>
              </ul>
          </div>
      </nav>

       <div>
        <div class="row text-center">
            <h2>New Catering</h2>
        </div>

        <form action="" class="oh-autoval-form" id="catering" onsubmit="return" method ="post">
                <div>
                    <label for="firstname" class="col-md-2">
                    Name
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-name" id="name"  name="name" placeholder="Enter Name">
                    </div>

                </div>
                <div>
                    <label for="firstname" class="col-md-2">
                    License No
                    </label>
                    <div class="col-md-9">
                      <input type="text" class="form-control av-number" id="licenseno"  name="licenseno" placeholder="Enter License No">
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                       Email
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-email" id="email" name="email"  placeholder="Enter Email">
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                      Mobile
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-mobile" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                    </div>

                </div>

                <div>
                    <label for="lastname" class="col-md-2">
                       Address
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-name" id="address" name="address" placeholder="Enter Address">
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                      State
                    </label>
                    <div class="col-md-9">
                    <select id="state" name="state" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text" >
                    </select>
                    </div>

                <div>
                    <label for="country" class="col-md-2">
                       District
                    </label>
                    <div class="col-md-9">
                      <select id="dis" name="district" >
                      <option> Select District </option>
                      </select>
                    </div>

                  </div>
                    <div>
                        <label for="lastname" class="col-md-2">
                           Password
                        </label>
                        <div class="col-md-9">
                            <input type="password" class="form-control av-password" id="password" name="password" placeholder="Enter Password">
                        </div>
                         
                    </div>
                <div class=" row ">
                    <div class=" col-md-2 ">
                    </div>
                    <div class=" col-md-10 ">
                        <button type=" submit " name="submit" class=" btn btn-info ">
                            Register
                        </button>
                        <input type="hidden" name="selectedstate" id="text_content" value="" />
                    </div>
                </div>
              </form>

</body>
</html>
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
