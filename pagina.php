<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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

	<div class="topnav " id="myTopnav">
    <a ><span class="  text-success" >  SOLO PARA ELLAS</span></a>
    <a href="catalogo.php"class=""><i class="fab fa-angellist ml-2"></i><span class="mr-5" > Catalogo</span></a>
    <a href="somos.php"   ><i class="fas fa-money-bill-wave "></i><span class="mr-5"> Nosotros</span></a>
    <a href="index.php"class="active"><i class="fab fa-angellist ml-2"></i><span class="mr-5" > Login</span></a>
    
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
     </a>
  </div>

    <title>Solo para ellas</title>
</head>
<body>
  <form class="text-center " method="POST" action="index.php"  >
          <h1 class="text-center mb-4 mt-5 text-light ">LOGIN</h1>
            <div class=" mb-4 col-md-4 offset-md-4 "> 
              <input  placeholder="&#128100;  usuario" name="email"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-4 col-md-4 offset-md-4">
              <input type="password" placeholder="&#128274;  contraseña" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" name="submit"class="btn btn-primary col-md-2 container-fluid ">Ingresar</button>
</form>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<br><br>
 <br><br><br>
 <br>
 
 
  <footer ><source> <center>Frank Montalico</center> </footer>
  <footer ><source> <center>Luis Eduardo Huaraya</center> </footer>
  <footer ><source> <center>Wilson Donato Holguin Herrera</center> </footer>
<footer ><source> <center>Romulo Mijail Valdivia</center> </footer>

</body>
</html>
<?php
require 'DAO/database.php';
if(isset($_POST['submit'])){
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    $id=$_SESSION['user_id'];
    if($id==1){
      
      header("location:contenido.php");
    }
  } else {
     ?><script>alertify.notify('Usuario incorrecto :v', 'error', 1.8, function(){  console.log('dismissed'); })</script><?php
  }
}
}

?>