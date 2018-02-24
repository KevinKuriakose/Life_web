<?php
include('connection.php');

$adminusr="admin";
$adminpass="admin";

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
</head>

<?php
	if(isset($_POST['btn_login']))
	{
			$usr=$_POST['us_name'];
			$usrpass=$_POST['pass'];
			if($usr==$adminusr)
			{
				if($usrpass==$adminpass)
				{
					
					header("location:Homepage.php");	
				}
				else
				{ 
					echo '<script language="javascript">';
  					echo 'alert("INVALID PASSWORD")';  //not showing an alert box.
  					echo '</script>';
				}
			}
			
			
	}
?>




<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Username</td>
      <td>
      <input type="text" name="us_name" id="us_name" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
      <input type="password" name="pass" id="pass" required="required" />       
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_login" id="btn_login" value="LOGIN" /></td>
    </tr>
  </table>
</form>
</body>
</html>