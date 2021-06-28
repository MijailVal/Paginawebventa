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
<body >
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<?php
   include ('DAO/ClienteDAO.php');
   $dao = new ClienteDAO();
   if($_POST){
     if(isset($_POST['btnAgregar'])) {
       $cliente = new cliente();
       $cliente->setDni($_POST["dni"]);
       $cliente->setNombre($_POST["nombre"]);
       $cliente->setApellido($_POST["apellido"]);
       $i=$dao->Agregar($cliente);
       
       if ($i == 1) {
        ?><script>alertify.notify('Cliente Agregado :)', 'success', 1.8, function(){  console.log('dismissed'); })</script><?php

       }
       else {
        ?><script>alertify.notify('Cliente no Agregado :(', 'error', 1.8, function(){  console.log('dismissed'); })</script><?php
       }
     }	else if (isset($_POST['btnActualizar'])) {
			$cliente = new cliente();
      $cliente->setDni($_POST["dni"]);
      $cliente->setNombre($_POST["nombre"]);
      $cliente->setApellido($_POST["apellido"]);
			$i =  $dao->Actualizar($cliente);
			if ($i == 1) {
				?><script>alertify.notify('Datos Actualizados', 'success', 1.8, function(){  console.log('dismissed'); })</script><?php
			}
			else {
        ?><script>alertify.notify('Error en Actualizacion', 'error', 1.8, function(){  console.log('dismissed'); })</script><?php
			}
		}
   }

  ?>
	<div class="topnav " id="myTopnav">
    <a ><span class="  text-primary" >  SOLO PARA ELLAS</span></a>
    <a href="nuevocliente.php" class="active" ><i class="fas fa-user-plus "></i><span class="mr-5 ">  Nuevo Cliente</span></a>
  	<a href="nuevaprenda.php"  ><i class="fas fa-tshirt "></i><span class="mr-5">  Nueva Prenda</span></a>
  	<a href="nuevaventa.php" ><i class="fas fa-money-bill-wave "></i><span class="mr-5"> Nueva Venta</span></a>
  	<a href="#" ><i class="far fa-clipboard "></i><span class="mr-5"> Reportes</span></a>
  	<a href="#" ><i class="fas fa-chart-bar "></i><span class="mr-5"> Estadisticas</span></a>
  	<a href="salir.php"class="text-danger"><i class="fab fa-angellist ml-2"></i><span class="mr-5" > SALIR</span></a>
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
     </a>
  </div>

  <h1 class="text-center mt-4">Nuevo Cliente</h1>
  <form class="container-fluid "method="POST"> 
    <div class="row">
       <div class="col-sm"><input type="tel" class="form-control mb-3 " placeholder="Dni"  minlength="8" maxlength="8" name="dni" id="Dni"  required >   </div>
       <div class="col-sm"><input type="text"class="form-control mb-3" placeholder="Nombre"  name="nombre" id="Nombre"  required ></div>
       <div class="col-sm"><input type="text"class="form-control mb-3"placeholder="Apellido"  name="apellido" id="Apellido" required ></div>
    </div>
    <div class="row mb-4 offset-md-4">
        <input type="submit" name="btnAgregar" class=" btn btn-success  mt-4 mb-1 ml-5 "value="Agregar Cliente">
        <input type="submit" name="btnActualizar" class="btn btn-primary mt-4 mb-1 ml-5 "value="Actualizar">
    </div>
   

  </form>
  <table class="table table-sm table-bordered container-fluid text-center">
  <thead>
    <tr >
      <th scope="col"class="text-center">Dni</th>
      <th scope="col"class="text-center">Nombre</th>
      <th scope="col"class="text-center">Apellido</th>
      <th scope="col"class="text-center">Borrar</th>
      </thead>
      <?php foreach($dao->Listar() as $r): ?>
          <tr>
            <td><?php echo $r->getDni('dni'); ?></td>
            <td><?php echo $r->getNombre('nombre'); ?></td>
            <td><?php echo $r->getApellido('apellido');?></td>
            <td>
              <a class="btn btn-danger py-1 "href="eliminar.php?dni=<?php echo $r->getDni('dni'); ?>" >
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