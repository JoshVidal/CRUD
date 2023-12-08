<?php
include "conex.php";

if (isset($_POST['G_preg'])) {
    $nombre = $_POST['nombre'];
    $pregunta = $_POST['pregunta'];
    $categoria = $_POST['categoria'];
    
    $query = "INSERT INTO pregunta (nombre, pregunta, categoria) VALUES ('$nombre', '$pregunta', '$categoria')";
    $reslt = mysqli_query($cone, $query);

    if (!$reslt) {
        die("DB_Fallando");
    }

    // Redireccionar a "inicio.html"
    header("Location: index.php");
    exit(); // Detener la ejecución del script
}
?>
