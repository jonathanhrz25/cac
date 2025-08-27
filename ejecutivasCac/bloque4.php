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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                <a class="navbar-brand text-white" href="../verificar/menu2.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>

        <div style="height: 60px;"></div>

        <main>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <a href="../ejecutivasCac/verResultados4.php" class="btn btn-outline-primary btn-lg btn-block">
                            Resultados de Encuestas
                        </a>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <a href="../ejecutivasCac/analisisClientes4.php"
                            class="btn btn-outline-primary btn-lg btn-block">
                            Graficas
                        </a>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 mx-auto">
                            <a href="../index4.html" class="btn btn-outline-primary btn-lg btn-block" target="_blank">
                                Encuesta <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <script> 
            // Bloquear clic derecho y teclas específicas
            $(document).ready(function() {
                // Bloquear clic derecho
                $(document).bind("contextmenu", function (e) {
                e.preventDefault();
                });

                // Bloquear ciertas teclas (F12, Ctrl+U, Ctrl+Shift+I)
                $(document).keydown(function (e) {
                if (e.which === 123) { // F12
                    return false;
                }
                if (e.ctrlKey && (e.shiftKey && e.keyCode === 73)) { // Ctrl+Shift+I
                    return false;
                }
                if (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 117)) { // Ctrl+U
                    return false;
                }
                });
            });
        </script>

</body>

<?php include '../css/footer.php' ?>

</html>