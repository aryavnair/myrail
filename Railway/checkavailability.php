<?php
session_start();
?>
<?php
include '../dbcon.php';
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
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>
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


    <!-- <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
</ul> -->

  
    <!-- </div> -->



    <?php
    include '../dbcon.php';
    $trainID = $_REQUEST['trainid'];
    $class = $_REQUEST['class'];
    $berth = $_SESSION['berth'];
    // echo $berth;
    $user = $_SESSION["email"];


    ?>
    <form action="" name="form1" method="post">
        <?php

        if (isset($_POST["submit"])) {
            include '../dbcon.php';
            $date = $_POST["dtpicker"];
            // echo "select * from reservation where trainid='$trainID'&&cls='$class'&&dat='$date'&&berth='$berth'";
            $result = mysqli_query($con, "select * from reservation where trainid='$trainID'&&cls='$class'&&dat='$date'&&berth='$berth'");
            $rowcount = mysqli_num_rows($result);
            // printf("Result set has %d rows.\n", $rowcount);
            $remaining = 60 - $rowcount;
            if ($rowcount < 60) {

                $stat = mysqli_query($con, "insert into reservation values('','$trainID','$class','$date','$berth','notpaid','$user')");
                if ($stat) {

                    echo "<script> window.location='payment.php'</script>";
                    $sql = mysqli_query($con, "select pnrnumber from reservation");
                while ($row = mysqli_fetch_array($sql)) {
                    $pnrNext =$row[0];
                }
                $_SESSION['pnrNext']=$pnrNext;
                } else {
                    echo "<script> alert('Error encountered'); window.location='reservation.php'</script>";
                }
            }
        }
        ?>
        <div class="row1">
            <div class="colum1">STEP 2</div>
        </div>
        <div class="row1">
            <div class="colum1">Booking Date</div>
            <div class="colum2">
                <input type="text" name="dtpicker" value="" id="datepicker">
                <input type="submit" name="submit" value="Book Ticket">

                <!-- <?php
                        $result = mysqli_query($con, "select * from reservation where trainid='$trainID'&&cls='$class'&&dat='$date'&&berth='$berth'");
                        $rowcount = mysqli_num_rows($result);
                        echo $rowcount;
                        ?> -->

            </div>
        </div>
    </form>
</body>

</html>
