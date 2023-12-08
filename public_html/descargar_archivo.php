<?php
// Verificar si se proporcionó el nombre del archivo a descargar
if (isset($_GET['nombre_archivo'])) {
    // Nombre del archivo a descargar
    $nombre_archivo = $_GET['nombre_archivo'];

    // Ruta del archivo a descargar (Asegúrate de que sea correcta)
    $ruta_archivo = 'archivos_subidos/' . $nombre_archivo;

    // Verificar que el archivo exista
    if (file_exists($ruta_archivo)) {
        // Establecer los encabezados para la descarga
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $nombre_archivo);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($ruta_archivo));

        // Leer el contenido del archivo y enviarlo al navegador
        readfile($ruta_archivo);
        exit;
    } else {
        // El archivo no existe
        die('El archivo no se encontró.');
    }
} else {
    // No se proporcionó el nombre del archivo
    die('Nombre de archivo no especificado.');
}
?>
