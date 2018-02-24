<?php
include('connection.php');
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <title>View User Page</title>
</head>
<body>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>














<form id="form1" name="form1" method="post" action="">
    <table width="451" border="1">
        <tr>
            <td width="105">Search by User</td>
            <td width="66"><label for="searchname"></label>
                <input type="text" name="searchname" id="searchname" /></td>

            <td width="64">


                <button class="btn waves-effect waves-light" type="submit" name="btn_search">
                    <i class="material-icons right">SEARCH</i>
                </button>




                <!--    <input type="submit" name="btn_search" id="btn_search" value="SEARCH" /></td>
                -->
        </tr>
    </table>
</form>

<table border="1" class="table">
    <tr>
        <th align="center" width="100">First Name </th>
        <th align="center" width="100">Last Name</th>
        <th align="center" width="100">Mobile Number </th>
        <th align="center" width="100">Aadhar No</th>
        <th align="center" width="100">Email-id</th>
        <th align="center" width="100">Date of Birth</th>
        <th align="center" width="100">Blood Group</th>
        <th align="center" width="100">Password</th>
        <th align="center" width="100">User Satus</th>
    </tr>



    <tr>
        <?php

        if(isset($_POST['btn_search']))
        {	$usn=$_POST['searchname'];
        $qry="select * from tbl_user where firstname like '$usn%' or lastname like '$usn%'";
        $res=mysqli_query($con,$qry);
        if(($no=mysqli_num_rows($res))>0)
        {	 while($row=mysqli_fetch_array($res))
        {
        ?>

        <td align="center" width="100"><?php echo $row['firstname'];?></td>
        <td align="center" width="100"><?php echo $row['lastname'];?></td>
        <td align="center" width="100"><?php echo $row['phone_no'];?></td>
        <td align="center" width="100"><?php echo $row['aadhar_no'];?></td>
        <td align="center" width="100"><?php echo $row['email_id'];?></td>
        <td align="center" width="100"><?php echo $row['dob'];?></td>
        <td align="center" width="100"><?php echo $row['blood_grp'];?></td>
        <td align="center" width="100"><?php echo $row['password'];?></td>
        <td align="center" width="100"><?php echo $row['u_status'];?></td>

    </tr>
    <?php
    }
    }
    }

    else{
        $sel="select * from tbl_user";
        $selq=mysqli_query($con,$sel);
        while($row=mysqli_fetch_array($selq)){
            ?>

            <td align="center" width="100"><?php echo $row['firstname'];?></td>
            <td align="center" width="100"><?php echo $row['lastname'];?></td>
            <td align="center" width="100"><?php echo $row['phone_no'];?></td>
            <td align="center" width="100"><?php echo $row['aadhar_no'];?></td>
            <td align="center" width="100"><?php echo $row['email_id'];?></td>
            <td align="center" width="100"><?php echo $row['dob'];?></td>
            <td align="center" width="100"><?php echo $row['blood_grp'];?></td>
            <td align="center" width="100"><?php echo $row['password'];?></td>
            <td align="center" width="100"><?php echo $row['u_status'];?></td>
            </tr>
            <?php
        }
    }

    ?>
</table>


</body>
</html>