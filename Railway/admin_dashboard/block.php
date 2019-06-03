<?php
echo $id = $_GET["id"];
include '../dbcon.php';

$query = mysqli_query($con, "select * from login where loginID='$id' ");
$count = 0;
while ($row = mysqli_fetch_array($query)) 
{

  if ($row['status'] == '1')
  {
    $result = mysqli_query($con, "update login set status= '0' where loginID='$id' ");
    if ($result)
     {
      echo "<script> alert('User blocked successfully'); window.location='userview.php'</script>";
    }
  }
    elseif($row['status'] == '0')
    {
      $result = mysqli_query($con, "update login set status= '1' where loginID='$id' ");
      if ($result) 
      {
        echo "<script> alert('User unblocked successfully'); window.location='userview.php'</script>";
      }
     
    }
  }







?>
