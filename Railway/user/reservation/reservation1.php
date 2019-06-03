
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
        <li class=" active"><a href="../user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="../profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="../editProfile.php" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="../reservation/index.php" class="nav-link">Reservation</a></li>
        <li class="nav-item"><a href="../reservedticket.php" class="nav-link">Reserved Details</a></li>
		<li class=""><a href="../food/allcatering.php" class="nav-link">Food</a></li>
        <li class=""><a href="../cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class=""><a href="../logout.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>

    <?php
echo " <table border='1'>
                    <tr>
                        <td>Train Number</td>
                        <td>Name</td>
                        <td>From</td>
                        <td>To</td>
                        <td>Remaining</td>
                        <td>Book</td>

                    </tr>";
include '../../dbcon.php';
$from = $_POST["from"];
$to = $_POST["to"];
$class = $_POST['class'];
$date = $_POST['datetxt'];
$bert = $_POST['berth'];
$user = $_SESSION["email"];
$adult = $_POST["adult"];
$trainFrom = array();
$trainTo = array();
$_SESSION['from'] = $from;
$_SESSION['to'] = $to;
$_SESSION['class'] = $class;
$_SESSION['berth'] = $bert;
$_SESSION['adult'] = $adult;
$_SESSION['date'] = $date;
$classrate = -1;
$remaining=-1;
$coach = null;

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
            //echo "$trainFrom[$n] == $trainTo[$m]";
            $query = mysqli_query($con, "select * from train where train_name='$trainFrom[$n]'");
            // echo "select * from train where train_name='$trainFrom[$n]'";
            while ($row = mysqli_fetch_array($query)) {
                //    echo $class;
                $cls = $row[$class];
                $berth = $row[$bert];
                $typ = $row['type'];
                if ($cls == 'true' && $berth == 'true') {
                    echo " <tr>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[6]</td>
                                    <td>$row[7]</td>";
                    ?>
<?php
$trainID = $row[0];

                    // echo "select * from reservation where trainid='$trainID'&&cls='$class'&&dat='$date'&&berth='$berth'";
                    // echo "select * from reservation where trainid='$row[0]'&&cls='$class'&&dat='$date'&&berth='$bert'";
                    $result = mysqli_query($con, "select * from reservation where trainid='$row[0]'&&cls='$class'&&dat='$date'&&berth='$bert'");
                    $rowcount = mysqli_num_rows($result);
                    // printf("Result set has %d rows.\n", $rowcount);
                    $_SESSION['allocated'] =$rowcount+1;
                    if ($typ == 'passenger') {
                        switch ($class) {
                            case '1A':
                                $remaining = 18 - ($rowcount);
                                $classrate = 60;
                                $coach = "H1";
                                break;
                            case '2A':
                                $remaining = 92 - ($rowcount);
                                $classrate = 50;
                                $coach = "A" . (2 - ($remaining / 46));
                                break;
                            case '3A':
                                $remaining = 192 - ($rowcount);
                                $classrate = 40;
                                $coach = "B" . (3 - ($remaining / 64));
                                break;
                            case 'SL':
                                $remaining = 720 - ($rowcount);
                                $classrate = 10;
                                $coach = "S" . (10 - ($remaining / 72));
                                break;
                            case 'CC':
                                $remaining = 56 - ($rowcount);
                                $classrate = 200;
                                $coach = "C1";
                                break;
                        }
                    } 
                    elseif ($typ == "Super Fast") {
                        switch ($class) {
                            case '1A':
                                $remaining = 18 - ($rowcount);
                                $classrate = 160;
                                $coach = "H1";
                                break;
                            case '2A':
                                $remaining = 92 - ($rowcount);
                                $classrate = 140;
                                $coach = "A" . (2 - ($remaining / 46));
                                break;
                            case '3A':
                                $remaining = 192 - ($rowcount);
                                $classrate = 120;
                                $coach = "B" . (3 - ($remaining / 64));
                                break;
                            case 'SL':
                                $remaining = 720 - ($rowcount);
                                $classrate = 100;
                                $coach = "S" . (10 - ($remaining / 72));

                                break;
                            case 'CC':
                                $remaining = 56 - ($rowcount);
                                $classrate = 300;
                                $coach = "C1";
                                break;

                        }
                    }

                    echo "<td>$remaining</td>";
                    if ($remaining <= 0) {
                        echo "<td> Ticket not  available </td></tr>";
                    } else {
                        echo "<td><a href='payment.php?trainid=$trainID'>Book</a></td></tr>";
                    }
                }
               
            }

        }
    }
}

//echo "</table>";
//if($coach==null)
//{
  //  echo "<script> alert('No train matched with your requirment ') ; window.location='index.php'</script>";
//}
$f="select * from distance where frm ='$from' && nxtstop='$to'";
$sql = mysqli_query($con, $f);
$rate = 1;
while ($row = mysqli_fetch_array($sql)) {
       $rate = $classrate * $row[3]*$adult;
}
//$sql = mysqli_query($con, "select * from distance where frm ='$to' && nxtstop='$from'");
//while ($row = mysqli_fetch_array($sql)) {
  // $rate = $classrate * $row[3]*$adult;
//}
if ($rate>0) {
    $_SESSION['rate'] = $rate;
    $_SESSION['coach'] = $coach;
}
else{
    echo "<script> alert('No train matched with your requirment ') ; window.location='index.php'</script>";
}
?>

</body>
</html>




