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

<body>
    <?php
    include '../dbcon.php';
    $fid = $_REQUEST['fid'];
    $rate = $_REQUEST['rate'];
    $food = $_REQUEST['food'];
    // echo $food;
    $user =$_SESSION["email"];
    $result = mysqli_query($con,"insert into cart values('','$fid','$rate','$food','$user')");
    echo "<script>  window.location='viewfood.php'</script>";
    ?>
</body>

</html>