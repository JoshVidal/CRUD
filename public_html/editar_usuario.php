<?php
ob_start(); // Iniciar búfer de salida

session_start(); // Iniciar sesión

if (!isset($_SESSION['admin'])) {
    // Si no hay sesión de administrador, redirigir al formulario de inicio de sesión de administración
    header("Location: login_admin.php");
    exit();
}

include "conex.php"; // Incluye tu archivo de conexión a la base de datos

var_dump($_POST); // Depuración para verificar los valores recibidos

if (isset($_POST['editar_usuario'])) {
    if (isset($_POST['id_usuario'])) {
        $id_usuario = $_POST['id_usuario'];
        $nuevo_nombre = $_POST['nuevo_nombre_usuario'];
        $nuevo_correo = $_POST['nuevo_correo'];
        $nueva_contrasena = $_POST['nueva_contrasena'];
        $nuevo_tipo = $_POST['nuevo_tipo_usuario'];

        // Realiza la consulta SQL para actualizar los datos del usuario, incluyendo la nueva contraseña
        if (!empty($nueva_contrasena)) {
            // Si se proporcionó una nueva contraseña, agrega al SQL
            $sql_actualizar = "UPDATE usuarios2 SET nombre_usuario = '$nuevo_nombre', correo = '$nuevo_correo', contrasena = '$nueva_contrasena', tipo_usuario = '$nuevo_tipo' WHERE id = '$id_usuario'";
        } else {
            // Si no se proporcionó una nueva contraseña, excluye el campo contrasena del SQL
            $sql_actualizar = "UPDATE usuarios2 SET nombre_usuario = '$nuevo_nombre', correo = '$nuevo_correo', tipo_usuario = '$nuevo_tipo' WHERE id = '$id_usuario'";
        }

        var_dump($sql_actualizar); // Depuración para verificar la consulta SQL
        
        $resultado_actualizar = $cone->query($sql_actualizar);

        if ($resultado_actualizar) {
            echo "Actualización exitosa"; // Mensaje de depuración
            // Redireccionar a la página de administración después de actualizar
            header("Location: pagina_administracion.php");
            exit();
        } else {
            echo "Error en la actualización: " . $cone->error; // Mensaje de depuración
        }
    }
}
?>
