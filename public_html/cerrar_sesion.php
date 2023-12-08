<?php

include "conex.php";
// Iniciar la sesión para poder eliminar las variables de sesión y las cookies
session_start();

// Eliminar las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Eliminar la cookie de nombre de usuario
setcookie("nombre_usuario", "", time() - 3600, "/");

// Redirigir a la página de inicio de sesión
header("Location: login.php");
exit();
?>
