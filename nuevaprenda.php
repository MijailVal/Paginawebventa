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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<body>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <?php
   include ('DAO/ProductoDAO.php');
   $dao = new ProductoDAO();
   if($_POST){
     if(isset($_POST['btnAgregar'])) {
       $producto = new Producto();
       $producto->setCodProducto($_POST["codproducto"]);
       $producto->setPrecio($_POST["precio"]);
       $producto->setStock($_POST["stock"]);
       $producto->setNomProducto($_POST["nomproducto"]);
       $producto->setDescripcion($_POST["descripcion"]);
       $producto->setMarca($_POST["marca"]);
       $producto->setImagen($_FILES["imagen"]);
       $i=$dao->Agregar($producto);
       
       if ($i == 1) {
        ?><script>alertify.notify('Prenda Agregada :)', 'success', 1.8, function(){  console.log('dismissed'); })</script><?php


       }
       else {
        ?><script>alertify.notify('Prenda no Agregada :(', 'error', 1.8, function(){  console.log('dismissed'); })</script><?php
	
       }
     }else if (isset($_POST['btnActualizar'])) {
			$producto = new Producto();
	    $producto->setCodProducto($_POST["codproducto"]);
      $producto->setPrecio($_POST["precio"]);
      $producto->setStock($_POST["stock"]);
      $producto->setNomProducto($_POST["nomproducto"]);
      $producto->setDescripcion($_POST["descripcion"]);
      $producto->setMarca($_POST["marca"]);
      $producto->setImagen($_FILES["imagen"]);
			$i =$dao->Actualizar($producto);
			if ($i == 1) {
        ?><script>alertify.notify('Prenda Actualizada :)', 'success', 1.8, function(){  console.log('dismissed'); })</script><?php

			}
			else {
        ?><script>alertify.notify('Prenda no Actualizada :(', 'error', 1.8, function(){  console.log('dismissed'); })</script><?php
	
			}
		}
   }
  ?>
	<div class="topnav" id="myTopnav">
    <a ><span class="mr-5 ml-1 text-primary" >  SOLO PARA ELLAS</span></a>
    <a href="nuevocliente.php" ><i class="fas fa-user-plus ml-1"></i><span class="mr-5 ">  Nuevo Cliente</span></a>
	<a href="nuevaprenda.php" class="active" ><i class="fas fa-tshirt ml-1"></i><span class="mr-5">  Nueva Prenda</span></a>
	<a href="nuevaventa.php" ><i class="fas fa-money-bill-wave ml-1"></i><span class="mr-5"> Nueva Venta</span></a>
	<a href="#" ><i class="far fa-clipboard ml-1"></i><span class="mr-5"> Reportes</span></a>
	<a href="#" ><i class="fas fa-chart-bar ml-1"></i><span class="mr-5"> Estadisticas</span></a>
	<a href="salir.php"class="text-danger"><i class="fab fa-angellist ml-2"></i><span class="mr-5" > SALIR</span></a>
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <h1 class="text-center mt-4 mb-3">Nueva Prenda</h1>
  <form class="container-fluid" method="POST" enctype="multipart/form-data" > 
    <div class="row">
       <div class="col-sm"><input type="tel" class="form-control mb-3 " placeholder="Codigo Producto"  minlength="6" maxlength="6" name="codproducto" id="CodProducto"  required >   </div>
       <div class="col-sm"><input type="text"class="form-control mb-3" placeholder="Nombre Producto"  name="nomproducto" id="NomPorducto"  required ></div>
       <div class="col-sm"><input type="text"class="form-control mb-3"placeholder="Marca"  name="marca" id="Marca" required ></div>
    </div>
    <div class="row">
      <div class="col-sm"><input type="number"class="form-control mb-3" placeholder="Precio" step="0.01" min="0" placeholder="0.00" name="precio" id="Precio" required  ></div>
      <div class="col-sm"><input type="number" class="form-control mb-3" placeholder="Stock" name="stock" min="1" id="Stock" required ></div>
      <div class="col-sm"><input class="form-control  mb-3"  name="imagen" type="file"></div>
    </div>
    <div class="row mb-4">
        <textarea class="form-control form-control-sm col-8 ml-3 " name="descripcion"   placeholder="Descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
        <input type="submit" name="btnAgregar" class="btn btn-success  mt-4 mb-2 ml-4 "value="Agregar Prenda">
        <input type="submit" name="btnActualizar" class="btn btn-primary mt-4 mb-2 ml-4 "value="Actualizar prenda">
    </div>
   

  </form>
  <table class="table table-sm table-bordered  container-fluid text-center">
  <thead>
    <tr>
      <th scope="col"class="text-center">CodProducto</th>
      <th scope="col"class="text-center">Producto</th>
      <th scope="col"class="text-center">Marca</th>
      <th scope="col"class="text-center">Precio</th>
      <th scope="col"class="text-center">Stock</th>
      <th scope="col"class="text-center">Descripcion</th>
      <th scope="col"class="text-center">Imagen</th>
      <th scope="col"class="text-center">Borrar</th>
      </thead>
         <?php foreach($dao->Listar() as $r): ?>
          <tr>
            <td><?php echo $r->getCodProducto('codproducto'); ?></td>
            <td><?php echo $r->getNomProducto('nomproducto'); ?></td>
            <td><?php echo $r->getMarca('marca');?></td>
            <td><?php echo $r->getPrecio('precio'); ?></td>
            <td><?php echo $r->getStock('stock'); ?></td>
            <td><?php echo $r->getDescripcion('descripcion'); ?></td>
            <td><img  style="width: 50px;height: 50px; "src="data:image/png;base64,<?php echo base64_encode($r->getImagen('imagen'))?>" ></td>
            <td> 
              <a class="btn btn-danger py-1 "href="eliminar.php?codproducto=<?php echo $r->getCodProducto('codproducto'); ?>" >
                <i class="fas fa-times text-white"></i>
              </a>
              
           </td>
         </tr>
         <?php endforeach; ?>
</table>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>  
</body>
</html>