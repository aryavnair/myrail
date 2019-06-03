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

    <ul>
        <li class=" active"><a href="user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="reservation/index.php" class="nav-link">Reservation</a></li>
        <li class=""><a href="#" class="nav-link">Food</a></li>
        <li class=""><a href="cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class=""><a href="#" class="nav-link">Search</a></li>
        <li class=""><a href="logout.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
    <!-- </div> -->


    <table border="1" width="90%">
        <tr>
            <td>PNR Number</td>
            <td>Train Number</td>
            <td>Class</td>
            <td>Date</td>
            <td>Berth</td>
            <td>Status</td>
            <td>Action</td>

            <!-- <td></td> -->
        </tr>

 

    <?php
    include '../dbcon.php';
    $user =$_SESSION['email'];
    $sql = mysqli_query($con, "select * from reservation where user='$user'");
    while ($row = mysqli_fetch_array($sql)) {
echo "<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
<td>$row[3]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>";
if($row[5]=='canceled')
{
    $stat ="";
}
else{
    $stat = "<a href='cancel.php?pnr=$row[0]'>Cancel</a>";
} 
    
   

echo "$stat </td></tr>";

    }
        ?>   </table>
    </body>

    </html>