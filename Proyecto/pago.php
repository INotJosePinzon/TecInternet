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
$data=[];
$sql = "SELECT * FROM producto where codigo='".$_GET["id"]."'";
try{
	//ejecutar consulta
	$result = $conn->query($sql);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

	
}
catch (mysqli_sql_exception $e) {
	echo "MySQLi Error Code: " . $e->getCode() . "</br />";
	echo "Exception Msg: " . $e->getMessage();
	exit();
}
$conn->close(); 
//echo $entret [0]["nombre"];
$total=$data[0]["precio"]*$data[0]["cantidad"];
?>
<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Proyecto</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>


<header class="header">

  <nav class="navbar navbar-expand-lg  navbar-dark  justify-content-around">


    <img
      src="img\logo.png"
      style="width:45px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <nav class="navbar justify-content">
        <form class="form-inline ">
          <input class="form-control sm-2" type="search" placeholder="Buscar producto" aria-label="Search">
          <button class="btn btn-boton-buscar sm-10 type=" submit>Buscar</button>
        </form>
      </nav>
      <ul class="navbar-nav ml-auto  ">
        <li class="nav-item active">
          <a class="nav-link" href="login.HTML">Ingresar<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.HTML">Registrarse<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <img
            src="img\carrito.png"
            class="media-object" style="width:30px">
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>
      </ul>
    </div>

  </nav>
</header>

<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
    <div class="contenidoo">
  <div class="card-group ">
    <div class="card">
      <img
        src="img\Artesanía.jpg"
        class="card-img-top" alt="...">

    </div>
    <div class="card">
      <label class="col-sm-6 col-form-label" id="detalleproducto">Detalles del producto</label>
    </div>
    <div class="card">

      <form>
        <div class="form-group row">

          <label for="inputfecha" class="col-sm-12 col-form-label " id="detallesonsignacion">Consignar a la cuenta 0019 0020 1234567890</label>
          <label for="inputfecha" class="col-sm-12 col-form-label " id="detallesonsignacion">Nombre : Juan Perez </label>


        </div>

        <div class="form-group row">

          <label for="inputfecha" class="col-sm-6 col-form-label" id="precioproduto">Precio</label>

        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-boton-pago">FINALIZAR COMPRA</button>

        </div>
      </form>
    </div>
  </div>
  </div>


</body>
<footer class="class=" page-footer special-color-dark pt-4>
  <div class="container">
    <div class="row py-4 d-flex align-items-center">
      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
        <h6 class="mb-0">Siguenos en nuestras redes sociales!</h6>
      </div>
      <div class="col-md-6 col-lg-7 "></div>
      <img
        src="img\facebook.png"
        style="width:45px">
    </div>


  </div>
  </div>


</footer>

</html>