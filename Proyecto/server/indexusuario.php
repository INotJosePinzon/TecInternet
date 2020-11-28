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

$sql = "SELECT * FROM usuario";
try{
	//ejecutar consulta
	$result = $conn->query($sql);
	$entret = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$json_string = json_encode($entret, JSON_UNESCAPED_UNICODE);
	echo $json_string;
}
catch (mysqli_sql_exception $e) {
	echo "MySQLi Error Code: " . $e->getCode() . "</br />";
	echo "Exception Msg: " . $e->getMessage();
	exit();
}
$conn->close();
?>













