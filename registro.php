<!DOCTYPE html>
<?php
$errorEmail = "";
$errorPassword = "";

if($_POST){
$email = $_POST["email"];
$password = $_POST["password"];
$error = false;

if($email == ""){
  $errorEmail = "necesita escribir un email";
  $error = true;
}else if (!filer_var($email,FILTER_VALIDATE_EMAIL)){
  $errorEmail = "el mail es invalido";
  $error = true;
}


if($password == ""){
  $errorPassword = "necesita escribir un email";
  $error = true;
}else if (strlen($password) < 7){
  $errorPassword = "la contraseña debe tener 7 caracteres como minimo";
  $error = true;
}

if(!$errores){

$usuarioJSON = file_get_contents("usuario.json");

$usuarioPHP = json_decode($usuarioJSON,true);

$usuarioNuevo = [
  "nombre"=>"",
  "apellido"=>"",
  "email"=> $email,
  "telefono"=>"",
  "contraseña"=>password_hash($password,PASSWORD_DEFAULT)
];

$usuarioPHP[] = $usuarioNuevo;
$usuarioJSON = json_encode ($usuarioPHP);
file_put_contents("usuario.json",$usuarioJSON);
echo "Bienvenido ".$usuarioNuevo["nombre"];

}

}

 ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="registro.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <header>
    <div class="log">
      <a href="login.html">Log in</a>
      <a href="registro.html">Sign in</a>
    </div>
    <div class="navegacion">
      <a href="home.html"><img src="img/logo.png" alt="logo"></a>
      <div class="busqueda">
        <input type="search" id="buscar" name="q" placeholder="Buscar producto" size="30">
      <button>Buscar</button>
      </div>
      <nav>
        <a  href="#">Contacto</a>
        <a  href="#">Quienes Somos</a>
        <a  href="#">Historial</a>
        <a  href="#">Ofertas</a>
        <a  href="#">Productos</a>
       </nav>
     </div>
  </header>

  <main>
    <div class="contForm">
      <h1 class="tituloRegistro">Registro</h1>
      <form class="formularioRegistro" action="registro.php" method="POST" >
        <input type="text" name="nombre" value="" placeholder=" Ingrese su nombre...">
        <input type="text" name="apellido" value="" placeholder=" Ingrese su apellido...">
        <input type="text" name="email" value="" placeholder=" Ingrese su mail...">
          <span><?=$errorEmail?></span>
        <input type="password" name="password" value="" placeholder=" Ingrese su contraseña...">
          <span><?=$errorPassword?></span>
        <input type="password" name="verificacion" value="" placeholder=" Verifique la contraseña...">
          <span><?=$errorPassword?></span>
        <button type="submit" name="button">Registrarme</button>
      </form>
      <a href="login.html">¿Ya tiene un usuario?</a>
    </div>
  </main>

  <footer>
    <h2>Copyright © 2019 Moodis S.R.L.</h2>
    <div>
      <a href="#"><img src="img/twitter.png" alt="twit"></a>
      <a href="#"><img src="img/facebook.png" alt="face"></a>
      <a href="#"><img src="img/whatsap.png" alt="whats"></a>
      <a href="#"><img src="img/insta.png" alt="inst"></a>
    </div>
  </footer>
</body>
</html>
