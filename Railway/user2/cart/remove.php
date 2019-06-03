<?php

include '../../dbcon.php';
$id = $_REQUEST['id'];
$result = mysqli_query($con,"delete from cart where  itemno='$id'");
echo "<script>  window.location='index.php'</script>";

?>