
<?php
include '../config.php';
CheckLogout();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<style>
    body {
        font-size: 28px;
    }

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
<body>
<ul>
        <li class=" active li"><a href="../user_home.php" class="nav-link">Home</a></li>
        <li class="nav-item li"><a href="../profile.php" class="nav-link">Profile</a></li>
        <li class="nav-item li"><a href="../editProfile.php" class="nav-link">Edit Profile</a></li>
        <li class="nav-item li"><a href="../reservation/index.php" class="nav-link">Reservation</a></li>
        <li class="nav-item li"><a href="../reservedticket.php" class="nav-link">Reserved Details</a></li>
        <li class="nav-item li"><a href="../food/allcatering.php" class="nav-link">Food</a></li>
        <li class="nav-item li"><a href="../cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class="nav-item li"><a href="../logout.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
    <h2 style="color: green"> STEP 3</h2>
    <?php
    include '../../dbcon.php';
    $user = $_SESSION['email'];
    $catering = $_SESSION['catering'];

    ?>
    <!-- </table> -->



    <form action="" name="form1" method="post">

        <?php
        include '../../dbcon.php';
        ?>
        <table width="100%" border="0">

            <tr>
                <td>
                    <?php
                    $sql = mysqli_query($con, "select * from reservation where user='$user'&&payment='paid'");
                    while ($row = mysqli_fetch_array($sql)) {
                        $pnr = $row['pnrnumber'];
                        $from = $row['frm'];
                        $to = $row['tothe'];
                        $date = $row['dat'];
                        $class = $row['cls'];
                        $coach = $row['coach'];
                        $berth = $row['berth'];

                        $train = mysqli_query($con, "select * from train where trainId='$row[1]'");
                        while ($row1 = mysqli_fetch_array($train)) {
                            $trainName = $row1[2];
                            $trainId = $row1[1];
                        }
                    }
                    $rate = $_SESSION["foodrate"];
                    $rowcount=mysqli_num_rows($sql);
                    if ($rowcount>0) {
                        ?>

                    <table width="100%" border="0">

                        <tr>
                            <td>Train Number:
                                <?php


                                echo $trainId; ?>
                            </td>
                            <td>Train Name :<?php echo $trainName; ?></td>
                            <td>PNR:&nbsp;<?php echo 1000000000 + $pnr; ?></td>
                        </tr>
                        <tr>
                            <td>From:<?php echo $from; ?></td>
                            <td>To:<?php echo $to; ?></td>
                            <td>Date:<?php echo $date; ?></td>
                        </tr>
                        <tr>
                            <td>Class:<?php echo $class; ?></td>
                            <td>Coach:<?php echo $coach; ?></td>
                            <td>Berth:<?php echo $berth; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <?php
                            $bystanders = mysqli_query($con, "select * from  bystander where user ='$user'");
                        while ($bystander = mysqli_fetch_array($bystanders)) {
                            $seat = $bystander['seatnum'];
                        } ?>
                            <td>Seat:<?php echo $seat; ?></td>
                            <td>Email:<?php echo $user; ?></td>

                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>


        </table>
        <?php
                    }
                    else{
                        echo "Please book train ticket";
                    }
        if (isset($_POST["submit"])) {
            // echo $pnr;
            $number = $_POST["number"];
            $csv = $_POST["csv"];
            $dat = $_POST["dtpicker"];
            $chname = $_POST["chname"];

            $numlength = strlen((string)$number);
            $csvlen = strlen((string)$csv);
            function isDate($string)
            {
                $matches = array();
                $pattern = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/';
                if (!preg_match($pattern, $string, $matches)) return false;
                if (!checkdate($matches[2], $matches[1], $matches[3])) return false;
                return true;
            }
            function nameCheck($name)
            {
                 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                  return false;
                  
              }
              else
              {
                  return true;
              }
            }
        //    echo isDate($dat);
        //    echo nameCheck($chname);

            if (isDate($dat)&&nameCheck($chname)) {
                    // echo " select * from payment where cardnumber ='$number' && csv= '$csv'&&exp ='$dat'&&cashholder='$chname'";
                    $result = mysqli_query($con, "select * from payment where cardnumber ='$number' && csv= '$csv'&&exp ='$dat'&&cashholder='$chname'");
                    $rowcount = mysqli_num_rows($result);

                    if ($rowcount > 0) {
                            $user =  $_SESSION['email'];
                            $user =  $_SESSION['email'];
                            $food = "";
                            $result = mysqli_query($con, "select * from cart where user='$user'");
                            while ($row = mysqli_fetch_array($result)) {
                                    $food = $row[1] . ',' . $food;
                                }
                            $stat = mysqli_query($con, "insert into foodorder values('','$user','$food','$pnr','$from','$to','$date','$class','$coach','$berth','$rate','$trainId','$trainName','$catering')");

                            // $pnr=$_SESSION['pnrNext'];
                            // echo $pnr;
                            // echo "update  reservation set payment ='paid' where pnrnumber = '$pnr'";
                            // $stat = mysqli_query($con, "update  reservation set payment ='paid' where pnrnumber = '$pnr'");
                            if ($stat) {
                                echo "<script> alert('food booked'); window.print(); window.location='reciept.php'</script>";
                            } else {
                                echo "<script> alert('Error encountered'); window.location='index.php'</script>";
                            }
                        } else {
                            echo "<script> alert('invalid payment details '); window.location='index.php'</script>";
                        }
                }
                else
                {
                    echo "<script> alert('you are not entered a valid card '); </script>";
                  
                }
        }
        ?>

        </br>
        <table align="center" width="40%">
            <tr>
                <td>Card number</td>
                <td><input type="text" name="number" maxlength="16" id=""></td>
            </tr>
            <tr>
                <td>Cash holder name</td>
                <td><input type="text" name="chname" id=""></td>
            </tr>
            <tr>
                <td>CVV</td>
                <td><input type="text" name="csv" maxlength="3" id=""></td>
            </tr>

            <tr>
                <td>Date of expiry</td>
                <td> <input type="text" name="dtpicker" value="" id="datepicker"></td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="submit" name="submit" value="Pay Now" onclick="cardnumber(document.form1.number,document.form1.csv)"></td>
            </tr>
        </table>
    </form>
</body>



</html>