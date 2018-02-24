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

if(isset($_POST['btn_save']))
  {
      $instname=$_POST['instname'];
      $phone=$_POST['phnum'];
      $latitude=$_POST['lat'];
      $longitude=$_POST['longitude'];
      $type=$_POST['instlist'];
                                                                    $insqry="insert into tbl_institution(inst_name,inst_phno,latitude,longitude,type_id)values('$instname','$phone','$latitude','$longitude','$type')";
        mysqli_query($con,$insqry);
          
  }
?>
<nav>
      <div class="nav-wrapper light-blue darken-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li ><a href="HomePage.php" >User Search</a></li>
          <li class="active"><a href="InstitutionEntry.php" >Institution Entry</a></li>
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
      <li ><a href="HomePage.php" class="waves-effect"><i class="material-icons">search</i>User Search</a></li>
          <li class="active"><a href="InstitutionEntry.php" class="waves-effect"><i class="material-icons">my_location</i>Institution</a></li>
    <li><a href="TrafficIslandEntry.php" class="waves-effect"><i class="material-icons">traffic</i>Traffic Island</a></li>
    <li><a href="ViewDocumentDetails.php" class="waves-effect"><i class="material-icons">dns</i>Documents</a></li>
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

<form id="form1" name="form1" method="post" action="">
      <div class="input-field">
      <input type="text" name="instname" id="instname" required="required" />
      <label for="instname">Institute name</label>
      </div>
    <div class="input-field">
      <input type="text" name="phnum" id="phnum" required="required" />
      <label for="phnum">Phone Number</label>
    </div>
    <div class="input-field">
      <input type="text" name="lat" id="lat" required="required"/>
      <label for="lat">Latitude</label>
    </div>
    
    <div class="input-field">
      <input type="text" name="longitude" id="longitude" required="required" />
   <label for="longitude">Longitude</label>
    </div>
    
    <div class="input-field">
      
      <select name="instlist" id="instlist" required="required">
        <option value="" disabled="disabled" selected="selected">--Select Institution Type--</option>
        <?php
       $selQry="select * from tbl_emerg_type";
       $sel=mysqli_query($con,$selQry);
       while($row=mysqli_fetch_array($sel))
       {
         ?>
               <option value="<?php echo $row['type_id'];?>"><?php echo $row['type_name'];?></option>
    <?php    
       }
    ?>
      </select>
   <label for="instlist" >Institution Type</label>
    </div>
      
   
      
    <div class='input-field col s1'>
             <a href=""> <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="btn_save">
                    Save</button></a>
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
        <th>Institution</th>
  <th >Phone Number</th>
  <th >Latitude</th>
  <th >Longitude</th>
    <th >Emergency Type</th>
    </tr>
</thead><tbody>


  


  <?php 
  $sel="select * from tbl_institution";
  $selq=mysqli_query($con,$sel);
  while($row=mysqli_fetch_array($selq))
  {
  
  ?>
  <tr>
    <td ><?php echo $row['inst_name'];?></td>
    <td ><?php echo $row['inst_phno'];?></td>
        <td ><?php echo $row['latitude'];?></td>
    <td ><?php echo $row['longitude'];?></td>
        <td >
    <?php 
        $typeid=$row['type_id'];
        $qry="select * from tbl_emerg_type where type_id='$typeid'";
        $sq=mysqli_query($con,$qry);
        while($r=mysqli_fetch_array($sq))
        {
          $tname=$r['type_name'];
          echo $tname;
        }
     ?>
        </td>
</tr>
<?php 
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



