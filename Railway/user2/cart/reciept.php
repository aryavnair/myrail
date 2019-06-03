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
<br>
<br>
<br>
    <?php
include '../../dbcon.php';
$user = $_SESSION['email'];

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
<table width="100%" border="0">
    
    <tr>
      <td>Train Number:
      <?php
      
      
      echo $trainId;
     ?>
      </td>
      <td>Train Name :<?php echo $trainName ;?></td>
      <td>PNR:&nbsp;<?php echo 1000000000+ $pnr ;?></td>
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
<?php
if (isset($_POST["submit"])) {
// echo $pnr;
$number = $_POST["number"];
$csv = $_POST["csv"];
$dat = $_POST["dtpicker"];
$chname= $_POST["chname"];
echo " select * from payment where cardnumber ='$number' && csv= '$csv'&&exp ='$dat'&&cashholder='$chname'";
$result = mysqli_query($con, "select * from payment where cardnumber ='$number' && csv= '$csv'&&exp ='$dat'&&cashholder='$chname'");
$rowcount = mysqli_num_rows($result);

if($rowcount>0)
{
    $user =  $_SESSION['email'];
    $food ="";
    $result = mysqli_query($con, "select * from cart where user='$user'");
    while($row= mysqli_fetch_array($result))
    {
        $food= $row[1].','.$food;
    }
    $stat = mysqli_query($con,"insert into foodorder values('','$user','$food','$pnr','$from','$to','$date','$class','$coach','$berth','$rate','$trainId','$trainName')");
    
    // $pnr=$_SESSION['pnrNext'];
    // echo $pnr;
    // echo "update  reservation set payment ='paid' where pnrnumber = '$pnr'";
    // $stat = mysqli_query($con, "update  reservation set payment ='paid' where pnrnumber = '$pnr'");
    if ($stat) {
        echo "<script> alert('food booked'); window.print(); window.location='index.php'</script>";
    } else {
        echo "<script> alert('Error encountered'); window.location='index.php'</script>";
    }
}
else
{
    echo "<script> alert('invalid payment details '); window.location='index.php'</script>";
}
}
?>
 
</br>

<?php
$sql= mysqli_query($con,"select * from foodorder where user='$user'");
while($row = mysqli_fetch_array($sql))
{
 $food = $row['food'];
$rate = $row['rate'];

}
 ?>   <table align="center" width="40%">
        <tr>
            <td>Food</td>
            <td><?php echo $food ?></td>
        </tr>
        <tr>
            <td>Rate</td>
            <td><?php echo $rate?></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="button" value="print" onclick="window.print()"></td>
        </tr>
    </table>
    </form>
</body>



</html>