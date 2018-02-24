

<?php
include('connection.php');

$traffic=$_GET['signal'];

$qry="select * from tbl_upstatus where sig='$traffic'";
$res=mysqli_query($con,$qry);
$ack=array();
$row=mysqli_fetch_array($res);
if($row["status"]==1)
{
		$ack[] = "ok";
}
	else
	{
	$ack[] ="na";
	}
	echo json_encode($ack);
	mysqli_close($con);



?>