<?php
//include "conex.php";

$query = "SELECT * FROM preguntas ORDER BY fecha DESC";
$reslt = mysqli_query($cone, $query);

while ($row = mysqli_fetch_assoc($reslt)) {
    echo "<h1><center>{$row['pregunta']}</center></h1>";
    echo "<p2>Autor: {$row['nombre']}</p2>";
    echo "<p>Categoría: {$row['categoria']}</p>";
    echo "<p>Fecha: {$row['fecha']}</p>";

    // Consulta los comentarios asociados a la pregunta actual
    $pregunta_id = $row['id'];
    $comentarios_query = "SELECT * FROM comentarios WHERE id_pregunta = $pregunta_id ORDER BY fecha DESC";
    $comentarios_reslt = mysqli_query($cone, $comentarios_query);
    echo "<center><h1>| Comentarios |</h1></center>";

    while ($comentario_row = mysqli_fetch_assoc($comentarios_reslt)) {
        echo "<p><strong>{$comentario_row['nombre']}:</strong> {$comentario_row['comentario']}</p>";
        echo "<p>Fecha: {$comentario_row['fecha']}</p>";
    }

    // Formulario para agregar comentario debajo de cada pregunta
    echo "<form class='comentario-form' method='post' action='comentar.php'>";
    echo "<input type='hidden' name='id_pregunta' value='{$row['id']}'>";

    echo "<label for='nombre'>Nombre:</label>";
    echo "<input type='text' id='nombre' name='nombre' required>";

    echo "<label for='comentario'>Comentario:</label>";
    echo "<textarea id='comentario' name='comentario' rows='4' required></textarea>";

    echo "<button type='submit' class='btn-comentario'>Enviar Comentario</button>";
    echo "</form>";

    echo "<hr>";
}
?>
