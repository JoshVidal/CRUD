<?php
session_start(); // Iniciar sesión (asegúrate de hacerlo al principio de la página)
if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: Login_usuario.html");
    exit();
}

// Obtener el nombre de usuario almacenado en la cookie (esto es opcional, puedes obtenerlo desde la base de datos si lo prefieres)
$nombre_usuario = isset($_COOKIE['nombre_usuario']) ? $_COOKIE['nombre_usuario'] : '';
?>

<!doctype html>

<html lang="en">
<div class="hero"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bienvenido a Digital Docs</title>
  <link rel="stylesheet" media="all" href="style.css" />
</head>

<div class="hero"> 
  <div class="hero__title">
      <h5>Bienvenido, <?php echo $nombre_usuario; ?>!</h5>
      <h7>¡Gracias por iniciar sesión en Digital Docs!</h7> <br><br><br>
      <a href="index.php" class="btn">Ir al inicio</a>
  
  
  </div>
<body>

  


  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
</div>
</body>
</html>
