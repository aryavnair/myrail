<?php
include 'config.php';
CheckLogout();
?>

<?php
session_start();
?>
<?php
include '../dbcon.php';
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
            background-image: none;
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
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <span class="educate-icon educate-library icon-wrap"></span>
                            <span class="mini-click-non">Registration</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All Library" href="registercatering.php">
                                    <span class="mini-sub-pro">Catering</span></a></li>
                            <li><a title="All Library" href="registerTrain.php">
                                    <span class="mini-sub-pro">Trains</span></a></li>
                            <li><a title="All Library" href="registerStation.php">
                                    <span class="mini-sub-pro">Stations</span></a></li>
                            <li><a title="All Library" href="registerStop.php">
                                    <span class="mini-sub-pro">Route</span></a></li>

                        </ul>
                    </li>
                    <li><a href="userview.php">User Profile</a></li>
                    <li><a href="cateringview.php">Catering Profile</a></li>
                    <li><a href="foodlist.php">Food details</a></li>
                    <li><a href="#">Complaints</a></li>
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
                        <form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div>
            <div class="row text-center">
                <h2>Food list</h2>
            </div>


            <table width="40%" align="center">
                <tr>
                    <td colspan="3" align="center">Available Foods</td>

                </tr>
                <tr>
                    <td>Food</td>
                    <td>Type</td>
                    <td>Rate</td>
                    <td></td>
                </tr>

                <?php
                $sql = mysqli_query($con, "select * from food");
                while ($row = mysqli_fetch_array($sql)) {
                    echo "<tr>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>

            </tr>";
                }

                ?>
                </form>

</body>

</html>
