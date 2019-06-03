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
					<li>
                            <a class="has-arrow" href="#" aria-expanded="false">
							<span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Registration</span></a>
                <ul class="submenu-angle" aria-expanded="false">
                <li><a title="All Library" href="registerStaff.php">
								<span >Staff </span></a></li>
								<li><a title="All Library" href="registerCatering.php">
								<span>Catering</span></a></li>
								 <li><a title="All Library" href="registerTrain.php">
								<span >Trains </span></a></li>
								 <li><a title="All Library" href="registerStation.php">
								<span>Stations </span></a></li>
								 <li><a title="All Library" href="registerStop.php">
								<span>Route </span></a></li>
                            </ul>
                        </li>

                    <li><a href="staffview.php">Staff Profile</a></li>
                    <li><a href="userview.php">User Profile</a></li>
                      <li><a href="cateringview.php">Catering Profile</a></li>
                   <li><a href="#">Food details</a></li>
                    <li><a href="#">Complaints</a></li>
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
                        <form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div align="center" >
     <h1>STAFF DETAILS </h1>
 </div>
    <table id="table" border="2" style="    width: 62%;"align="center">
           <thead>
             <tr>

             <th>firstname &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>lastname &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>gender &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>address &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>dob &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>mobile &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>email &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>qualification &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>district &nbsp;&nbsp;&nbsp;&nbsp;</th>
             <th>state &nbsp;&nbsp;&nbsp;&nbsp;</th>
             </tr>
             <td>
             </td>
             </thead>
             <tbody>
<?php
$res = mysqli_query($con,"select * from staff ");
if(mysqli_num_rows($res))
{
while($row = mysqli_fetch_array($res))
{
?>
<tr >
<td><?php echo $row["fname"];?></td>
<td><?php echo $row["lname"];?></td>
<td><?php echo $row["gender"];?></td>
<td><?php echo $row["address"];?></td>
<td><?php echo $row["dob"];?></td>
<td><?php echo $row["mobile"];?></td>
<td><?php echo $row["email"];?></td>
<td><?php echo $row["qualification"];?></td>
<td><?php echo $row["district"];?></td>
<td><?php echo $row["state"];?></td>

 ?>
</a></td>
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
