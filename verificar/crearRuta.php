<?php
// Verificar si la solicitud es POST y si existe el parámetro rutaId
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rutaId'])) {
    $rutaId = $_POST['rutaId'];

    // Definir la ruta completa para el archivo que se va a crear
    $rutaArchivo = "../rutas/ruta" . $rutaId . ".php";

    // Verificar si el archivo ya existe
    if (file_exists($rutaArchivo)) {
        echo 'El archivo ya existe.';
    } else {
        // Contenido básico para el archivo PHP
        $contenido = "<?php\n";
        $contenido .= "// Este archivo es generado dinámicamente\n";
        $contenido .= "// Ruta " . $rutaId . "\n";
        $contenido .= "?>\n";

        // Intentar crear el archivo
        if (file_put_contents($rutaArchivo, $contenido)) {
            echo 'Archivo creado exitosamente: ruta' . $rutaId . '.php';
        } else {
            echo 'Hubo un error al crear el archivo.';
        }
    }
} else {
    echo 'Datos no válidos.';
}
?>
