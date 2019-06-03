<?php
$pnr =$_REQUEST['pnr'];
include '../dbcon.php';
$status=mysqli_query($con,"update reservation set payment='canceled' where pnrnumber='$pnr'");
if ($status) {
    echo "<script> alert('reservation successfully Canceled'); window.location='cancelticket.php'</script>";
} else {
    echo "<script> alert('reservation successfully Canceled'); window.location='cancelticket.php'</script>";
}
?>