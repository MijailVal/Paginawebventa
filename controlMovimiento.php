<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="topnav" id="myTopnav">
    <a class="active ">	<span class="mr-2 ml-1" >  SOLO PARA ELLAS</span></a>
    <a href="controlMovimiento.php" ><i class="fab fa-accusoft"></i><span class="mr-2 "> Control Movimiento</span></a>
    <a href="nuevocliente.php" ><i class="fas fa-user-plus ml-1"></i><span class="mr-2 ">  Nuevo Cliente</span></a>
	<a href="nuevaprenda.php" ><i class="fas fa-tshirt ml-1"></i><span class="mr-2">  Nueva Prenda</span></a>
	<a href="nuevaventa.php" ><i class="fas fa-money-bill-wave ml-1"></i><span class="mr-2"> Nueva Venta</span></a>
	<a href="#" ><i class="far fa-clipboard ml-1"></i><span class="mr-2"> Reportes</span></a>
	<a href="#" ><i class="fas fa-chart-bar ml-1"></i><span class="mr-2"> Estadisticas</span></a>
	<a href="salir.php"class="text-danger"><i class="fab fa-angellist ml-2"></i><span class="mr-5" > SALIR</span></a>
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <h1 class="text-center mt-4"> Control de Movimiento</h1>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>  
</body>
</html>