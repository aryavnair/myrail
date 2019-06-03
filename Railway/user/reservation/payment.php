
<?php
include '../config.php';
CheckLogout();

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css">
<script src="js/jquery_3.2.1.min.js"> </script>
<script src="js/oh-autoval-script.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
    body{
        background-image:url('images/background.jpg');
        background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
        color:white;
    }
    form{
        -webkit-text-fill-color: white;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: black;
    font-family: fantasy;
    }

    input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

.control{
    -webkit-text-fill-color: black;
    -webkit-text-stroke-width: 0px;
    -webkit-text-stroke-color: black;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;

}

.button1 {
  background-color: #008CBA;
  color: black;
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: white;
  color: black;
}
.select-css {
    display: block;
    font-size: 16px;
    font-family: sans-serif;
    font-weight: 700;
    color: #444;
    line-height: 1.3;
    padding: .6em 1.4em .5em .8em;
    width: 100%;
    max-width: 100%; 
    box-sizing: border-box;
    margin: 0;
    border: 1px solid #aaa;
    box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
    border-radius: .5em;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    background-position: right .7em top 50%, 0 0;
    background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
    display: none;
}
.select-css:hover {
    border-color: #888;
}
.select-css:focus {
    border-color: #aaa;
    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
    box-shadow: 0 0 0 3px -moz-mac-focusring;
    color: #222; 
    outline: none;
}
.select-css option {
    font-weight:normal;
}
</style>


<body>
<ul>
        <li class=" active"><a href="../user_home.php" class="nav-link">Home</a></li>
        <li class=""><a href="../profile.php" class="nav-link">View Profile</a></li>
        <li class=""><a href="../editProfile.php" class="nav-link">Edit Profile</a></li>
        <li class=""><a href="../reservation/index.php" class="nav-link">Reservation</a></li>
        <li class="nav-item"><a href="../reservedticket.php" class="nav-link">Reserved Details</a></li>
		<li class=""><a href="../food/allcatering.php" class="nav-link">Food</a></li>
        <li class=""><a href="../cancelticket.php" class="nav-link">Cancellation</a></li>
        <li class=""><a href="../logout.php" class="nav-link">logout</a></li>
        <!-- <img src=" ../register/uploads/ <?php echo $_SESSION['email'] . '.jpg' ?>" alt="avathar" class="avathar"> -->
    </ul>
<form action="" method="post">
<?php
include '../../dbcon.php';
$adult = $_SESSION['adult'];
$rate = $_SESSION['rate'];
if (isset($_POST["submit"])) {

    $number = $_POST["number"];
    $csv = $_POST["csv"];
    $dat = $_POST["dtpicker"];
    $chname =$_POST["chname"];


    $result = mysqli_query($con, "select * from payment where cardnumber ='$number' && csv= '$csv'&&exp ='$dat'&&cashholder='$chname'");
    $rowcount = mysqli_num_rows($result);
    // echo $rowcount;
    if ($rowcount > 0) {
        $trainID = $_REQUEST['trainid'];
        $class = $_SESSION["class"];
        $berth = $_SESSION['berth'];
        $adult = $_SESSION['adult'];
        $date = $_SESSION["date"];
        $user = $_SESSION["email"];
        $coach = $_SESSION["coach"];
        $from = $_SESSION["from"];
        $to = $_SESSION["to"];
        $seatNo = $_SESSION['allocated'] ;
        for ($i = 0; $i < $adult; $i++) {
            $stat = mysqli_query($con, "insert into reservation values('','$trainID','$class','$date','$berth','paid','$user','$coach','$from','$to','$rate')");
           // "ALTER TABLE reservation ADD FOREIGN KEY (trainId) REFERENCES train(trainId)";
        }
        if ($stat) {
            for($i=0;$i<$adult;$i++)
            {
                $name=$_POST["pname$i"];
                $age=$_POST["age$i"];
                $gender=$_POST["gender$i"]; 
                $seatnumber=$seatNo+$i;
                mysqli_query($con,"insert into bystander values('','$name','$age','$gender','$user','$seatnumber')");
                
            }
            echo "<script> alert('Booking succeess') ; window.location='index.php'</script>";
        }else {
            echo "<script> alert('Error encountered'); window.location='index.php'</script>";
        }
    }else {
        echo "<script> alert('invalid payment details'); window.location='payment.php'</script>";
    }
}

?>
    <h2 style="color: green"> STEP 3</h2>

    <?php


echo "Rate $rate ";
?>
<table width="50%0" align="center" border="1">
  <tr>
    <td>&nbsp;Name</td>
    <td>&nbsp;Age</td>
    <td>&nbsp;Gender</td>
  </tr>
  <?php for ($i = 0; $i < $adult; $i++) {

    echo "<tr><td> <input type='text' name='pname$i'class='av-name' id=''></td><td><input type='text' name='age$i' class='av-number' id=''></td><td><select class='select-css control' name='gender$i' reuired=''id=''>
        <option >Male</option>
        <option >Female</option>
        <option >Others</option>
        </select></td></tr>";
}?>
</table>


    <table align="center" width="40%">
        <tr>
            <td>Card number</td>
            <td><input type="text" class="control" placeholder="Card number goes here.." name="number" id=""></td>
        </tr>
        <tr>
            <td>CVV</td>
            <td><input  class="control" placeholder="CVV number goes here.." type="text" name="csv" id=""></td>
        </tr>

        <tr>
            <td>Date of expiry</td>
            <td> <input class="control"  placeholder="D.O.E goes here.." type="text" name="dtpicker" value="" id="datepicker"></td>
        </tr>
        <tr>
            <td>Card holder name</td>
            <td><input class="control" placeholder="Card holder name goes here.." type="text" name="chname" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td>  <input type="submit" class='button button1 control'  name="submit" value="Pay Now"></td>
        </tr>
    </table>
    </form>
</body>


</html>