<?php
session_start(); // Iniciar sesión

include "conex.php"; // Incluye tu archivo de conexión a la base de datos

if (isset($_POST['login_usuario'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Realiza la consulta SQL para verificar las credenciales del usuario
    $sql_verificar = "SELECT * FROM usuarios2 WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado_verificar = $cone->query($sql_verificar);

    if ($resultado_verificar->num_rows > 0) {
        $_SESSION['usuario'] = $correo;
        header("Location: index.php"); // Redirige después de iniciar sesión
        exit();
    } else {
        $error_msg = "Correo o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php
    if (isset($error_msg)) {
        echo "<p class='error-msg'>$error_msg</p>";
    }
    ?>
    <form class="login-form" action="login.php" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br />
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br />
        
        <input type="submit" name="login_usuario" value="Iniciar Sesión" class="btn">
    </form>
</body>
</html>
