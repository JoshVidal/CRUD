<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include "conex.php";

if (isset($_POST['agregar_usuario'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; // Sin hash
    $tipo_usuario = $_POST['tipo_usuario'];

    $sql_agregar = "INSERT INTO usuarios2 (nombre_usuario, correo, contrasena, tipo_usuario) VALUES ('$nombre_usuario', '$correo', '$contrasena', '$tipo_usuario')";
    $resultado_agregar = $cone->query($sql_agregar);

    header("Location: pagina_administracion.php");
    exit();
}
?>
