<?php
session_start();
require("connect.php");

// Recopilar datos del formulario
$num_cliente = $_POST['num_cliente'];
$nombre = $_POST['nombre'];
$negocio = $_POST['negocio'];

// Manejar el campo de inactividad
if (isset($_POST['inactividad'])) {
    $inactividadArray = $_POST['inactividad']; // Array de opciones seleccionadas
    $inactividad = implode(', ', $inactividadArray); // Convertir el array en una cadena separada por comas
} else {
    $inactividad = ''; // Por si no se seleccionó ninguna opción
}

// Manejar el campo de texto 'otroTexto'
$otroTexto = !empty($_POST['otroTexto']) ? $_POST['otroTexto'] : ''; // Obtener el valor del campo 'otroTexto', si existe

// Otras variables del formulario
$situacion = $_POST['situacion'];
$relacion_com = $_POST['relacion_com'];

// Insertar datos en la tabla 'form_clientes'
$sql = "INSERT INTO form_clientes (num_cliente, nombre, negocio, inactividad, otroTexto, situacion, relacion_com)
    VALUES ('$num_cliente', '$nombre', '$negocio', '$inactividad', '$otroTexto', '$situacion', '$relacion_com')";

$insertar = mysqli_query($conn, $sql);

if ($insertar) {
    echo "<script> alert('Sus datos han sido registrados');
            window.location ='guardado.php';</script>";
} else {
    echo "<script> alert('ERROR sus datos NO han sido registrados');
            window.location ='form_clientes.php';</script>";
}

// Cerrar conexión con la base de datos
mysqli_close($conn);
?>
