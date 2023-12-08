<?php
// Conexión a la base de datos (Asegúrate de tener la conexión adecuada en conex.php)
require_once "conex.php";

// Consulta SQL para obtener los archivos almacenados en la tabla
$sql = "SELECT * FROM archivos1 ORDER BY hora DESC";
$resultado = mysqli_query($cone, $sql);
?>

<?php
date_default_timezone_set("America/Mexico_City"); 
date_default_timezone_get();
?>


<!DOCTYPE html>
<html>
    <meta charset="UTF-8">

<head>
    <title>- Digital Docs</title>
    <link rel="stylesheet" type="text/css" href="estilos2c.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img2.ico" type="image/x-icon">
    <!-- Añade la etiqueta meta para el viewport -->
</head>
<?php  include("conex.php") ?> 


<body>
    <header class="hero">
        <img class="animated-image"  id="img1" src="img1.png" alt="Logo de Digital Docs">
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <h1 class="hero__title">
            Digital Docs
        </h1>

    </header>
    </div>
    <div class="animated-background2">
        <!-- Aquí va el contenido al que quieres aplicar el fondo animado -->
      

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
    
 <br>
 <br>
 <br>
 <br>
          
 
    <center> 
  <div class="fram"> 
  
    
    <table>
    <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Hora</th>
        <th>Descripción</th>
        <th>Categoría</th>
        <th>Enlace</th>
    </tr>
    <?php
    while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
<tr>
        <td><?php echo $fila['nombre_archivo']; ?></td>
        <td><?php echo $fila['usuario']; ?></td>
        <td><?php echo date("d/m/Y H:i:s", strtotime($fila['hora'])); ?></td>
        <td class="descripcion">
            <p><?php echo $fila['descripcion']; ?></p>
        </td>
        <td><?php echo $fila['categoria']; ?></td>
        <td><a href="descargar_archivo.php?nombre_archivo=<?php echo urlencode($fila['nombre_archivo']); ?>" target="blank">Descargar</a></td>
    </tr>
        <?php
    }
    ?>
</table>
    
    
    
    </div>      
    <br />
    </center>
    <div class="cube-container">
        <div class="cube"></div>
        <div class="cube"></div>
            <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
            </div>

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
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f3f9fe;
            color :  #ff7f00;
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
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th,
td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f3f9fe;
    color: #ff7f00; /* Color de fondo y texto para encabezados de columna */
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



    </style>
    
</body>

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
</html>

<form method="post" action="cerrar_sesion.php">
    <button type="submit" class="floating-button">Cerrar sesión</button>
</form>

