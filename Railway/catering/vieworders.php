<?php
include 'config.php';
CheckLogout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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
<ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="catering_home.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="editProfile.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item"><a href="menu.php" class="nav-link">Food list</a></li>
	          <li class="nav-item"><a href="vieworders.php" class="nav-link">Order details</a></li>
	          <li class="nav-item"><a href="addfood.php" class="nav-link">Add food</a></li>
			  <li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
	        </ul>
    <?php
    include '../dbcon.php';
    ?>
      
    <?php
     echo" <table align='center' width='90%'>
      <tr>
        
          <td>Food</td>
          <td>Train No</td>
          <td>Train Name</td>
          <td>PNR</td>
          <td>Date</td>
          <td>Rate</td>
          <td>Coach</td>

      </tr>";
      $user =$_SESSION["email"];
    $sql = mysqli_query($con, "select * from foodorder where catering ='$user'");
    while ($row = mysqli_fetch_array($sql)) {
        $user = $row['user'];
        $food = $row['food'];
        $trainid = $row['trainid'];
        $trainname = $row['trainname'];
        $pnr = $row['pnr'];
        // $frm = $row['frm'];
        // $tothe = $row['tothe'];
        $dat = $row['dat'];
        $rate = $row['rate'];
        $coach = $row['coach'];
        //$class = $row['class'];
        
       // $berth = $row['berth'];
       
        //$trainname = $row['trainname'];
  
    ?>


        <tr>
    
            <td><?php echo $food ?></td>
            <td><?php echo $trainid ?></td>
            <td><?php echo $trainname ?></td>
            <td><?php echo $pnr ?></td>
            <td><?php echo $dat ?></td>
            <td><?php echo $rate ?></td>
            <td><?php echo $coach ?></td>
        </tr>
        

    <?php
  }
    ?>
    
    </table>
</body>

</html>