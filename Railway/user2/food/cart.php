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
    include '../../dbcon.php';
    $food=$_POST["food"];
    $rate = $_POST["rate"];
    $catering =$_POST["catering"];
    $quantity= $_POST["quantity"];
    $user =$_SESSION["email"];
    echo "insert into cart values('','$food','$rate','$quantity','$user')";
    $result = mysqli_query($con,"insert into cart values('','$food','$rate','$quantity','$user')");
    echo "<script>  window.location='buyfood.php?id=$catering'</script>";
    ?>
</body>

</html> 