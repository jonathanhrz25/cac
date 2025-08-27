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
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro de Atencion a Clientes</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Imagen a la izquierda -->
                <a class="navbar-brand text-white" href="principal.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>

                <!-- Título centrado -->
                <div class="mx-auto text-center">
                    <a class="navbar-brand text-white">
                        Centro de Atención a Clientes
                    </a>
                </div>

                <!-- Botón del menú (opcional) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="fas fa-user-circle fa-2x"></i> <!-- Ícono de usuario -->
                </button>

                <!-- Menú desplegable -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel" style="background-color: #081856!important;">
                    <div class="offcanvas-header">
                        <span class="text-white font-size-lg"><?php echo $_SESSION['usuario']; ?></span>
                        <button type="button" class="btn-close btn-lg" style="background-color: white"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <div style="height: 60px;"></div>

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <a href="./menu1.php" class="btn btn-outline-primary btn-lg btn-block">
                        Encuesta clientes Inactivos 2023-2024
                    </a>
                </div>
                <div class="col-md-5 mx-auto">
                    <a href="./menu2.php" class="btn btn-outline-primary btn-lg btn-block">
                        Encuesta clientes Inactivos 2024
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5 mx-auto">
                    <a href="./menu3.php" class="btn btn-outline-primary btn-lg btn-block">
                        Encuesta de servicio de Ventas
                    </a>
                </div>
            </div>
        </div>

        <div style="height: 200px;"></div>
    </main>



</body>

<?php include '../css/footer.php' ?>

</html>