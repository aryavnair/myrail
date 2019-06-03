<?php
 include '../dbcon.php';

$searchTerm = $_GET['term'];
$query = mysqli_query($con,"SELECT  DISTINCT * FROM foodnames  WHERE foodname LIKE '%".$searchTerm."%' ");
while ($row=mysqli_fetch_array($query)) 
{
 $data[] = $row[0];
}
echo json_encode($data);
?>