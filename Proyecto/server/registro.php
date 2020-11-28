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

$cuerpo = file_get_contents('php://input');
$user= json_decode($cuerpo);
//file_put_contents('php://stderr', print_r($cuerpo, TRUE));
//file_put_contents('php://stderr', print_r($actor->nombre, TRUE));


$sql = "INSERT INTO USER  (correo, nombre,clave,celular,direccion,ciudad) VALUES
(" . "'" . $user->correo . "'" . ",'" .$user->nombre . "'". ",'".$user->clave . "'". ",'".$user->celular. "'". ",'".$user->direccion. "'". ",'".$user->ciudad."')";
$result = $conn->query($sql);
if($result){
	//echo "New record created successfully";
	echo "OK";
	//file_put_contents('php://stderr', print_r("New record created successfully", TRUE));
}else {
	//$foo = "Error";
	error_log(print_r(mysqli_error($conn), TRUE), 0);
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>