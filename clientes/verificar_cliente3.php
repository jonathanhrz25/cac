<?php
require("connect.php");

if (isset($_POST['num_cliente'])) {
    $num_cliente = $_POST['num_cliente'];

    // Consulta para verificar si el número de cliente ya está en la base de datos
    $query = "SELECT COUNT(*) as count FROM form_clientes3 WHERE num_cliente = '$num_cliente'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data['count'] > 0) {
        echo '1'; // El cliente ya ha respondido la encuesta
    } else {
        echo '0'; // El cliente no ha respondido la encuesta
    }

    mysqli_close($conn);
}
