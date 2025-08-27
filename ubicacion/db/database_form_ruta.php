<?php
session_start();
require("../../clientes/connect.php");

// Recopilar datos del formulario
$num_cliente = $_POST['num_cliente'];
$nombre_responsable = $_POST['nombre_responsable'];
$ruta = $_POST['ruta']; // Obtenemos la ruta seleccionada
$nombre = $_POST['nombre']; // Obtenemos el nombre correspondiente

// Respuestas a las preguntas del formulario
$apoyo = $_POST['apoyo'];
$frecuencia_vende = $_POST['frecuencia_vende'];
$frecuencia_tlk = $_POST['frecuencia_tlk'];
$remplazar = $_POST['remplazar'];
$llamar = $_POST['llamar'];
$escala = $_POST['escala'];
$comentario_escala = $_POST['comentario_escala'];
$servicio = $_POST['servicio'];
$actualizacion = $_POST['actualizacion'];

// Verificar si ya existe un registro con la misma ruta y nombre
$sql_check = "SELECT * FROM form_rutas WHERE ruta = '$ruta' AND nombre = '$nombre'";
$result = mysqli_query($conn, $sql_check);

// Verificamos si los campos están vacíos en el registro
$registro_completo = false;

if (mysqli_num_rows($result) > 0) {
    // Si ya existe un registro, obtenemos los datos actuales
    $row = mysqli_fetch_assoc($result);
    
    // Verificamos si al menos uno de los campos está vacío
    if (
        empty($row['num_cliente']) || empty($row['nombre_responsable']) || empty($row['apoyo']) || 
        empty($row['frecuencia_vende']) || empty($row['frecuencia_tlk']) || empty($row['remplazar']) ||
        empty($row['llamar']) || empty($row['escala']) || empty($row['servicio'])
    ) {
        // Si hay campos vacíos, entonces vamos a actualizar ese registro con los nuevos valores
        $registro_completo = false;
    } else {
        // Si todos los campos están llenos, significa que ya se completó la encuesta, entonces insertamos un nuevo registro
        $registro_completo = true;
    }
}

if ($registro_completo) {
    // Si ya está completo, insertar una nueva fila (segunda encuesta y posteriores)
    $sql_insert = "INSERT INTO form_rutas (
                        num_cliente, 
                        nombre_responsable, 
                        ruta, 
                        nombre, 
                        apoyo, 
                        frecuencia_vende, 
                        frecuencia_tlk, 
                        remplazar, 
                        llamar, 
                        escala, 
                        comentario_escala, 
                        servicio, 
                        actualizacion
                    ) VALUES (
                        '$num_cliente', 
                        '$nombre_responsable', 
                        '$ruta', 
                        '$nombre', 
                        '$apoyo', 
                        '$frecuencia_vende', 
                        '$frecuencia_tlk', 
                        '$remplazar', 
                        '$llamar', 
                        '$escala', 
                        '$comentario_escala', 
                        '$servicio', 
                        '$actualizacion'
                    )";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<script> alert('Nueva encuesta registrada exitosamente');
                window.location ='../../clientes/guardado_rutas.php';</script>";
    } else {
        echo "<script> alert('ERROR: No se pudo guardar la nueva encuesta');
                window.location ='../../encuestas/index1.php';</script>";
    }
} else {
    // Si no está completo, actualizar el primer registro con los datos de la primera encuesta
    $sql_update = "UPDATE form_rutas SET 
                    num_cliente = '$num_cliente',
                    nombre_responsable = '$nombre_responsable',
                    apoyo = '$apoyo',
                    frecuencia_vende = '$frecuencia_vende',
                    frecuencia_tlk = '$frecuencia_tlk',
                    remplazar = '$remplazar',
                    llamar = '$llamar',
                    escala = '$escala',
                    comentario_escala = '$comentario_escala',
                    servicio = '$servicio',
                    actualizacion = '$actualizacion'
                    WHERE ruta = '$ruta' AND nombre = '$nombre'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script> alert('Encuesta inicial actualizada');
                window.location ='../../clientes/guardado_rutas.php';</script>";
    } else {
        echo "<script> alert('ERROR: No se pudo actualizar la encuesta');
                window.location ='../../encuestas/index1.php';</script>";
    }
}

// Cerrar conexión con la base de datos
mysqli_close($conn);
?>
