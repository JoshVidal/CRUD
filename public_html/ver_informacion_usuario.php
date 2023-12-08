<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include "conex.php";

if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
    $sql_usuario = "SELECT * FROM usuarios2 WHERE id = '$id_usuario'";
    $resultado_usuario = $cone->query($sql_usuario);
    $usuario = $resultado_usuario->fetch_assoc();
} else {
    header("Location: pagina_administracion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Información del Usuario</title>
    <!-- Agrega aquí tus estilos CSS -->
</head>
<body>
    <h1>Información del Usuario</h1>
    <p><strong>ID:</strong> <?php echo $usuario['id']; ?></p>
    <p><strong>Nombre de Usuario:</strong> <?php echo $usuario['nombre_usuario']; ?></p>
    <p><strong>Correo:</strong> <?php echo $usuario['correo']; ?></p>
    <p><strong>Tipo de Usuario:</strong> <?php echo ($usuario['tipo_usuario'] == 1) ? "Administrador" : "Usuario Normal"; ?></p>
    <p><strong>Estado de Cuenta:</strong> <?php echo ($usuario['cuenta_activa'] == 1) ? "Activa" : "Desactivada"; ?></p>
    
    <!-- Agrega aquí más información si es necesario -->

    <a href="pagina_administracion.php">Volver a la página de administración</a>
</body>
</html>
