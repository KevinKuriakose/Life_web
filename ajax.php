<?php
include("connection.php");
$usn=$_GET['name'];
        $qry="select * from tbl_user where firstname like '$usn%' or lastname like '$usn%'";
        $res=mysqli_query($con,$qry);
        if(($no=mysqli_num_rows($res))>0)
        {    while($row=mysqli_fetch_array($res))
        {
        ?>
<tr>
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