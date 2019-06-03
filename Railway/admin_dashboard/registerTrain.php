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
            padding-bottom: 20px;
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
            <div class="row text-center">
                <h2>New Train</h2>
            </div>
            <?php
            include '../dbcon.php';
            $stop = 1;
            error_reporting("notice");
            if (isset($_POST['submit'])) {
                $trainNumber = $_POST["trainNumber"];
                $trainName = $_POST["trainName"];
                $arival = $_POST["arival"];
                $depature = $_POST["depature"];
                $distance = $_POST["distance"];
                $source = $_POST["source"];
                $destination = $_POST["destination"];
                $type =$_POST["type"];

                $_1A = $_POST["1A"] == "true" ? "true" : "false";
                $_2A = $_POST["2A"] == "true" ? "true" : "false";
                $_3A = $_POST["3A"] == "true" ? "true" : "false";
                $CC = $_POST["CC"] == "true" ? "true" : "false";;
                $SL = $_POST["SL"] == "true" ? "true" : "false";
                $upper = $_POST["upper"] == "true" ? "true" : "false";;
                $lower = $_POST["lower"] == "true" ? "true" : "false";;
                $middle = $_POST["middle"] == "true" ? "true" : "false";

              echo  $status = mysqli_query($con, "insert into train values('','$trainNumber','$trainName','$arival','$depature','$distance','$source','$destination','$_1A','$_2A','$_3A','$CC','$SL','$upper','$middle','$lower','$type')");
                if ($status) {
                    echo "<script> alert('Train Registered successfully'); window.location='registerTrain.php'</script>";
                } else {
                   echo "<script> alert('Train Not Registered successfully'); window.location='registerTrain.php'</script>";
                }
            }
            ?>
            <form action="" name="train" id="train" onsubmit="return" method="post">
                <div>
                    <label for="firstname" class="col-md-2">
                        Train Number
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-number" id="trainNumber" name="trainNumber" placeholder="Enter Train Number">
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                        Train Name
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-name" id="trainName" name="trainName" placeholder="Enter Train Name">
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                        Araival Time
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-number" id="arraivalTime" name="arival" placeholder="Enter Araival Time">
                    </div>

                </div>

                <div>
                    <label for="lastname" class="col-md-2">
                        Depature Time
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-number" name="depature" placeholder="Enter Depature time">
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                        Distance
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control av-number" name="distance" placeholder="Enter distance">
                    </div>

                </div>

                <div>
                    <label for="country" class="col-md-2">
                        Source Station
                    </label>
                    <div class="col-md-9">
                        <select name="source" id="source" class="form-control av-name">
                            <option>--Please Select--</option>
                            <?php

                            $sql = mysqli_query($con, "select * from station");

                            while ($row = mysqli_fetch_array($sql)) {
                                echo "<option> $row[1]</option>";
                            }
                            ?>



                        </select>
                    </div>
                </div>
                <div>

                    <label for="country" class="col-md-2">

                        Destination Station
                    </label>
                    <div class="col-md-9">
                        <select name="destination" id="destination" class="form-control av-name">
                            <option>--Please Select--</option>

                            <?php

                            $sql = mysqli_query($con, "select * from station");

                            while ($row = mysqli_fetch_array($sql)) {
                                echo "   <option>$row[1]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div>

                    <label for="country" class="col-md-2">

                       Type
                    </label>
                    <div class="col-md-9">
                        <select name="type" id="type" class="form-control av-name">
                            <option>--Please Select--</option>
                            <option>Passenger</option>
                            <option>Super Fast</option>
                            
                        </select>
                    </div>
                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                        Class
                    </label>
                    <div class="col-md-9">
                        <input type="checkbox" value="true" name="1A" id="">1A
                        <!-- <input type="checkbox" value="true" name="EC" id="">EC -->
                        <input type="checkbox" value="true" name="2A" id="">2A
                        <!-- <input type="checkbox" value="true" name="FC" id="">FC -->
                        <input type="checkbox" value="true" name="3A" id="">3A
                        <input type="checkbox" value="true" name="CC" id="">CC
                        <input type="checkbox" value="true" name="SL" id="">SL
                    </div>

                </div>
                <div>
                    <label for="lastname" class="col-md-2">
                        Berth
                    </label>
                    <div class="col-md-9">
                        <input type="checkbox" name="upper" value="true" name="upper" id="">UPPER
                        <input type="checkbox" name="middle" value="true" name="middle" id="">MIDDLE
                        <input type="checkbox" name="lower" value="true" name="lower" id="">LOWER

                    </div>

                </div>

                <div class=" row ">
                    <div class=" col-md-2 ">
                    </div>
                    <div class=" col-md-10 ">
                        <button type=" submit " name="submit" class=" btn btn-info ">
                            Register
                        </button>
                    </div>
                </div>
            </form>





        </div>
    </div>
    </form>
</body>

</html>