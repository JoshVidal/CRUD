<!DOCTYPE html>
<html>
<head>
    <title>Login - Admin - Digital Docs</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
    <!-- Añade la etiqueta meta para el viewport -->
</head>
<div class="animated-background">
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

                   <h1>Iniciar Sesión de Administración</h1>
    
    <form method="post" action="procesar_login_admin.php" class="registro-form">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required><br>
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>
        
        <button type="submit" name="admin_login">Iniciar Sesión</button>
    </form>
            </main>
        </center>
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
