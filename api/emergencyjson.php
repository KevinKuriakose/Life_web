<?php
include('connection.php');

$userid=$_GET['userid'];
$lat=$_GET['latitude'];

$long=$_GET['longitude'];
$type=$_GET['type'];
$inst=$_GET['instid'];
$date=$_GET['date'];
$time=$_GET['time'];

//$pass=$_GET['password'];

$ack=array();
$qry="select * from tbl_user where email_id='$email'";
$res=mysqli_query($con,$qry);
if(($n=mysqli_num_rows($res))>0)
{
    $re=mysqli_fetch_array($res);
	//echo $re[0],$re[1];
	$ack[]="na";
	//echo "user_exists..";
	
}
else
{
	
	$insqry="insert into tbl_emerr(firstname,lastname,phone_no,aadhar_no,email_id,dob,blood_grp,password,u_status)values('$fname','$lname','$mobno','$aadhid','$email','$dbirth','$bgroup','$pass','new')";
	//$selq=
	mysqli_query($con,$insqry);
	/*if((mysqli_errno($selq))>0)
	{
		$ack[]="Error";
		echo "Error..";
	}
	else
	{*/
		$ack[]="ok";
		//echo "Success..";	
		
	//}
	//echo "Else..";
}
echo json_encode($ack);
mysqli_close($con);



?>