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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="../user/reservation/css/style.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>


<!-- <link rel="stylesheet" href="css/style.css"> -->

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

    .li {
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
<script>
    $(function() {
        $("#fromtxt,#totxt").autocomplete({
            source: "autocomplete.php",
        });
    });
</script>
<body>


    <!-- <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
</ul> -->
    <form action="" method="post" enctype="multipart/form-data">
        <?php 
        include '../dbcon.php';
       


        ?>
       <!-- <ul>
            <li class="nav-item active   li"><a href="catering_home.php" class="nav-link">Home</a></li>
            <li class="nav-item li" ><a href="#" class="nav-link">Edit Profile</a></li>
            <li class="nav-item li"><a href="#" class="nav-link">Change password</a></li>
            <li class="nav-item li"><a href="#" class="nav-link">Food status</a></li>
            <li class="nav-item li"><a href="#" class="nav-link">Order details</a></li>
            <li class="nav-item li"><a href="addfood.php" class="nav-link">Add food</a></li>
            <li class="nav-item li"><a href="../index.php" class="nav-link">logout</a></li>
        </ul>-->
        <ul >
	          <li class="nav-item active li"><a href="catering_home.php" class="nav-link">Home</a></li>
	          <li class="nav-item li"><a href="profile.php" class="nav-link">Profile</a></li>
              <li class="nav-item li"><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item li"><a href="menu.php" class="nav-link">Food list</a></li>
	          <li class="nav-item li"><a href="vieworders.php" class="nav-link">Order details</a></li>
	          <li class="nav-item li"><a href="addfood.php" class="nav-link">Add food</a></li>
			  <li class="nav-item li"><a href="logout.php" class="nav-link">logout</a></li>
	        </ul>
        <!-- </div> --><br>
        <table align="center" width="75%">
    <tr><td>Name</td>
    <td>Type</td>
    <td>Rate</td>
    <td>Image</td>

</tr>
      <?php
      $user=$_SESSION["email"];
$sql= mysqli_query($con,"select * from food where catering='$user'");
while($row=mysqli_fetch_array($sql))
{
    $name = $row[1];
    $type = $row[2];
    $rate = $row[3];
    $img  = $row[4];


?>
 <tr><td><?php echo $name?></td>
    <td> <?php echo $type?></td>
    <td> <?php echo $rate?></td>
    <td> <img src="./food/<?php echo $img?> " alt=""width="100" height="100"> </td>

</tr>
<?php }?>
</table>
    </form>
</body>

</html>