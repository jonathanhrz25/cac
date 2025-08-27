<?php
session_name('cac'); // Debe ser el mismo nombre de sesión
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}

// Si la sesión está activa, puedes mostrar el contenido de la página
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro de Atención a Clientes</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top"
            style="background-color: #081856!important; text-align: left;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="principal.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </header>
    <div style="height: 60px;"></div>

    <main>
        <div class="container mt-5">
            <!-- Centrado horizontal del contenedor -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <?php
                    // Generar 82 botones pequeños con enlaces dinámicos
                    $totalBotones = 82; // Total de botones a generar
                    $botonesPorFila = 10; // Botones por fila
                    $botonesExcluir = [36, 60, 61, 62, 63, 64, 77]; // Botones que no deben aparecer
                    
                    $contador = 0; // Para controlar el número de botones mostrados
                    // Recorrer los botones en grupos de 10
                    for ($i = 1; $i <= $totalBotones; $i++) {
                        // Verificar si el botón debe ser excluido
                        if (in_array($i, $botonesExcluir)) {
                            continue; // Omitir este botón
                        }

                        // Cada 10 botones, comenzamos una nueva fila
                        if ($contador % $botonesPorFila == 0) {
                            echo '<div class="row justify-content-center">'; // Inicia nueva fila
                        }

                        // Imprime el botón correspondiente
                        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-1 mb-2">'; // Define el tamaño del botón en la columna
                        echo '<a href="../ubicacion/rutas/ruta' . $i . '.php" class="btn btn-outline-primary btn-sm w-100">Ruta ' . $i . '</a>';
                        echo '</div>';

                        // Cada 10 botones, cerramos la fila
                        if (($contador + 1) % $botonesPorFila == 0 || $i == $totalBotones) {
                            echo '</div>'; // Cierra la fila
                        }

                        $contador++; // Aumentamos el contador solo si el botón no es excluido
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <a href="../ubicacion/resultadosEncuestas/verResultadosRutas.php" class="btn btn-outline-primary btn-lg btn-block">
                        Resultados de Encuestas
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>

<?php include '../css/footer.php' ?>

</html>