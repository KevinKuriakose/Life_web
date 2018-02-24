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


<?php


$qry="select firstname,lastname,type_name,inst_name,tbl_emergency.date,em_det_id,document,tbl_emerg_details.date,d_status from (select * from tbl_user) as temp INNER JOIN tbl_emergency on tbl_emergency.user_id=temp.user_id INNER JOIN tbl_emerg_details on tbl_emerg_details.emergency_id= tbl_emergency.emergency_id INNER JOIN tbl_institution on tbl_institution.inst_id= tbl_emergency.inst_id INNER JOIN tbl_emerg_type on tbl_emerg_type.type_id= tbl_emergency.type_id ";


if(isset($_GET['search_name']))
{	//echo "hi";
	$usn=$_GET['d_byname'];
	echo "dude";
	$qry="select firstname,lastname,type_name,inst_name,tbl_emergency.date,em_det_id,document,tbl_emerg_details.date,d_status from (select * from tbl_user where firstname like '$usn%' or lastname like '$usn%') as temp INNER JOIN tbl_emergency on tbl_emergency.user_id=temp.user_id INNER JOIN tbl_emerg_details on tbl_emerg_details.emergency_id= tbl_emergency.emergency_id INNER JOIN tbl_institution on tbl_institution.inst_id= tbl_emergency.inst_id INNER JOIN tbl_emerg_type on tbl_emerg_type.type_id= tbl_emergency.type_id ";
	
}
else if(isset($_GET['search_status']))
{	//echo "hi";
	$usn=$_GET['d_statuslist']; // status
	echo $usn;
	if($usn!="All"){
		echo $usn;
		$qry="select firstname,lastname,type_name,inst_name,tbl_emergency.date,em_det_id,document,temp.date,d_status from (select * from tbl_emerg_details where d_status='$usn' ) as temp INNER JOIN tbl_emergency on tbl_emergency.emergency_id=temp.emergency_id INNER JOIN tbl_user on tbl_user.user_id= tbl_emergency.user_id INNER JOIN tbl_institution on tbl_institution.inst_id= tbl_emergency.inst_id INNER JOIN tbl_emerg_type on tbl_emerg_type.type_id= tbl_emergency.type_id  ";
	}
}

if(isset($_GET['verify']))
	{	echo "verified";
		$did=$_GET['did'];
		mysqli_query($con,"update tbl_emerg_details set d_status='Verified' where em_det_id='$did'");
		$r1=mysqli_query($con,"select emergency_id from tbl_emerg_details where em_det_id='$did'");
		$row1=mysqli_fetch_array($r1);
		$eid=$row1['emergency_id'];// emergency id
		
		$r2=mysqli_query($con,"select * from(select emergency_id from tbl_emerg_details where em_det_id='$did')as temp Inner JOIN tbl_emerg_details on temp.emergency_id=tbl_emerg_details.emergency_id WHERE d_status='Not Verified' ");
		
		
		if(($no=mysqli_num_rows($r2))==0) //if no documents of 'Not Verified ' status exists
		  mysqli_query($con,"update tbl_emergency set e_status='Verified' where emergency_id='$eid'");
		
		
		
	}


?> 
<nav>
      <div class="nav-wrapper light-blue darken-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li ><a href="HomePage.php" >User Search</a></li>
          <li><a href="InstitutionEntry.php" >Institution Entry</a></li>
    <li><a href="TrafficIslandEntry.php" >Traffic Island Entry</a></li>
    <li  class="active"><a href="ViewDocumentDetails.php" >View Documents</a></li>
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
      <li ><a href="HomePage.php" class="waves-effect"><i class="material-icons">search</i>User Search</a></li>
          <li><a href="InstitutionEntry.php" class="waves-effect"><i class="material-icons">my_location</i>Institution</a></li>
    <li><a href="TrafficIslandEntry.php" class="waves-effect"><i class="material-icons">traffic</i>Traffic Island</a></li>
    <li class="active"><a href="ViewDocumentDetails.php" class="waves-effect"><i class="material-icons">dns</i>Documents</a></li>
    <li><a href="ViewEmergency.php" class="waves-effect"><i class="material-icons">drive_eta</i>Emergency</a></li>
    <li><a href="index.php" class=" btn light-blue lighten-1"><i class="material-icons">exit_to_app</i>Logout</a></li>
    
    <li><div class="divider"></div></li>
        </ul>
      </div>
    </nav>
<div class="container">
<div class="card">
  <div class="card-content">
<p>

<form id="form1" name="form1" method="get" action="">
	<div class="row">
      <div class="input-field col s8">
      <input type="text" name="d_byname" id="d_byname" /></td>
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
                <select name="d_statuslist" id="select">
          <option selected="selected">All</option>
          <option>Verified</option>
          <option>Not Verified</option>
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
       <th >First name</th>
	<th >Last name</th>
	<th >Emergency Type</th>
    <th >Institution</th>
    <th >Emergency Date</th>
	<th >Document Name</th>
    <th >Upload Date</th>
	<th >Verification Status</th>
    </tr>
</thead><tbody>

<?php
	$res=mysqli_query($con,$qry);
	if(($no=mysqli_num_rows($res))>0)
	{	while($user_row=mysqli_fetch_array($res))
		{				
			//$did=$user_row['em_det_id'];
			$dstat=$user_row['d_status']; 
?>
<tr>    
    <td><?php echo $user_row['firstname'];?></td>
	<td><?php echo $user_row['lastname'];?></td>
	<td><?php echo $user_row['type_name'];?></td>
    <td><?php echo $user_row['inst_name'];?></td>
	<td><?php echo $user_row[4];?></td>
	<td>
		<img class="materialboxed" data-caption="<?php echo $user_row['document'];?>" width="80" height="120" src="Documents/<?php echo $user_row['document']?>">
    	
    </td>
    <td><?php echo $user_row[7];?></td>
	<td>
		<?php 
				if($dstat=="Verified")	
				{
					echo $user_row['d_status'];
				}
				else{
					if(isset($_GET['search_name']))
					{
		?>
        <form method="get" action="">
        <input type="hidden" name="did" value="<?php echo $user_row['em_det_id'] ?>" />
        <input type="hidden" name="d_byname" value="<?php echo $_GET['d_byname']; ?>" />
        <input type="hidden" name="search_name" value="<?php echo $_GET['search_name']; ?>" />
        <div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="verify" id="verify" >
                    <i class="material-icons">error</i>Verify</button></a>
                </div>
        </form>
        	<?php
					}
					else if(isset($_GET['search_status']))
					{
			?>			
						<form method="get" action="">
                        <input type="hidden" name="did" value="<?php echo $user_row['em_det_id'] ?>" />
						<input type="hidden" name="d_statuslist" value="<?php echo $_GET['d_statuslist']; ?>" />
        				<input type="hidden" name="search_status" value="<?php echo $_GET['search_status']; ?>" />
						<div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="verify" id="verify" >
                    <i class="material-icons">error</i>Verify</button></a>
                </div>
        				</form>
			<?php		
					}
	  				else
					{ //echo "initially";
			?>
        			<form method="get" action="">
        			<input type="hidden" name="did" value="<?php echo $user_row['em_det_id'] ?>" />
                    <div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="verify" id="verify" >
                    <i class="material-icons">error</i>Verify</button></a>
                </div>
        			</form>
        <?php
					}
				}?></td>

			</tr><?php
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
    $('.materialboxed').materialbox();
});
  
        
       </script>


</body>




</html>



    

