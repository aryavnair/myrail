<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>

</script>
<style>
    /*.row1 {
        display: flex;
      /*  width: 59%;
        height: 10.4 %;
        /*justify-content: space-between;*/
       /* background-color: #ffffff;
        margin: auto 15%;
        /*padding: 0.7%;*/
       /* line-height: 5.0;
        color: #111010;
        padding-left: 11%;
    }

   /* .colum1 {
        width: 400%;

    }

    .colum2 {
        width: 40%;


    }*/
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
        <li class=""><a href="#" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="#" class="nav-link">Reservation</a></li>
        <li class=""><a href="#" class="nav-link">Food</a></li>
        <li class=""><a href="#" class="nav-link">Cancellation</a></li>
        <li class=""><a href="#" class="nav-link">Search</a></li>
        <li class=""><a href="../../index.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>

<table width="100%">
    <tr>
        <td align="right">
        <h1> <a href="../../user/cart">Cart</a> </h1>
    </td></tr>
</table>

    <table width="80%" border="1" align="center">
        <tr>
           
<?php
$col=3;

include '../../dbcon.php';
$catering =$_REQUEST["id"];
$query = mysqli_query($con,"select * from  food where catering='$catering'");
while($row=mysqli_fetch_array($query))
{

$col++;
?>    <td width="20%">&nbsp;
    <form action="cart.php" method="post">
    <table align="center">
                    <tr align="center">
                        <td><img src="../../catering/food/<?php echo $row['image']?>" width="100px" height="80px"></td>
                    </tr>
                    <tr align="center">
                        <td> <input type="hidden" name="food" value="<?php echo $row[1]?>" > <?php echo "$row[1] ($row[2])"?></td>
                    </tr>
                    <tr align="center">
                            <td><input type="hidden" name="rate" value="<?php echo $row[3] ?>" id=""><?php echo  $row[3]?></td>
                        </tr>

                    <tr align="center">
                        <td><input type="text" placeholder="Quantity" name="quantity" id=""></td>
                    </tr>
                    <tr align="center">
                        <td>
                            <input type="hidden" name="catering" value="<?php echo $catering?>">
                            <input type="submit" id="addtocart" value="Add to cart"></td>
                    </tr>
                </table>
            </form>
           
<?php
if($col%3==0)
{
    echo"</td></tr>";
}
}
?>
   <table>
</body>

</html>