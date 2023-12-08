<?php
include "conex.php"; // Incluye tu archivo de conexión a la base de datos

if (isset($_POST['registro_usuario'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $tipo_usuario = 0; // Tipo de usuario para usuarios regulares
    
    // Realiza la consulta SQL para agregar el nuevo usuario
    $sql_agregar = "INSERT INTO usuarios2 (nombre_usuario, correo, contrasena, tipo_usuario) VALUES ('$nombre_usuario', '$correo', '$contrasena', '$tipo_usuario')";
    $resultado_agregar = $cone->query($sql_agregar);
    
    if ($resultado_agregar) {
        header("Location: Login_usuario.php"); // Redirecciona después de registrar
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
   <link rel="stylesheet" type="text/css" href="estilos2c.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
   
</head>
<body>
       <header class="hero">

        <img class="animated-image"  id="img1" src="img1.png" alt="Logo de Digital Docs">

        <h1 class="hero__title">
            Digital Docs
        </h1>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
    </header> 
    <div class="animated-background">
    <div class="interior">
    <div class="interior">
        <nav class="navegacion">
            <ul>
                <li><a href="index.php" target="blank">Inicio</a></li>
                <li class="submenu">
                    <a href="Prox.php" target="blank">Documentación</a>
                    </li>
                <li class="submenu">
                    <a href="Preguntas.php" target="blank">Preguntas</a>
                </li>
                <li><a href="Premium.html" target="blank">Premium</a></li>
                <li><a href="sobre.html" target="blank">Sobre nosotros</a></li>
                <li><a href="login.php" target="blank">Inicia sesión</a></li>
                <li><a href="registro_usuario.php" target="blank">Registrate</a></li>
                <li><a href="login_admin.php" target="blank">¿Eres administrador?</a></li>
                </ul>
        </nav>
    </div>
    <div id="conte">
        <center>
            <main>
                <br />
    
    <h1>Registro de Usuario</h1>
    <form class="registro-form" action="registro_usuario.php" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br />
        
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br />
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br />
        
        <label for="confirmar_contrasena">Confirmar contraseña:</label>
        <input type="password" name="confirmar_contrasena" required><br />
        
        <input type="submit" name="registro_usuario" value="Registrarse" class="btn">
    </form>
    
            </main>
        </center>
    </div>
    


 </div> 
    <footer class="hero">
        <p>&copy; 2023 Digital Docs. Todos los derechos reservados.</p>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
    </footer>
</body>




</html>

<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
