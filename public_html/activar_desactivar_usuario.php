<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include "conex.php";

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

header("Location: pagina_administracion.php");
exit();
?>
