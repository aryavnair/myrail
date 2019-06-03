<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>

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
        <li class=" active"><a href="../user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="../editProfile.php" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="#" class="nav-link">Reservation</a></li>
        <li class=""><a href="#" class="nav-link">Food</a></li>
        <li class=""><a href="#" class="nav-link">PNR status</a></li>
        <li class=""><a href="#" class="nav-link">Cancellation</a></li>
        <li class=""><a href="#" class="nav-link">Search</a></li>
        <li class=""><a href="../../index.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
    <h1>Select Your Catering Agent</h1>
    <table align="center"  cellpadding="20">
        <?php
        include '../../dbcon.php';
        $sql = mysqli_query($con, "select * from catering");
        while ($row = mysqli_fetch_array($sql)) {
            echo " <tr>
                  <td><a href='buyfood.php?id=$row[3]'>$row[1]</a></td>
             
              </tr>";
        }
        ?>
    </table>
    </body> </html>