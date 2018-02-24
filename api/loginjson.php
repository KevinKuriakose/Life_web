<?php
include('connection.php');

$username=$_GET['username'];
$password=$_GET['password'];


$qry="SELECT * from tbl_user where email_id='$username' AND password='$password' AND u_status='valid'";
$res=mysqli_query($con,$qry);
$ack=array();
//session_start();
if(mysqli_num_rows($res)>0)
{
	while($row=mysqli_fetch_assoc($res))
	{
		$ack[] = $row;
		
		
	}
	
}
	else
	{
	$ack[] ="na";
	}
	echo json_encode($ack);
	mysqli_close($con);
//session_destroy();



?>