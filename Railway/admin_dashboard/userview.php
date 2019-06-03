<?php
include 'config.php';
CheckLogout();
?>

<?php
include '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="index.php">Home</a></li>
					
                 <li><a href="registerTrain.php">Register Train</a></li>
                 <li><a href="registerStation.php">Register Station</a></li>
                 <li><a href="registerStop.php">Add Stop</a></li>
                 <li><a href="registercatering.php">Register Catering</a></li>
                 <li><a href="managestation.php">Remove Stop</a></li>
                 <li><a href="userview.php">User Profile</a></li>
                 <li><a href="cateringview.php">Catering Profile</a></li>
                 <li><a href="foodview.php">Food details</a></li>
                 
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">

                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Admin<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i>Change Password</a></li>

                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>

                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    <li>
                         <!--<form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                        </form>-->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <style>
    th,td{
        
        padding: 3% 0% 3% 1%;
        text-align: center;
    }
    td{
        background-color: white;
    color: black;
    }
    th{
        background-color: red;
    }
    table a{
        color:blue;
    }
    </style>
    <div align="center" >
     <h1>USER DETAILS </h1>
 </div>
    <table id="table" border="2" style=" width: 80%;
    margin-left: 18%;"align="center">
           <thead>
             <tr>

             <th align="center"> NAME </th>
             <th align="center">EMAIL</th>
             <th align="center">GENDER </th>
             <th align="center">MOBILE</th>
             <th align="center">DISTRICT</th>
             <th align="center"> STATE </th>
             <th align="center">IMAGE</th>
             <th align="center">ACTION</th>
             </tr>
           
             </thead>
             <tbody>
<?php
$res = mysqli_query($con,"select * from user as u ,login as l where u.userId=l.loginID  ");
if(mysqli_num_rows($res))
{
while($row = mysqli_fetch_array($res))
{
?>
<tr >
<td><?php echo $row['firstname'].''.$row['lastname']?></td>

<td><?php echo $row["email"];?></td>
<td><?php echo $row["gender"];?></td>
<td><?php echo $row["mobile"];?></td>
<td><?php echo $row["district"];?></td>
<td><?php echo $row["state"];?></td>
<td><img width="100" height="80" src="../register/uploads/<?php echo $row['image'] ?>"></td>
<?php
if($row['status']==1)
{
    $s="Block";
}
else
{
    $s="Unblock";
}
?>
<td><a href="block.php?id=<?php echo $row[0]?>"><?php echo $s; ?></a></td>
</tr>
<?php
}
}
?>
</tbody>
</table>
    <!-- /#wrapper -->

    <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 443, 32],
                traffic = [
                {
                    Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                },
                {
                    Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                },
                {
                    Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                },
                {
                    Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                },
                {
                    Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                }];


            $("#shieldui-chart1").shieldChart({
                theme: "dark",

                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                theme: "dark",
                primaryHeader: {
                    text: "Traffic Per week"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "pie",
                    collectionAlias: "traffic",
                    data: visits
                }]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: traffic
                },
                sorting: {
                    multiple: true
                },
                rowHover: false,
                paging: false,
                columns: [
                { field: "Source", width: "170px", title: "Source" },
                { field: "Amount", title: "Amount" },
                { field: "Percent", title: "Percent", format: "{0} %" },
                { field: "Target", title: "Target" },
                ]
            });
        });
    </script>
</body>
</html>
