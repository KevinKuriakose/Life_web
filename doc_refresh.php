<?php
include('connection.php');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Doccument Details</title>
</head>

 
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="398" border="1">
    <tr>
      <td width="101">By Username</td>
      <td width="144"><label for="d_byname"></label>
      <input type="text" name="d_byname" id="d_byname" /></td>
      <td width="131"><input type="submit" name="search_name" id="search_user" value="SEARCH" /></td>
    </tr>
          
    <tr>
      <td>By Status</td>
      <td><label for="d_bystatus">
        <select name="d_statuslist" id="select">
          <option selected="selected">All</option>
          <option>Verified</option>
          <option>Not Verified</option>
        </select>
      </label></td>
      <td><input type="submit" name="search_status" id="search_status" value="SEARCH" /></td>
    </tr>
  </table>
</form>

<?php
			$btn_ver=1;
			if(isset($_POST['search_name']))
			{   //echo "hi";
				$usn=$_POST['d_byname'];
				$qry="select * from (select * from tbl_user where firstname like '$usn%' or lastname like '$usn%') as temp RIGHT JOIN tbl_emergency on tbl_emergency.user_id=temp.user_id RIGHT JOIN tbl_emerg_details on tbl_emerg_details.emergency_id= tbl_emergency.emergency_id ";
?>
<table border="1" class="table">
<tr>
	<th align="center" width="100">First name</th>
	<th align="center" width="100">Last name</th>
	<th align="center" width="100">Emergency Type</th>
    <th align="center" width="100">Emergency Date</th>
	<th align="center" width="100">Document Name</th>
    <th align="center" width="100">Upload Date</th>
	<th align="center" width="100">Verification Status</th>
</tr>
<?php				
				$res=mysqli_query($con,$qry);
				if(($no=mysqli_num_rows($res))>0)
				{	while($user_row=mysqli_fetch_array($res))
					{	$tid=$user_row['type_id'];
						$sel="select * from tbl_emerg_type where type_id='$tid'";
						$r=mysqli_query($con,$sel);
						$type=mysqli_fetch_array($r);
	
			
	?>
<tr>    
    <td align="center" width="100"><?php echo $user_row['firstname'];?></td>
	<td align="center" width="100"><?php echo $user_row['lastname'];?></td>
	<td align="center" width="100"><?php echo $type['type_name'];?></td>
	<td align="center" width="100"><?php echo $user_row[16];?></td>
	<td align="center" width="100"><a href="Documents/<?php echo $user_row['document']?>"><?php echo $user_row['document'];?></a></td>
    <td align="center" width="100"><?php echo $user_row[23];?></td>
	<td align="center" width="100"><?php 
										$did=$user_row['em_det_id'];
										$dstat=$user_row['d_status']; 
										if($dstat=="verified")	
										{
											echo $user_row['d_status'];
										}
										else{
									?>
                                    <form method="post" action="">
                                    <input type="hidden" name="d_byname" value="<?php echo $_POST['d_byname']; ?>" />
                                    <input type="hidden" name="search_name" value="<?php echo $_POST['search_name']; ?>" />
                                    <input type="submit" name="verify" value="VERIFY"/>
                                    
                                    </form>
                                    <?php
									//previous POST values gets cleared on next POST request..... More correct version can be implemented using GET method
											$ver="verified";
											//echo $did;
											if(isset($_POST['verify']))
											{   
											echo "hi";
												$qry2="update tbl_emerg_details set d_status='$ver' where em_det_id='$did'";
												mysqli_query($con,$qry2);
												
												//header("location:ViewDocumentDetails.php");
												
											}
										}
                                     ?> </td>
</tr>
<?php
					}
				}
			}
			
?>


</body>
</html>