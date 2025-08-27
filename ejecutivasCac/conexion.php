<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cac';

  $conn = new mysqli($server,$username,$password,$database);
$conn ->set_charset("utf8");
if($conn-> connect_errno){
  die('Connection Failed: ' .$conn->mysqli_connect_errno().", ".$conn->mysqli_connect_error());
}else {
//echo "conexion exitosa";
}