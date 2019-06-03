    <?php
session_start();

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
    <li class="nav-item active"><a href="user_home.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="profile.php" class="nav-link">View Profile</a></li>
	          <li class="nav-item"><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item"><a href="reservation/index.php" class="nav-link">Reservation</a></li>
	          <li class="nav-item"><a href="food/allcatering.php" class="nav-link">Food</a></li> 
	          <li class="nav-item"><a href="cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class=""><a href="#" class="nav-link">Search</a></li>
        <li class=""><a href="../index.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>

    <?php
    echo " <table border='1'>
                    <tr>
                        <td>Train Number</td>
                        <td>Name</td>
                        <td>From</td>
                        <td>To</td>                    
                        <td>Check availability</td>

                    </tr>"; 
                        include '../../dbcon.php';
                        $from = $_POST["from"];
                        $to = $_POST["to"];
                        $class = $_POST['class'];
                        $bert = $_POST['berth'];
                        $adult =$_POST["adult"];
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
$_SESSION["rate"]=$rate*$adult;
                      
                echo"    </table>";  ?>
</body>
</html>

koiiiii


