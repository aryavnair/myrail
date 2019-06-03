<?php
include '../dbcon.php';
$searchTerm = $_GET['term'];
$query = mysqli_query($con,"SELECT  DISTINCT * FROM station  WHERE station LIKE '%".$searchTerm."%' ");
while ($row=mysqli_fetch_array($query)) 
{
 $data[] = $row['station'];
}
echo json_encode($data);
?>