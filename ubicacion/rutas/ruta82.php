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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro de Atencion a Clientes</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top"
            style="background-color: #081856!important; text-align: left;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../../verificar/menu3.php">
                    <img src="../../img/loguito2.png" alt="" height="35" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>

        <div style="height: 60px;"></div>

        <main>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <!-- Primer Botón: Graficas Ruta 1 -->
                    <div class="col-md-6 mb-3">
                        <a href="../graficas/graficaEncuesta.php?ruta=82" class="btn btn-outline-primary btn-lg btn-block">
                            Graficas Ruta 82
                        </a>
                    </div>

                    <!-- Segundo Botón: Encuesta Ruta 1 -->
                    <div class="col-md-6 mb-3">
                        <a href="../encuestas/index82.php?ruta=82"
                            class="btn btn-outline-primary btn-lg btn-block">
                            Encuesta Ruta 82
                        </a>
                    </div>
                </div>
            </div>

        </main>
</body>

<?php include '../../css/footer.php' ?>

</html>