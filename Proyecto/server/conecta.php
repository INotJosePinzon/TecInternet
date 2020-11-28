<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "test";

//Crear conexion
$conn = new mysqli ($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
//validar conexion
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}
?>
