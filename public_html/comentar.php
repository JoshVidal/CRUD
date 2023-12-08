<?php
// Conexión a la base de datos (Asegúrate de tener la conexión adecuada en conex.php)
require_once "conex.php";

// Verificamos si la petición es mediante AJAX y si los datos necesarios fueron enviados
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest") {
    // Recibimos los datos del comentario en formato JSON y los decodificamos
    $data = json_decode(file_get_contents("php://input"), true);

    // Obtenemos los datos del comentario
    $id_pregunta = $data["id_pregunta"];
    $nombre = $data["nombre"];
    $comentario = $data["comentario"];

    // Sanitizamos los datos para evitar ataques de inyección de código
    $id_pregunta = mysqli_real_escape_string($cone, $id_pregunta);
    $nombre = mysqli_real_escape_string($cone, $nombre);
    $comentario = mysqli_real_escape_string($cone, $comentario);

    // Insertamos el comentario en la base de datos
    $query = "INSERT INTO comentarios (id_pregunta, nombre, comentario, fecha) VALUES ('$id_pregunta', '$nombre', '$comentario', NOW())";
    $result = mysqli_query($cone, $query);

    if ($result) {
        // Si el comentario se agregó correctamente, redireccionamos a la página de preguntas
        header("Location: Preguntas.php");
        exit(); // Asegúrate de añadir exit() para evitar que el resto del código se siga ejecutando
    } else {
        // Si hubo un error al agregar el comentario, redireccionamos a la página de Preguntas con un mensaje de error en la URL
        header("Location: Preguntas.php?error=1");
        exit(); // Asegúrate de añadir exit() para evitar que el resto del código se siga ejecutando
    }
} else {
    // Si la petición no es mediante AJAX o faltan datos, redireccionamos a la página de Preguntas con un mensaje de error en la URL
    header("Location: Preguntas.php?error=1");
    exit(); // Asegúrate de añadir exit() para evitar que el resto del código se siga ejecutando
}
?>
