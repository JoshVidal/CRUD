<?php
ob_start(); // Iniciar búfer de salida

session_start(); // Iniciar sesión

if (isset($_SESSION['usuario'])) {
    // Si el usuario ya ha iniciado sesión, redirigirlo a la página de administración si es administrador
    if ($_SESSION['tipo_usuario'] == 1) {
        header("Location: pagina_administracion.php");
        exit();
    }
    
      // Almacenar el nombre de usuario en una cookie
    setcookie('nombre_usuario', $fila['nombre_usuario'], time() + (86400 * 30), "/"); // 30 días de validez
    
    // Si no es administrador, redirigirlo a otra página o mostrar contenido adecuado
    header("Location: index.php");
    exit();
}

include "conex.php"; // Incluye tu archivo de conexión a la base de datos

if (isset($_POST['login'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar las credenciales de inicio de sesión
    $sql = "SELECT * FROM usuarios2 WHERE correo = '$correo' AND contrasena = '$contrasena' AND cuenta_activa = 1"; // Agregar condición para cuenta activa
    $resultado = $cone->query($sql);

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $fila['nombre_usuario'];
        $_SESSION['tipo_usuario'] = $fila['tipo_usuario'];
        
        
          // Almacenar el nombre de usuario en una cookie
    setcookie('nombre_usuario', $fila['nombre_usuario'], time() + (86400 * 30), "/"); // 30 días de validez
        

        if ($_SESSION['tipo_usuario'] == 1) {
            // Si es administrador, redirigirlo a la página de administración
            header("Location: pagina_administracion.php");
            exit();
        } else {
            // Si es usuario regular, redirigirlo a otra página o mostrar contenido adecuado
            header("Location: bienvenida.php");
            exit();
        }
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>


<!DOCTYPE html>
<html>
    <meta charset="UTF-8">

<head>
    <title>INICIAR SESION - Digital Docs</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
    <!-- Añade la etiqueta meta para el viewport -->
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

    <form  class="form-estilo" action="login.php" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br />
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br />
        
        <input type="submit" name="login" value="Iniciar Sesión" class="btn">
    </form>


          <style>
 
      
        
        .form-estilo {
            background-color:#f3f9fe00;
        }
    </style>

            </main>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />

            <br />
            <br />
        </center>
    </div>

    <footer class="hero"><br>
        <p>&copy; 2023 Digital Docs. Todos los derechos reservados.</p>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
    </footer>
    </div>
</body>
</html>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
