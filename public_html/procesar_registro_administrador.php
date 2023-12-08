<?php
// Verificar si se envió el formulario de registro de administrador
if (isset($_POST['registrar_administrador'])) {
    // Conexión a la base de datos (Asegúrate de tener la conexión adecuada en conex.php)
    require_once "conex.php";

    // Obtener los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Valor para representar un administrador en la base de datos (por ejemplo, 1)
    $tipo_usuario = 1;

    // Consulta SQL para insertar los datos en la tabla de usuarios
    $sql_insertar = "INSERT INTO usuarios2 (nombre_usuario, correo, contrasena, tipo_usuario) 
                     VALUES ('$nombre_usuario', '$correo', '$contrasena', '$tipo_usuario')";

    // Ejecutar la consulta
    if ($cone->query($sql_insertar) === TRUE) {
        // Éxito al registrar al administrador
        
        header("Location: pagina_administracion.php");
    } else {
        // Error al registrar al administrador
        echo "Error al registrar. Por favor, intenta de nuevo.";
    }

    // Cerrar la conexión a la base de datos
    $cone->close();
}

?>
