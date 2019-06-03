<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>

</script>
<body>

<table width="100%">
    <tr>
        <td align="right">
        <h1> Cart</h1>
    </td></tr>
</table>

    <table width="80%" border="1" align="center">
        <tr>
           
            <?php
$col=1;

include '../../dbcon.php';
$catering ="swathycatering@gmail.com";
$query = mysqli_query($con,"select * from  food where catering='$catering'");
while($row=mysqli_fetch_array($query))
{

$col++;
?>    <td width="20%">&nbsp;
    <form action="cart.php" method="post">
    <table align="center">
                    <tr>
                        <td><img src="../../catering/food/<?php echo $row['image']?>" width="225" height="312"></td>
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