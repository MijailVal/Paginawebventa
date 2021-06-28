<?php
	session_start();
	$message="";
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
    <a >	<span class="mr-5 ml-1 text-primary" >  SOLO PARA ELLAS</span></a>
    <a href="nuevocliente.php" ><i class="fas fa-user-plus ml-1"></i><span class="mr-5 ">  Nuevo Cliente</span></a>
	<a href="nuevaprenda.php" ><i class="fas fa-tshirt ml-1"></i><span class="mr-5">  Nueva Prenda</span></a>
	<a href="nuevaventa.php"  class="active"><i class="fas fa-money-bill-wave ml-1"></i><span class="mr-5"> Nueva Venta</span></a>
	<a href="#" ><i class="far fa-clipboard ml-1"></i><span class="mr-5"> Reportes</span></a>
	<a href="#" ><i class="fas fa-chart-bar ml-1"></i><span class="mr-5"> Estadisticas</span></a>
	<a href="salir.php"class="text-danger"><i class="fab fa-angellist ml-2"></i><span class="mr-5" > SALIR</span></a>
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <h1 class="text-center mt-4">Realizar Venta</h1>
  <form class="container-fluid mt-3">
    <div class="row ">
        <div class="col-lg-4 ">
            <select type="tel" class="form-control mb-3 input-sm"   name="clienteVenta" id="clienteVenta" required >  
            <option value="A"> Selecciona Cliente </option>
            <option value="0">Sin cliente </option>
            <?php 
            require 'DAO/database.php';
            $sql="SELECT * FROM cliente";
            $result=$conn->prepare($sql);
            $result->execute();
            $show=$result->fetchAll(PDO::FETCH_ASSOC);
            foreach($show as $cliente){
          ?>
          <option value="<?php echo $cliente['dni']?>">
            <?php echo $cliente['nombre']."  ".$cliente['apellido']?>
          </option>
          <?php } ?>
          </select>  
        </div>
        <div class="col-md-4 " >
            <select type="tel" class="form-control mb-3 " name="codproducto" id="selectproducto"  required >
                <option value="A"> Selecciona Producto</option>
                <?php 
                    require 'DAO/database.php';
                    $sql="SELECT * FROM producto";
                    $result=$conn->prepare($sql);
                    $result->execute();
                    $show=$result->fetchAll(PDO::FETCH_ASSOC);
                    foreach($show as $producto){
                    ?>
                    <option value="<?php echo $producto['codProducto']?>">
                      <?php echo $producto['nomProducto']?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4 "><input type="number" class="form-control mb-3" placeholder="Cantidad" name="cantidad" min="1" id="Stock" required ></div>
        
    </div>
    <div class="text-center mr-4 mt-2">
        <input type="submit" name="btnAgregar" class="btn btn-success  ml-4 "value="Agregar ">
        <input type="submit" name="btnCancelar" class="btn btn-danger ml-4 "value="Cancelar Venta"> 
    </div>
  </form>
  <table class="table table-sm table-bordered container-fluid text-center mt-3">
  <thead>
    <tr >
      <th scope="col"class="text-center">Dni</th>
      <th scope="col"class="text-center">Codigo Producto</th>
      <th scope="col"class="text-center">Cantidad</th>
      <th scope="col"class="text-center">borrar</th>
      </thead>
      
</table>
 
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>  
  
</body>
</html>