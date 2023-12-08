
<!DOCTYPE html>
<html>
<head>
    <title>Registro - Admin - Digital Docs</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
    <!-- Añade la etiqueta meta para el viewport -->
</head>

<body>
    <header class="hero">
        
             
    
        

        <img id="img1" src="img1.png" alt="Logo de Digital Docs">

        <h1 class="hero__title">
        Administrador de usuarios
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
                <br />
<h2>Registro de Administrador</h2>
    <form action="procesar_registro_administrador.php" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>

        <input type="submit" value="Registrar Administrador" name="registrar_administrador">
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
    <style>
        /* Estilos generales */
        /* ... (No se muestra el contenido anterior para mantener el tamaño del texto) ... */

        /* Estilos responsive */
        @media screen and (max-width: 768px) {
            /* Aplica aquí los estilos para pantallas más pequeñas */
            header h1 {
                font-size: 20px;
            }

            main {
                padding: 10px;
            }

            input[type="submit"] {
                padding: 8px 16px;
            }
        }
        
        form {
            background-color: #fdfdfd00;
        }
    </style>
    </div>
</body>
</html>
