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
$sql="";

if($user->tipou=="admin"){
 	$sql= "SELECT * FROM administrador WHERE correo = '".$user->correo."' AND  clave= '".$user->clave."'";
}else{
	$sql= "SELECT * FROM user WHERE correo = '".$user->correo."' AND  clave= '".$user->clave."'";

}
$result = $conn->query($sql);
$entret = mysqli_fetch_all($result, MYSQLI_ASSOC);
//echo  count($entret);


if(count($entret)>0){
	//echo "New record created successfully";
	echo "OK";
	//file_put_contents('php://stderr', print_r("New record created successfully", TRUE));
}else {
	//$foo = "Error";
 echo "ERROR";
}



$conn->close();
?>