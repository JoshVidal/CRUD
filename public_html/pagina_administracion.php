<?php
session_start(); // Iniciar sesión

if (!isset($_SESSION['admin'])) {
    // Si no hay sesión de administrador, redirigir al formulario de inicio de sesión de administración
    header("Location: login_admin.php");
    exit();
}

include "conex.php"; // Incluye tu archivo de conexión a la base de datos

// Activar o desactivar cuenta de usuario
if (isset($_POST['activar_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
    $sql_activar = "UPDATE usuarios2 SET cuenta_activa = 1 WHERE id = '$id_usuario'";
    $resultado_activar = $cone->query($sql_activar);
}

if (isset($_POST['desactivar_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
    $sql_desactivar = "UPDATE usuarios2 SET cuenta_activa = 0 WHERE id = '$id_usuario'";
    $resultado_desactivar = $cone->query($sql_desactivar);
}

// Eliminar usuario
if (isset($_POST['eliminar_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
    // Realizar la consulta SQL para eliminar el usuario con el id proporcionado
    $sql_eliminar = "DELETE FROM usuarios2 WHERE id = '$id_usuario'";
    $resultado_eliminar = $cone->query($sql_eliminar);
    // Redireccionar a la página de administración después de eliminar
    header("Location: pagina_administracion.php");
    exit();
}

// Consulta SQL para obtener los usuarios de la tabla "usuarios2"
$sql = "SELECT id, nombre_usuario, correo, tipo_usuario, cuenta_activa FROM usuarios2 ORDER BY id DESC"; // Ordenar por ID descendente (más recientes primero)
$resultado = $cone->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
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
    
    
    
    
    
        <center> 
    <br>
    <br>
    <h5>Agregar Nuevo Usuario</h5>
    <br>
    <br>
    <form method="post" action="agregar_usuario.php" class="preguntas-container" >
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <label for="tipo_usuario">Tipo de Usuario:</label>
        <select name="tipo_usuario" required>
            <option value="1">Administrador</option>
            <option value="0">Usuario Normal</option>
        </select>
        <br>
        
        <button type="submit" name="agregar_usuario" class="btn">Agregar Usuario</button>
    </form>
    </center>
    <br>
    <br>
    <br>
    <h5>Administración de Usuarios</h5>
    <br>
    <br>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Tipo de Usuario</th>
                <th>Estado de Cuenta</th>
                <th>Mas info</th>
                <th>Acciones</th>
                <th>                  </th>
            </tr>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['nombre_usuario']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo ($fila['tipo_usuario'] == 1) ? "Administrador" : "Usuario"; ?></td>
                        <td><?php echo ($fila['cuenta_activa'] == 1) ? "Activa" : "Desactivada"; ?></td>
                              
                            
<td>
<a href="javascript:void(0);" class="actions-btn view" onclick="toggleInfoMenu(<?php echo $fila['id']; ?>)">Ver Información</a>
            <div id="info-menu-<?php echo $fila['id']; ?>" class="info-menu hidden">
                <!-- Contenido del menú de información -->
                <p>Nombre: <?php echo $fila['nombre_usuario']; ?></p>
                <p>Correo: <?php echo $fila['correo']; ?></p>
                <p>Tipo: <?php echo ($fila['tipo_usuario'] == 1) ? "Administrador" : "Usuario Normal"; ?></p>
                <p>Cuenta: <?php echo ($fila['cuenta_activa'] == 1) ? "Activa" : "Desactivada"; ?></p>
                <p>Registro: <?php echo date('d/m/Y H:i:s', strtotime($fila['fecha_registro'])); ?></p>

            </div>
</td>

<td>
                            <form method="post" action="pagina_administracion.php">
                                <input type="hidden" name="id_usuario" value="<?php echo $fila['id']; ?>">
                                <button type="submit" name="eliminar_usuario" class="actions-btn delete">Eliminar</button><br>
                            </form>

                            <form method="post" action="activar_desactivar_usuario.php">
                                <input type="hidden" name="id_usuario" value="<?php echo $fila['id']; ?>">
                                <?php if ($fila['cuenta_activa'] == 1) { ?>
                                    <button type="submit" name="desactivar_usuario" class="actions-btn">Desactivar Cuenta</button><br>
                                <?php } else { ?>
                                    <button type="submit" name="activar_usuario" class="actions-btn">Activar Cuenta</button><br>
                                <?php } ?>
                            </form>







</td> 

<td>
            <button class="actions-btn edit" onclick="toggleEditForm(<?php echo $fila['id']; ?>)">Editar</button> <br>
        <form id="edit-form-<?php echo $fila['id']; ?>" class="edit-form hidden" method="post" action="editar_usuario.php">
                                <input type="hidden" name="id_usuario" value="<?php echo $fila['id']; ?>"><br>
                                <input type="text" name="nuevo_nombre_usuario" required placeholder="Nuevo nombre">
                                <input type="email" name="nuevo_correo" required placeholder="Nuevo correo">
                                <input type="password" name="nueva_contrasena" placeholder="Nueva contraseña">
                                <label for="nuevo_tipo_usuario">Tipo de Usuario:</label>
                                <select name="nuevo_tipo_usuario" required>
                                    <option value="1">Administrador</option>
                                    <option value="0">Usuario</option>
                                </select>
                                <br>
                                <button type="submit" name="editar_usuario" class="actions-btn edit">Guardar</button>
        </form>

</td>    
                        
                    </tr>
                    
                    
                <?php } ?>
            </tbody>
        </table>






<style>

.info-menu.hidden {
    display: none;
    background-color: #fff;
    padding: 10px;
    border: 1px solid #ddd;
    position: absolute;
    top: 30px;
    left: 0;
    z-index: 1;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.info-menu p {
    margin: 5px 0;
    font-size: 13px;
}















.edit-form.hidden {
    display: none;
}

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
        
        .fram {
            width: 90%;
            margin: 0 auto;
            background: #f3f9fe;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            padding: 5px;
        }

        .archivo-container {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }

        .archivo-container h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .archivo-container p {
            margin: 0;
        }

        .archivo-container a {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .archivo-container a:hover {
            text-decoration: underline;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
             box-shadow: 0 2px 4px rgba(0, 0, 0, 0.583);
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            background-color: #f3f9fe;
        }

        th {
            background-color: #f3f9fe;
            color :  #ff7f00;
             text-align: center;
        }

        tr:hover {
            background-color:  #ff8000af;
        }



nav.navegacion ul li a {
    font-size: 16px; /* Tamaño de texto predeterminado */
}

/* Estilos responsive para pantallas más pequeñas */
@media screen and (max-width: 768px) {
    nav.navegacion ul li a {
        font-size: 14px; /* Tamaño de texto para pantallas pequeñas */
    }
}

/* Estilos responsive para pantallas aún más pequeñas */
@media screen and (max-width: 480px) {
    nav.navegacion ul li a {
        font-size: 12px; /* Tamaño de texto para pantallas muy pequeñas */
    }
}

/* Estilos para la tabla */

/* Estilos para la tabla */
table {
    width: 45%;
    margin: 0 auto;
    border-collapse: collapse;
    margin-top: 10px;
    font-size: 14px;
}

th, td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f3f9fe;
    color: #ff7f00; /* Color de fondo y texto para encabezados de columna */
     text-align: left;
}

tr:hover {
    background-color: #ff8000af; /* Color de fondo para filas al pasar el cursor */
}

/* Estilos para la celda de descripción */
td.descripcion {
    max-height: 100px; /* Altura máxima de la celda (ajústala según tus necesidades) */
    overflow: hidden; /* Ocultar el contenido que excede la altura máxima */
     white-space: normal;
}

td.descripcion p {
    margin: 0; /* Eliminar márgenes del párrafo dentro de la celda */
    padding: 5px 0; /* Espaciado interno del párrafo dentro de la celda */
    overflow-y: auto;
    white-space: normal;
    border: none;
}





/* Estilos responsive para la tabla en pantallas más pequeñas */
@media screen and (max-width: 768px) {
    th,
    td {
        padding: 5px; /* Reducir el espaciado entre celdas */
    }
}

/* Estilos responsive para la tabla en pantallas aún más pequeñas */
@media screen and (max-width: 480px) {
    th,
    td {
        padding: 3px; /* Reducir aún más el espaciado entre celdas */
    }
}


.actions-btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .delete {
            background-color: #0040c1;
            color: white;
        }
        
        .edit {
            background-color: #0040c1;
            color: white;
        }













    </style>
<script>
  function toggleEditForm(userId) {
            var form = document.getElementById("edit-form-" + userId);
            form.classList.toggle("visible");
        }
  // Función para mostrar/ocultar formulario de edición
    function toggleEditForm(userId) {
        var form = document.getElementById("edit-form-" + userId);
        form.classList.toggle("hidden"); // Cambia entre mostrar y ocultar la clase "hidden"
    }      
    
    
        // Función para mostrar/ocultar menú de información
    function toggleInfoMenu(userId) {
        var infoMenu = document.getElementById("info-menu-" + userId);
        infoMenu.classList.toggle("hidden"); // Cambia entre mostrar y ocultar la clase "hidden"
    }
        
</script>
</body>



<br>
<br>
<br>
<br>
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
</html>
</div>