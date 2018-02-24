

<?php
  include("connection.php");
    $file_path = "Documents/";
    date_default_timezone_set("Asia/Kolkata"); 
    $file_path = $file_path . basename( $_FILES['uploadedfile']['name']);
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $file_path) ){
       // chmod ("uploads/".basename( $_FILES['uploadedfile']['name']), 0644);
    	$date = date("d/m/Y");
    	$name=$_FILES['uploadedfile']['name'];
mysqli_query($con,"insert into tbl_emerg_details(emergency_id,document,date,d_status) values('6','$name','$date','Not Verified')");
        echo $_FILES['uploadedfile']['name']."success".$_FILES['uploadedfile']['tmp_name']."==".$file_path;
    } else{
        echo "fail";
    }
 ?>