<?php
session_name('cac'); // Debe ser el mismo nombre de sesión
session_start();
require ("../verificar/connect.php");
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
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
            style="background-color: #003da6!important; text-align: left;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../verificar/menu.php">
                    <img src="#" alt="" height="35" class="d-inline-block align-text-top">
                    Centro de Atencion a Clientes
                </a>
            </div>
        </nav>

        <div style="height: 60px;"></div>

    <main>

    <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <a href="../index.html" class="btn btn-outline-primary btn-lg btn-block" target="_blank">
                        Encuesta 1
                    </a>
                </div>
                <div class="col-md-6 mx-auto">
                    <a href="../index2.html" class="btn btn-outline-primary btn-lg btn-block" target="_blank">
                        Encuesta 2
                    </a>
                </div>
            </div>

    </main>
</body>

<?php include '../css/footer.php' ?>

</html>
