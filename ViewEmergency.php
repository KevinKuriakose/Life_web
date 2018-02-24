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



<nav>
      <div class="nav-wrapper light-blue darken-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li ><a href="HomePage.php" >User Search</a></li>
          <li ><a href="InstitutionEntry.php" >Institution Entry</a></li>
    <li><a href="TrafficIslandEntry.php" >Traffic Island Entry</a></li>
    <li><a href="ViewDocumentDetails.php" >View Documents</a></li>
    <li class="active"><a href="ViewEmergency.php" >View Emergency</a></li>
    <li><a href="index.php" class="btn light-blue lighten-1" style="border: 2px solid #fff;">Logout</a></li>

        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><div class="user-view">
      <div class="background">
        <img src="images/logolife.png" width="220px" height="170px">
      </div>
      </div>

  </li>
      <li ><a href="HomePage.php" class="waves-effect"><i class="material-icons">search</i>User Search</a></li>
          <li ><a href="InstitutionEntry.php" class="waves-effect"><i class="material-icons">my_location</i>Institution</a></li>
    <li><a href="TrafficIslandEntry.php" class="waves-effect"><i class="material-icons">traffic</i>Traffic Island</a></li>
    <li><a href="ViewDocumentDetails.php" class="waves-effect"><i class="material-icons">dns</i>Documents</a></li>
    <li class="active"><a href="ViewEmergency.php" class="waves-effect"><i class="material-icons">drive_eta</i>Emergency</a></li>
    <li><a href="index.php" class=" btn light-blue lighten-1"><i class="material-icons">exit_to_app</i>Logout</a></li>
    
    <li><div class="divider"></div></li>
        </ul>
      </div>
    </nav>
<div class="container">
<div class="card">
  <div class="card-content">
<p>

<form id="form1" name="form1" method="post" action="">
	<div class="row">
      <div class="input-field col s8">
      <input type="text" name="e_byname" id="e_byname" /></td>
   <label for="d_byname" >Name</label>
    </div>
      
   
      
    <div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="search_name" id="search_name" >
                    <i class="material-icons">search</i></button></a>
                </div>
            </div>
            <br/>

            <div class="row">
 <div class="input-field col s8">
                <select name="e_statuslist" id="e_selected">
          <option selected="selected">All</option>
          <option>Open</option>
          <option>Closed</option>
          <option>Verified</option>
        </select>
<label for="d_statuslist">Status</label>
            </div>
<div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="search_status" id="search_status" >
                    <i class="material-icons">search</i></button></a>
                </div>
</div>
</form>
</p>
</div>
</div>
<div class="card">
  <div class="card-content">

<table class="stripped centered highlight responsive-table">
   <thead>
    <tr>
        <th>First name</th>
	<th>Last name</th>
	<th >Emergency Type</th>
	<th >Institution</th>
	<th >Date</th>
	<th >Time</th>
	<th >Status</th>
    </tr>
</thead><tbody>
<?php

if(isset($_POST['search_name']))
  { $usn=$_POST['e_byname'];
      $qry="select * from (select * from tbl_user where firstname like '$usn%' or lastname like '$usn%') as temp left join tbl_emergency on temp.user_id = tbl_emergency.user_id left join tbl_institution on tbl_institution.inst_id = tbl_emergency.inst_id left join tbl_emerg_type on tbl_emerg_type.type_id = tbl_emergency.type_id"; // using left join
    $res=mysqli_query($con,$qry);
    
    if(($no=mysqli_num_rows($res))>0)
    { while($user_row=mysqli_fetch_array($res))
      {
        
?>  
<tr>
<td ><?php echo $user_row['firstname'];?></td>
  <td ><?php echo $user_row['lastname'];?></td>
  <td ><?php echo $user_row['type_name'];?></td>
  <td ><?php echo $user_row['inst_name'];?></td>
  <td ><?php echo $user_row['date'];?></td>
  <td ><?php echo $user_row['time'];?></td>
  <td ><?php echo $user_row['e_status'];?></td>
</tr>

<?php
          }
        }
      }
      
else if(isset($_POST['search_status'])){
  $status=$_POST['e_statuslist'];
  echo $status;
  if($status=="All")
  {
    $qry2= "SELECT * FROM tbl_emergency as temp left JOIN tbl_user on temp.user_id=tbl_user.user_id LEFT JOIN tbl_institution on temp.inst_id=tbl_institution.inst_id left join tbl_emerg_type on temp.type_id=tbl_emerg_type.type_id ";
  
    $res2=mysqli_query($con,$qry2);
    if((mysqli_num_rows($res2))>0)
      { while($user_row2=mysqli_fetch_array($res2))
      {
        
?>  
<tr>
<td ><?php echo $user_row2['firstname'];?></td>
  <td ><?php echo $user_row2['lastname'];?></td>
  <td ><?php echo $user_row2['type_name'];?></td>
  <td ><?php echo $user_row2['inst_name'];?></td>
  <td ><?php echo $user_row2['date'];?></td>
  <td ><?php echo $user_row2['time'];?></td>
  <td ><?php echo $user_row2['e_status'];?></td>
</tr>

<?php
      }
    }
  }
  
  else{
    $qry3="SELECT * FROM ( Select * from tbl_emergency where e_status='$status' ) as temp left JOIN tbl_user on temp.user_id=tbl_user.user_id LEFT JOIN tbl_institution on temp.inst_id=tbl_institution.inst_id left join tbl_emerg_type on temp.type_id=tbl_emerg_type.type_id";
  
    $res3=mysqli_query($con,$qry3);
    if((mysqli_num_rows($res3))>0)
      { while($user_row3=mysqli_fetch_array($res3))
      {
        
?>  
<tr>
<td ><?php echo $user_row3['firstname'];?></td>
  <td ><?php echo $user_row3['lastname'];?></td>
  <td ><?php echo $user_row3['type_name'];?></td>
  <td ><?php echo $user_row3['inst_name'];?></td>
  <td ><?php echo $user_row3['date'];?></td>
  <td ><?php echo $user_row3['time'];?></td>
  <td ><?php echo $user_row3['e_status'];?></td>
</tr>
<?php
      }
    }
  }
}

?>
    </tbody>
</table>
</div>
</div>
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
        $(document).ready(function() {
    $('select').material_select();
});
  
        
       </script>


</body>




</html>

