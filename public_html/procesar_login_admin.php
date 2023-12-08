<?php
// Incluye el archivo de conexión a la base de datos
include "conex.php";

session_start(); // Iniciar sesión

if (isset($_POST['admin_login'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales del administrador
    $sql = "SELECT * FROM usuarios2 WHERE correo = '$correo' AND contrasena = '$contrasena' AND tipo_usuario = 1";
    $resultado = $cone->query($sql);

    if ($resultado->num_rows > 0) {
        // Iniciar sesión con éxito para el administrador
        $_SESSION['admin'] = true;
        header("Location: pagina_administracion.php"); // Redirigir a la página de administración
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error o redirigir al formulario de inicio de sesión
        echo "Credenciales incorrectas";
    }
}

?>
