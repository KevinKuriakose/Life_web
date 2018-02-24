<?php
include("connection.php");
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "root";
$conn = mysqli_connect($servername, $username, $password, $dbname);
*/



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $sql ="INSERT INTO `sett`(`id`, `value`) VALUES (45,2)";
mysqli_query($con, $sql);
}
else
{
  $sql ="INSERT INTO `sett`(`id`, `value`) VALUES (1,1)";
mysqli_query($con, $sql);

}


mysqli_close($con);
?>
