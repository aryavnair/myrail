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




    <ul>
        <li class=" active"><a href="user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="#" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="#" class="nav-link">Reservation</a></li>
        <li class=""><a href="#" class="nav-link">Food</a></li>

        <li class=""><a href="#" class="nav-link">Cancellation</a></li>
        <li class=""><a href="#" class="nav-link">Search</a></li>
        <li class=""><a href="../index.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>




    <?php
include '../dbcon.php';
$user = $_SESSION['email'];


?>
 <!-- </table> -->

 <table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>Sl.No</td>
        <td>Name</td>
        <td>Age</td>
        <td>Gender</td>
        <td>Seat N.O </td>
      </tr>
      <?php
      $sql=mysqli_query($con, "select * from bystander where user='$user'");

      $rowCount = mysqli_num_rows($sql);
      $slno=0;
      while($row=mysqli_fetch_array($sql))
      {
        $slno=$slno+1;
      echo "<tr>
        
        <td>$row[5] </td>
        <td>$row[1] </td>
        <td>$row[2] </td>
        <td>$row[3] </td>
        <td>$row[5] </td>
      </tr>";
      }

      ?>
    </table></td>
  </tr>
  <tr>
    <td>
    <?php
    $sql = mysqli_query($con, "select * from reservation where user='$user'&&payment='paid'");
    if(!mysqli_num_rows($sql))
{
  echo 'No details available, Please reserve ticket';
exit;

}
    while ($row = mysqli_fetch_array($sql)) {
        $pnr =$row['pnrnumber'];
        $from =$row['frm'];
        $to =$row['tothe'];
        $date =$row['dat'];
        $class=$row['cls'];
        $coach=$row['coach'];
        $berth=$row['berth'];
        $rate=$row['rate'];
        $train = mysqli_query($con, "select * from train where trainId='$row[1]'");

        while ($row1 = mysqli_fetch_array($train)) {
            $trainName= $row1[2];
            $trainId= $row1[1];
        }
    }
    ?>
<table width="100%" border="1">

      <tr>
        <td>Train Number:
        <?php


        echo $trainId;
       ?>
        </td>
        <td>Train Name :<?php echo $trainName ;?></td>
        <td>PNR:&nbsp;<?php echo  $pnr ;?></td>   <!--1000000000+-->
      </tr>
      <tr>
        <td>From:<?php echo $from ;?></td>
        <td>To:<?php echo $to ;?></td>
        <td>Date:<?php echo $date ;?></td>
      </tr>
      <tr>
        <td>Class:<?php echo $class ;?></td>
        <td>Coach:<?php echo $coach ;?></td>
        <td>Berth:<?php echo $berth ;?></td>
        <td></td>
      </tr>
      <tr>
        <td>Rate:<?php echo $rate ;?></td>
      <td>Email:<?php echo $user ;?></td>

        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>


</table>
    </body>

    </html>
