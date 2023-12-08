<?php
include "conex.php";
$query = "SELECT * FROM pregunta ORDER BY fecha DESC";
$reslt = mysqli_query($cone, $query);
$comentarios = array();
while ($row = mysqli_fetch_assoc($reslt)) {
    $comentarios[$row['id']] = array();
    $pregunta_id = $row['id'];
    $comentarios_query = "SELECT * FROM comentarios WHERE id_pregunta = $pregunta_id ORDER BY fecha DESC";
    $comentarios_reslt = mysqli_query($cone, $comentarios_query);

    while ($comentario_row = mysqli_fetch_assoc($comentarios_reslt)) {
        $comentarios[$row['id']][] = $comentario_row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Preguntas - Digital Docs</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
    <!-- Añade la etiqueta meta para el viewport -->
    
</head>
<body>
    <header class="hero">
        <img class="animated-image" id="img1" src="img1.png" alt="Logo de Digital Docs">
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <h1 class="hero__title">Digital Docs</h1>
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

            <div class="comentarios-container">
                
                
                
                <?php
                // Verificar si la cookie 'nombre_usuario' está configurada
                if (isset($_COOKIE['nombre_usuario'])) {
                    // Obtener el valor de la cookie 'nombre_usuario'
                    $nombre_usuario = $_COOKIE['nombre_usuario'];
                } else {
                    // Si la cookie no está configurada, establecer el valor predeterminado o dejar en blanco
                    $nombre_usuario = "";
                }
                ?>
                
                
                
                
                <?php foreach ($comentarios as $pregunta_id => $comentarios_pregunta) : ?>
                <div class="pregunta-container">
                    <?php
                    $pregunta_query = "SELECT * FROM pregunta WHERE id = $pregunta_id";
                    $pregunta_reslt = mysqli_query($cone, $pregunta_query);
                    $pregunta = mysqli_fetch_assoc($pregunta_reslt);
                    ?>
                    <h5><?php echo $pregunta['pregunta']; ?></h5>
                    <p3>Autor: <?php echo $pregunta['nombre']; ?></p3><br>
                    <p3>Tema: <?php echo $pregunta['categoria']; ?></p3><br>
                    <p3>Fecha: <?php echo $pregunta['fecha']; ?></p3><br><br>

                    <h3>Comentarios:</h3>
                    <hr>

                    <?php foreach ($comentarios_pregunta as $comentario_row) : ?>
                        <p><strong><?php echo $comentario_row['nombre']; ?>:</strong> <?php echo $comentario_row['comentario']; ?></p>
                        <p>Fecha: <?php echo $comentario_row['fecha']; ?></p>
                        <hr>
                    <?php endforeach; ?>

                    <!-- Formulario para agregar comentario debajo de cada pregunta -->
                <form class='comentario-form' method='post' action='comentar.php'>
                <input type='hidden' name='id_pregunta' value='<?php echo $pregunta_id; ?>'>
                <label for='nombre'>Nombre:</label>
                <input type='text' id='nombre' name='nombre' value="<?php echo isset($nombre_usuario) ? $nombre_usuario : ''; ?>" required><br>
                <label for='comentario'>Comentario:</label>
                <textarea id='comentario' name='comentario' rows='4' required></textarea>
                <button type='submit' class='btn-comentario'>Comentar</button>
            </form>
                </div>
                <?php endforeach; ?>
            </div>
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
        <div class="cube"></div>
    </footer>
<script>

 
        // Función para enviar el formulario de comentario mediante AJAX y actualizar la lista de comentarios
        function enviarComentario(id_pregunta, nombre, comentario) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "comentar.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Comentario enviado con éxito, actualizamos la lista de comentarios
                        var comentariosContainer = document.getElementById("comentarios-" + id_pregunta);
                        comentariosContainer.innerHTML = xhr.responseText; // Actualizamos el contenido de la sección de comentarios
                    } else {
                        // Hubo un error al enviar el comentario, muestra un mensaje de error
                        alert("Error al agregar el comentario.");
                    }
                }
            };

            var data = JSON.stringify({ "id_pregunta": id_pregunta, "nombre": nombre, "comentario": comentario });
            xhr.send(data);
        }

        // Función que se ejecuta al cargar la página
        window.onload = function() {
            // Obtenemos todos los formularios de comentarios
            var formulariosComentario = document.querySelectorAll(".comentario-form");

            // Asignamos el evento 'click' al botón para enviar el comentario mediante AJAX
            formulariosComentario.forEach(function(formulario) {
                var botonComentar = formulario.querySelector(".btn-comentario");
                if (botonComentar) {
                    botonComentar.addEventListener("click", function() {
                        // Obtenemos los datos del formulario
                        var id_pregunta = formulario.querySelector("input[name='id_pregunta']").value;
                        var nombre = formulario.querySelector("input[name='nombre']").value;
                        var comentario = formulario.querySelector("textarea[name='comentario']").value;

                        // Enviamos el comentario mediante AJAX
                        enviarComentario(id_pregunta, nombre, comentario);
                    });
                }
            });
        };
    </script>


  
</body>
</html>
<form method="post" action="cerrar_sesion.php">
    <button type="submit" class="floating-button">Cerrar sesión</button>
</form>
