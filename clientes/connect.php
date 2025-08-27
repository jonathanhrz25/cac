<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cac';

$conn = new mysqli($server, $username, $password, $database);
$conn->set_charset("utf8");

if ($conn->connect_errno) {
    die('Connection Failed: ' . $conn->connect_errno . ", " . $conn->connect_error);
} 
// Si la conexión es exitosa, no es necesario mostrar el mensaje aquí.
?>
