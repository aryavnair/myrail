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
        <li class=" active"><a href="user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="#" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="#" class="nav-link">Reservation</a></li>
        <li class=""><a href="#" class="nav-link">Food</a></li>
        <li class=""><a href="#" class="nav-link">PNR status</a></li>
        <li class=""><a href="#" class="nav-link">Cancellation</a></li>
        <li class=""><a href="#" class="nav-link">Search</a></li>
        <li class=""><a href="../index.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
<form action="" method="post">
<?php
include '../dbcon.php';
$pnr=$_SESSION['pnrNext'];
    // echo $pnr;
if (isset($_POST["submit"]))
{
    
    $number = $_POST["number"];
    $csv = $_POST["csv"];
    $dat = $_POST["dtpicker"];

    $result = mysqli_query($con, "select * from payment where cardnumber ='$number' && csv= '$csv'&&exp ='$dat'");
    $rowcount = mysqli_num_rows($result);
    echo $rowcount;
if($rowcount>0)
{
    $pnr=$_SESSION['pnrNext'];
    echo $pnr;
    echo "update  reservation set payment ='paid' where pnrnumber = '$pnr'";
    $stat = mysqli_query($con, "update  reservation set payment ='paid' where pnrnumber = '$pnr'"); 
    echo $stat;
    if ($stat) {

       echo "<script> alert('Booking succeess please wait for the Email'); window.location='reservation.php'</script>";
    } else {
        echo "<script> alert('Error encountered'); window.location='reservation.php'</script>";
    }
}
else
{
    echo "<script> alert('invalid payment details'); window.location='reservation.php'</script>";
}
}
?>
    <h2 style="color: green"> STEP 3</h2>
    <?php
    $rate=$_SESSION['rate'];
echo "Rate $rate ";
    ?>
    <table align="center" width="40%">
        <tr>
            <td>Card number</td>
            <td><input type="text" name="number" id=""></td>
        </tr>
        <tr>
            <td>CSV</td>
            <td><input type="text" name="csv" id=""></td>
        </tr>

        <tr>
            <td>Date of expiry</td>
            <td> <input type="text" name="dtpicker" value="" id="datepicker"></td>
        </tr>
        <tr>
            <td></td>
            <td>  <input type="submit" name="submit" value="Pay Now"></td>
        </tr>
    </table>
    </form>
</body>


</html>