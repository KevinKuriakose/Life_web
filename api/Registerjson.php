<?php
include('connection.php');

$fname=$_GET['fname'];
$lname=$_GET['lname'];

$email=$_GET['email'];
$dbirth=$_GET['dob'];
$bgroup=$_GET['bloodgrp'];
$aadhid=$_GET['aadhar'];
$mobno=$_GET['mob'];
$pass=$_GET['password'];

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
	
	$insqry="insert into tbl_user(firstname,lastname,phone_no,aadhar_no,email_id,dob,blood_grp,password,u_status)values('$fname','$lname','$mobno','$aadhid','$email','$dbirth','$bgroup','$pass','new')";
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
		$link="http://lifemace.xyz/api/verify.php?email=$email";
		$comment="Greetings $fname $lname,\n\tWe are extremely happy to include you in the service of LifeMace. For authentication, please verify your email by just clicking the below link within 24hrs\n\n\n".$link."\n\n\nRegards,\n\nAdmin\nLifeMace";
		 $admin_email = "admin@lifemace.xyz";
		 mail($email, "Welcome to LifeMace, Verify your email", $comment, "From:" . $admin_email);
}
echo json_encode($ack);
mysqli_close($con);



?>