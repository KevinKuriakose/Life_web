<?php
include('connection.php');

$email=$_GET['email'];
$qry="select * from tbl_user where email_id='$email'";
$res=mysqli_query($con,$qry);
if(($n=mysqli_num_rows($res))>0)
{
    $re=mysqli_fetch_array($res);
	
	mysqli_query($con,"update tbl_user set u_status='valid' where email_id='$email'");
	echo "Verification Successful";
}
else
{
	echo "Verification Unsuccessful, Please contact us at admin@lifemace.xyz";
	
}

mysqli_close($con);



?>