<?php

include '../dbcon.php';
$user = $_REQUEST['user'];
$result = mysqli_query($con,"delete from cart where user='$user'");
echo "<script>  window.location='viewfood.php'</script>";

?>