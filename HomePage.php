<?php
include('connection.php');




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->
       <link rel="stylesheet" href="materialize/materialize.min.css">
<link rel="icon" type="image/png" href="images/logolife.png"></link>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>L I F E - Dashboard</title>
</head>

<body>



<!--         <li><a href="ViewUser.php">View Users</a> </li>
            <li><a href="InstitutionEntry.php">Institution Entry</a></li>
            <li><a href="TrafficIslandEntry.php">Traffic Island Entry</a></li>
            <li><a href="ViewDocumentDetails.php">View Document Details</a></li>
            <li><a href="ViewEmergency.php">View Emergency</a></li>
-->
<nav>
      <div class="nav-wrapper light-blue darken-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li class="active"><a href="HomePage.php" >User Search</a></li>
          <li><a href="InstitutionEntry.php" >Institution Entry</a></li>
    <li><a href="TrafficIslandEntry.php" >Traffic Island Entry</a></li>
    <li><a href="ViewDocumentDetails.php" >View Documents</a></li>
    <li><a href="ViewEmergency.php" >View Emergency</a></li>
    <li><a href="index.php" class="btn light-blue lighten-1" style="border: 2px solid #fff;">Logout</a></li>

        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><div class="user-view">
      <div class="background">
        <img src="images/logolife.png" width="220px" height="170px">
      </div>
      </div>

  </li>
      <li class="active"><a href="HomePage.php" class="waves-effect"><i class="material-icons">search</i>User Search</a></li>
          <li><a href="InstitutionEntry.php" class="waves-effect"><i class="material-icons">my_location</i>Institution</a></li>
    <li><a href="TrafficIslandEntry.php" class="waves-effect"><i class="material-icons">traffic</i>Traffic Island</a></li>
    <li><a href="ViewDocumentDetails.php" class="waves-effect"><i class="material-icons">dns</i>Documents</a></li>
    <li><a href="ViewEmergency.php" class="waves-effect"><i class="material-icons">drive_eta</i>Emergency</a></li>
    <li><a href="index.php" class=" btn light-blue lighten-1"><i class="material-icons">exit_to_app</i>Logout</a></li>
    
    <li><div class="divider"></div></li>
        </ul>
      </div>
    </nav>
<div class="container">

<p>


<form id="form1" name="form1" method="post" action="" >


<div class='row'>
              <div class='input-field col s6'>
                <input type='text' name='searchname' id='searchname' />
                <label for='password'>Search by User</label>
              </div>
              <div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="btn_search">
                    <i class="material-icons">search</i></button></a>
                </div>

            </div>
                
</form>
</p>
<table class="stripped centered highlight responsive-table">
   <thead>
    <tr>
        <th>First Name </th>
        <th>Last Name</th>
        <th>Mobile Number </th>
        <th>Aadhar No</th>
        <th>Email-id</th>
        <th>Date of Birth</th>
        <th>Blood Group</th>
        <th>Password</th>
        <th>User Satus</th>
    </tr>
</thead><tbody>


    <tr>
        <?php

        if(isset($_POST['btn_search']))
        {   $usn=$_POST['searchname'];
        $qry="select * from tbl_user where firstname like '$usn%' or lastname like '$usn%'";
        $res=mysqli_query($con,$qry);
        if(($no=mysqli_num_rows($res))>0)
        {    while($row=mysqli_fetch_array($res))
        {
        ?>

        <td><?php echo $row['firstname'];?></td>
        <td><?php echo $row['lastname'];?></td>
        <td><?php echo $row['phone_no'];?></td>
        <td><?php echo $row['aadhar_no'];?></td>
        <td><?php echo $row['email_id'];?></td>
        <td><?php echo $row['dob'];?></td>
        <td><?php echo $row['blood_grp'];?></td>
        <td><?php echo $row['password'];?></td>
        <td><?php echo $row['u_status'];?></td>

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

            <td ><?php echo $row['firstname'];?></td>
            <td ><?php echo $row['lastname'];?></td>
            <td ><?php echo $row['phone_no'];?></td>
            <td ><?php echo $row['aadhar_no'];?></td>
            <td ><?php echo $row['email_id'];?></td>
            <td ><?php echo $row['dob'];?></td>
            <td ><?php echo $row['blood_grp'];?></td>
            <td ><?php echo $row['password'];?></td>
            <td ><?php echo $row['u_status'];?></td>
            </tr>
            <?php
        }
    }

    ?>
    </tbody>
</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


</div>


<footer class="page-footer light-blue darken-1">
      <div class="footer-copyright ">
            <div class="container">
            <span style="font-size: 20px;">&copy;</span>&nbsp;<span style="font-family:cursive; font-size: 20px;">2018 Copyright LifeMace</span>
            <a class="white-text text-lighten-4 right" href="#!"><span style="font-family:cursive;font-size: 20px;">Crafted by KK</span></a>
            </div>
          </div>
        </footer>


 <script type="text/javascript" src="materialize/jquery-2.1.1.min.js"></script>
       <script src="materialize/materialize.min.js"></script>

       <script>

  $('.button-collapse').sideNav({
      menuWidth: 220, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens,
      //onOpen: function(el) { /* Do Stuff* / }, // A function to be called when sideNav is opened
     // onClose: function(el) { /* Do Stuff* / }, // A function to be called when sideNav is closed
    }
  );
        
  
        
       </script>


</body>




</html>


