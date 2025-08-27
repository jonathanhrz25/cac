<?php
session_start();
require("connect.php"); // Incluye la conexión con mysqli

// Obtener los datos del formulario
$relacion_otro = $_POST['relacion_otro'] ?? "";
$num_cliente = $_POST['num_cliente'] ?? "";
$nombre = $_POST['nombre'] ?? "";
$telefono = $_POST['telefono'] ?? "";
$correo = $_POST['correo'] ?? "";
$inactividad = isset($_POST['inactividad']) ? implode(",", $_POST['inactividad']) : "";

// Obtener las inactividades individuales desde el arreglo 'detalles'
$inactividad1 = $_POST['detalles']['inactividad1'] ?? "";
$inactividad2 = $_POST['detalles']['inactividad2'] ?? "";
$inactividad3 = $_POST['detalles']['inactividad3'] ?? "";
$inactividad4 = $_POST['detalles']['inactividad4'] ?? "";
$inactividad5 = $_POST['detalles']['inactividad5'] ?? "";
$inactividad6 = $_POST['detalles']['inactividad6'] ?? "";
$inactividad7 = $_POST['detalles']['inactividad7'] ?? "";
$inactividad8 = $_POST['detalles']['inactividad8'] ?? "";
$inactividad9 = $_POST['detalles']['inactividad9'] ?? "";
$inactividad10 = $_POST['detalles']['inactividad10'] ?? "";
$inactividad11 = $_POST['detalles']['inactividad11'] ?? "";
$inactividad12 = $_POST['detalles']['inactividad12'] ?? "";
$inactividad13 = $_POST['detalles']['inactividad13'] ?? "";
$inactividad14 = $_POST['detalles']['inactividad14'] ?? "";
$inactividad15 = $_POST['detalles']['inactividad15'] ?? "";
$inactividad16 = $_POST['detalles']['inactividad16'] ?? "";
$inactividad17 = $_POST['detalles']['inactividad17'] ?? "";
$inactividad18 = $_POST['detalles']['inactividad18'] ?? "";
$inactividad19 = $_POST['detalles']['inactividad19'] ?? "";
$inactividad20 = $_POST['detalles']['inactividad20'] ?? "";
$inactividadOtro = $_POST['detalles']['inactividadOtro'] ?? "";

// Otros campos
$alta_relacion = $_POST['alta_relacion'] ?? "";
$relacion_com = $_POST['relacion_com'] ?? "";

// Consulta de inserción con mysqli
$sql = "INSERT INTO form_clientes4 (
     relacion_otro, num_cliente, nombre, telefono, correo, inactividad, 
     inactividad1, inactividad2, inactividad3, inactividad4, inactividad5, 
     inactividad6, inactividad7, inactividad8, inactividad9, inactividad10, 
     inactividad11, inactividad12, inactividad13, inactividad14, inactividad15, 
     inactividad16, inactividad17, inactividad18, inactividad19, inactividad20,
     inactividadOtro, alta_relacion, relacion_com
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la consulta
if ($stmt = $conn->prepare($sql)) {

    // Enlazar los parámetros
    $stmt->bind_param(
        "sssssssssssssssssssssssssssss", 
        $relacion_otro, $num_cliente, $nombre, $telefono, $correo, $inactividad, 
        $inactividad1, $inactividad2, $inactividad3, $inactividad4, $inactividad5, 
        $inactividad6, $inactividad7, $inactividad8, $inactividad9, $inactividad10, 
        $inactividad11, $inactividad12, $inactividad13, $inactividad14, $inactividad15, 
        $inactividad16, $inactividad17, $inactividad18, $inactividad19, $inactividad20, 
        $inactividadOtro, $alta_relacion, $relacion_com
    );    

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script> alert('Sus datos han sido registrados');
                window.location ='guardado4.php';</script>";
    } else {
        echo "<script> alert('ERROR sus datos NO han sido registrados');
                window.location ='form_clientes4.php';</script>";
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // Si no se puede preparar la consulta
    echo "<script> alert('Error al preparar la consulta');
            window.location ='form_clientes4.php';</script>";
}

// Cerrar la conexión
$conn->close();
?>
