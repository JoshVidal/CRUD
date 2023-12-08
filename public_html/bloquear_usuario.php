<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include "conex.php";

if (isset($_POST['bloquear_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    // Ejecutar consulta SQL para actualizar el estado del usuario a bloqueado (por ejemplo, estableciendo el campo "bloqueado" a 1)
    $sql_bloquear = "UPDATE usuarios2 SET bloqueado = 1 WHERE id = '$id_usuario'";
    $resultado_bloquear = $cone->query($sql_bloquear);

    if ($resultado_bloquear) {
        // Redirigir de vuelta a la página de administración
        header("Location: pagina_administracion.php");
        exit();
    } else {
        echo "Error al bloquear el usuario: " . $cone->error;
    }
}
?>
