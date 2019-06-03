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

    <form action="" method="post">
        <?php
        include '../dbcon.php';
        ?>
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
        <!-- </div> --><br>

        <?php

        $user = $_SESSION["email"];
        ?>
        <table width="40%" align="center">
            <tr>
                <td colspan="3" align="center">Available Foods</td>

            </tr>
            <tr>
                <td>Food</td>
                <td>Type</td>
                <td>Rate</td>
                <td></td>
            </tr>

            <?php
            $sql = mysqli_query($con, "select * from food");
            while ($row = mysqli_fetch_array($sql)) {
                echo "<tr>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td><a href='cart.php?fid=$row[0]&&rate=$row[3]&&food=$row[1]'>";
                $result = mysqli_query($con, "select * from cart where user='$user'&&fid='$row[0]'");
                $rowcount = mysqli_num_rows($result);
                $itemStat = $rowcount > 0 ? 'Added' : 'Add to cart';

                echo "
                
               $itemStat </a></td>
            </tr>";
            }


            ?>



    </form>Total Amount:<?php

                        $result = mysqli_query($con, "select * from cart where user='$user'");
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total = $total + $row[2];
                        }
                        echo $total;
                        ?>
    <br>
    <a href="clearcart.php?user=<?php echo $user ?>">Clear Cart</a>
    <br>
    <a href="foodpayment.php?user=<?php echo $user ?>">Check Out</a>
</body>

</html>