<?php
include('connection.php');

$lat=$_GET['lat'];
$lon=$_GET['long'];
$inst=$_GET['inst'];
 date_default_timezone_set("Asia/Kolkata"); 
    $date = date("d/m/Y");
    	

$qry="select latitude,longitude from tbl_traffic_island where t_status='1'";
$res=mysqli_fetch_array(mysqli_query($con,$qry));
$t_lat=$res["latitude"];
$t_lon=$res["longitude"];

$qry="select tbl_traffic_island.*,(3959 * acos ( cos ( radians('$lat') ) * cos( radians( latitude) ) * cos( radians( longitude ) - radians('$lon') ) + sin ( radians('$lat') ) * sin( radians( latitude ) ))) AS user_distance FROM tbl_traffic_island where tbl_traffic_island.t_status='1' HAVING user_distance  < 0.3";
$res=mysqli_query($con,$qry);

$re=mysqli_fetch_array(mysqli_query($con,"select * from tbl_institution where inst_name LIKE '$inst' "));
$i_lat=$re["latitude"];
$i_long=$re["longitude"];
/*$instid=$re["inst_id"];
$qry1="select tbl_institution.*,(3959 * acos ( cos ( radians('$lat') ) * cos( radians( latitude) ) * cos( radians( longitude ) - radians('$lon') ) + sin ( radians('$lat') ) * sin( radians( latitude ) ))) AS user_distance FROM tbl_institution where tbl_institution.inst_id='$instid' HAVING user_distance  < 0.03";
$res1=mysqli_query($con,$qry1);
if(mysqli_num_rows($res1)>0)
{
	mysqli_query($con,"insert into tbl_institution");
	$ack[]=array("result"=>"ok","latitude"=>$i_lat,"longitude"=>$i_long);
}
*/
if(mysqli_num_rows($res)>0)
{
	mysqli_query($con,"update tbl_upstatus set status=1");
	$ack[]=array("result"=>"ok","latitude"=>$i_lat,"longitude"=>$i_long);
}
else
{
mysqli_query($con,"update tbl_upstatus set status=0");
$ack[]=array("result"=>"na","latitude"=>$i_lat,"longitude"=>$i_long);
}
echo json_encode($ack);
mysqli_close($con);



?>