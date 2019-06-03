
<?php
include 'config.php';
CheckLogout();
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
        <?php
        include '../dbcon.php';
        if (isset($_POST['submit'])) {
            $station = $_POST["station"];
            $contact = $_POST["contact"];
            $address = $_POST["address"];
            $result=mysqli_query($con, "insert into station values('','$station','$contact','$address')");
            if($result)
            {
                echo "<script> alert('Station Registered successfully'); window.location='registerStation.php'</script>";
            }
            else{
                echo "<script> alert('Station Not Registered successfully'); window.location='registerStation.php'</script>";
            }




        }
        ?>
           <form action="" id="station" name="station" onsubmit="return" method="post">
        <div class="row text-center">
            <h2>New Station</h2>
        </div>
        <div>
            <label for="firstname" class="col-md-2">
               STATION NAME
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control av-name" name="station" id="station" placeholder="Enter STATION NAME">
            </div>
        </div>
        <div>
            <label for="lastname" class="col-md-2">
                CONTACT NUMBER
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control av-phone" name="contact" id="lastname" placeholder="Enter CONTACT NUMBER">
            </div>
        </div>
        <div>
            <label for="lastname" class="col-md-2">
                ADDRESS
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control av-name"  name ="address" id="address" placeholder="Enter ADDRESS">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" name="submit" class="btn btn-info">
                    Register
                </button>
            </div>
        </div>
    </div>
    </div>
    </form>
</body>
</html>
