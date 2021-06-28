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
      
      header("location:nuevocliente.php");
    }
  } else {
     ?><script>alertify.notify('Usuario incorrecto :v', 'error', 1.8, function(){  console.log('dismissed'); })</script><?php
  }
}
}
?>

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

    <title>Solo para ellas</title>
</head>
<body>
  <form class="text-center " method="POST" action="login.php"  >
          <h1 class="text-center mb-4 mt-5 text-light ">LOGIN</h1>
            <div class=" mb-4 col-md-4 offset-md-4 "> 
              <input  placeholder="&#128100;  usuario" name="email"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-4 col-md-4 offset-md-4">
              <input type="password" placeholder="&#128274;  contraseña" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" name="submit"class="btn btn-primary col-md-2 container-fluid ">Ingresar</button>
</form>


</body>
</html>
