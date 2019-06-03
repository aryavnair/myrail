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
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#fromtxt,#totxt").autocomplete({
            source: "autocomplete.php",
        });
    });
</script>

<body>
    <form name="form1" action="" method="post">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="../index.php"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>


            </div>
        </nav>
        <!-- END nav -->

        <div class="hero-wrap js-fullheight" style="background-image:  url(images/bg_7.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlaky"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true" style="    background-color: black;
    color: white;">
                    <style>
                        .row1 {
                            display: flex;
                            width: 59%;
                            height: 10.4 %;
                            /*justify-content: space-between;*/
                            background-color: #ffffff;
                            margin: auto 15%;
                            /*padding: 0.7%;*/
                            line-height: 5.0;
                            color: #111010;
                            padding-left: 11%;
                        }

                        .colum1 {
                            width: 40%;

                        }

                        .colum2 {
                            width: 40%;


                        }
                    </style>


                    <?php
                    include 'dbcon.php';
                    include("header.php");

                    ?>

                    <div class="row1" style="margin-top:200px">
                        <div class="colum1">FROM</div>
                        <div class="colum2">
                            <div class="ui-widget">

                                <input id="fromtxt" name="from">
                            </div>

                        </div>
                    </div>
                    <div class="row1">
                        <div class="colum1">TO</div>
                        <div class="colum2">    <div class="ui-widget">

                               <input id="totxt" name="to">
                           </div></div>
                    </div>
                    <!-- <div class="row1">
                        <div class="colum1">Booking Date</div>
                        <div class="colum2">
                            <select name ="day">
                                <option>Day
                                </option>
                                <?php

                                for ($i = 0; $i < 32; $i++) {
                                    echo "  <option>$i                         </option>";
                                }

                                ?>
                            </select>
                            <select name="month">
                                <option>Month
                                </option>
                                <?php

                                for ($i = 0; $i < 13; $i++) {
                                    echo "  <option>$i                         </option>";
                                }

                                ?>
                            </select>
                            <select name="year">
                                <option>Year
                                    <?php

                                    for ($i = 2019; $i < 2025; $i++) {
                                        echo "  <option>$i                         </option>";
                                    }

                                    ?>
                                </option>
                            </select>


                        </div>
                    </div> -->
                    <div class="row1">
                        <div class="colum1">Class</div>
                        <div class="colum2"><select name="class">
                                <option>Select
                                </option>
                                <option>1A</option>
                                <option>2A </option>
                                <option>3A </option>
                                <option>EC</option>
                                <option>FC</option>
                                <option>CC</option>
                                <option>SL</option>
                            </select></div>
                    </div>
                    <div class="row1">
                        <div class="colum1">Berth</div>
                        <div class="colum2"><select name="berth">
                                <option>Select</option>
                                <option value='upperberth'>upper</option>
                                <option value="midberth">middle </option>
                                <option value="lowerberth">lower </option>

                            </select></div>
                    </div>
                    <div class="row1">
                        <div class="colum1"></div>
                        <div class="colum2">
                            <input type="submit" value="Find Train" name="submit">
                        </div>
                    </div>
                    <br>
                </div>

                <br>
                <br>


                <table border="1">
                    <tr>
                        <td>Train Number</td>
                        <td>Name</td>
                        <td>From</td>
                        <td>To</td>
                        <td>Check availability</td>

                    </tr>
                    <?php
                    if (isset($_POST["submit"])) {
                        $from = $_POST["from"];
                        $to = $_POST["to"];
                        $class = $_POST['class'];
                        $bert = $_POST['berth'];
                        $trainFrom = array();
                        $trainTo = array();

                        $_SESSION['class'] = $class;
                        $_SESSION['berth'] = $bert;
                        $sql = mysqli_query($con, "select distinct * from stop where station='$from'");
                        while ($row = mysqli_fetch_array($sql)) {
                            array_push($trainFrom, $row[1]);
                        }
                        $sql1 = mysqli_query($con, "select distinct * from stop where station='$to'");
                        while ($row1 = mysqli_fetch_array($sql1)) {
                            array_push($trainTo, $row1[1]);
                        }

                        $countFrom = count($trainFrom);
                        $countTo = count($trainTo);
                        for ($n = 0; $n < $countFrom; $n++) {

                            for ($m = 0; $m < $countTo; $m++) {
                                if ($trainFrom[$n] == $trainTo[$m]) {
                                    $query = mysqli_query($con, "select * from train where train_name='$trainFrom[$n]'");
                                    // echo $query;
                                    while ($row = mysqli_fetch_array($query)) {
                                        //    echo $class;
                                        $cls = $row[$class];
                                        $berth = $row[$bert];
                                        if ($cls == 'true' && $berth == 'true') {
                                            echo " <tr>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[6]</td>
                                    <td>$row[7]</td>
                                    <td><a href='checkavailability.php?trainid=$row[0]&class=$class'>check</a></td>
                                </tr>";
                                        }
                                    }
                                }
                            }

                        }

$sql = mysqli_query($con, "select * from distance where frm ='$from' && nxtstop='$to'");
while($row=mysqli_fetch_array($sql))
{
    $rate= $row[2]*15;
}
$_SESSION["rate"]=$rate;
                        ?>
                    </table>

                    <!-- <table>

                                                    <tr>
                                                    <td>Trane Name</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr></table> -->
                </div>

            <?php

        }
        ?>
        </div>
        <!-- loader -->

    </form>



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
    <script src="../js/main.js"> </script>

</body>

</html>
