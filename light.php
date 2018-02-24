<?php
include("connection.php");
$id=$_GET['id'];
$row=mysqli_fetch_array(mysqli_query($con,"select * from tbl_upstatus where sig='$id'"));
if($row["status"]==0)
echo "LOW";
else
echo "HIGH";
?>