
<?php
session_start();
$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : '';
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : '';

// Autocompletar el campo de nombre con el valor almacenado en la cookie
$nombre_autocompletar = isset($_COOKIE['nombre_usuario']) ? $_COOKIE['nombre_usuario'] : '';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Inicio - Digital Docs</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">

    <!-- Añade la etiqueta meta para el viewport -->
</head>

<?php  include("conex.php") ?> 

<script>
// Autocompletar el campo de nombre con el valor almacenado en la cookie
document.getElementById("nombre").value = "<?php echo $nombre_usuario; ?>";
</script>
<body>
    <header class="hero">
        <img class="animated-image"  id="img1" src="img1.png" alt="Logo de Digital Docs">
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <h1 class="hero__title"> Digital Docs</h1>
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

 <div class="container">
        <div class="preguntas-container">
            <h5>Realiza preguntas</h5><br>
            <form action="G_preg.php" method="post">

                <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>">
                <!-- Resto del formulario -->
                <label for="pregunta">Pregunta:</label>
                <textarea name="pregunta" rows="4" required></textarea><br>
                <label for="categoria">Categoría:</label>
                <select name="categoria" required>
                    <option value="">Selecciona una categoría</option>
                    <option value="Programacion">Programación</option>
                    <option value="Tecnologias">Tecnologias</option>
                    <option value="Matematicas">Matematicas</option>
                    <option value="Redes">Redes</option>
                    <option value="Herramientas">Herramientas</option>
                    <option value="Duda">Duda</option>
                    <option value="Otros">Otros...</option>
                    <!-- Agrega más opciones de categorías si lo deseas -->
                </select><br>
                <input type="submit" name="G_preg" value="Enviar Pregunta">
            </form>


        </div>
        <div class="archivos-container">
            <h5>Comparte archivos</h5><br>
<form action="procesar_carga.php" method="post" enctype="multipart/form-data">
    
    
    <label for="nombre">Nombre:</label>
  
                  <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre_usuario) ? $nombre_usuario : ''; ?>">
  
  
    <label for="archivo">Selecciona un archivo:</label>
    <input type="file" name="archivo" required><br>
    <label for="descripcion">Descripción del archivo:</label>
    <textarea name="descripcion" rows="4" required></textarea><br>
    <label for="categoria">Categoría:</label>
    <select name="categoria" required>
        <option value="">Selecciona una categoría</option>
        <option value="Programacion">Programación</option>
       
        <option value="Tecnologias">Tecnologias</option>
                    <option value="Matematicas">Matematicas</option>
                    <option value="Redes">Redes</option>
                    <option value="Herramientas">Herramientas</option>
                    <option value="Otros">Otros...</option>
        <!-- Agrega más opciones de categorías si lo deseas -->
    </select><br>
    <input type="submit" name="subir_archivo" value="Subir Archivo">
</form>
        </div>
    </div>


    </div>



 <script>
        // Obtener el valor de la cookie 'nombre_usuario'
        var nombreUsuario = getCookie('nombre_usuario');

        // Autocompletar el campo de nombre
        document.getElementById("nombre").value = nombreUsuario;

        // Función para obtener el valor de una cookie por nombre
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }
    </script>
</body>



</html>

    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>

<footer class="hero">
    <p>&copy; 2023 Digital Docs. Todos los derechos reservados.</p>

    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>

 
        </div>
 
</footer>


<form method="post" action="cerrar_sesion.php">
    <button type="submit" class="floating-button">Cerrar sesión</button>
</form>

