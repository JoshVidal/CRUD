<?php
// Verificar si se envió el formulario de carga
if (isset($_POST['subir_archivo'])) {
    // Datos del archivo
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    
    // Datos del archivo subido
    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    
    // Verificar que se haya subido un archivo
    if (!empty($nombre_archivo)) {
        // Directorio de destino para guardar los archivos subidos
        $directorio_destino = "archivos_subidos/";
        // Mover el archivo desde la ruta temporal al directorio de destino
        $ruta_destino = $directorio_destino . $nombre_archivo;
        move_uploaded_file($ruta_temporal, $ruta_destino);
        
        // Conexión a la base de datos (Asegúrate de tener la conexión adecuada en conex.php)
        require_once "conex.php";
        
        // Consulta SQL para insertar los datos del archivo en la tabla
        $sql = "INSERT INTO archivos1 (nombre_archivo, descripcion, categoria, usuario, hora) VALUES ('$nombre_archivo', '$descripcion', '$categoria', '$nombre', NOW())";
        $resultado = mysqli_query($cone, $sql);
        
        if ($resultado) {
            // Redireccionar a la página que mostrará los archivos almacenados
            header("Location: Prox.php");
            exit();
        } else {
            // Manejo del error en caso de fallo en la inserción
            echo "Error al subir el archivo: " . mysqli_error($cone);
        }
    } else {
        echo "Debes seleccionar un archivo para subir.";
    }
}
?>
