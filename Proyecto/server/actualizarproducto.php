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
$producto= json_decode($cuerpo);
//file_put_contents('php://stderr', print_r($cuerpo, TRUE));
//file_put_contents('php://stderr', print_r($actor->nombre, TRUE));
$sql= "UPDATE producto SET precio='".$producto->precio."' where codigo='".$producto->codigo."';";

$result = $conn->query($sql);


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