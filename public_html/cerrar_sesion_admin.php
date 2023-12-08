<?php
session_start(); // Iniciar sesión

if (isset($_SESSION['admin'])) {
    // Si hay sesión de administrador, la cerramos
    session_unset();
    session_destroy();
}

// Redirigir al formulario de inicio de sesión de administración
header("Location: login_admin.php");
exit();
?>
