<?php include '../css/header.php' ?>

<?php
require 'connect.php';

// Inicializamos las variables de sesión
session_name('cac'); // Asegúrate de tener el mismo nombre de sesión para el proyecto
session_start();

$message1 = '';
$message2 = '';

// Verificar si se envió el formulario de administrador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_submit'])) {
    $adminUsuario = $_POST['admin_usuario'];
    $adminPassword = $_POST['admin_password'];

    // Validar las credenciales del administrador
    $sql = "SELECT id, usuario, password FROM users WHERE usuario = :usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $adminUsuario);
    $stmt->execute();
    $adminCredentials = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($adminCredentials && $adminCredentials['id'] == 1) {
        // Verificar las credenciales del administrador
        if (password_verify($adminPassword, $adminCredentials['password'])) {
            // Credenciales de administrador válidas, configurar variable de sesión
            $_SESSION['admin_verified'] = true;
            $message1 = 'Credenciales de administrador verificadas correctamente.';
        } else {
            $message2 = 'Credenciales de administrador incorrectas';
        }
    } else {
        $message2 = 'No se encontró el usuario administrador';
    }
}

// Verificar si el administrador ya ha sido verificado
if (isset($_SESSION['admin_verified']) && $_SESSION['admin_verified']) {
    // Verificar si se envió el formulario de registro de usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_submit'])) {
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $sql = "INSERT INTO users (usuario, password) VALUES (:usuario, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':usuario', $_POST['usuario']);
            $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $pass);

            if ($stmt->execute()) {
                $message1 = 'Nuevo usuario creado correctamente';
            } else {
                $message2 = 'Lo sentimos, debe haber habido un problema al crear tu cuenta';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Regístrate</title>
    <style>
        .custom-btn-color {
            background-color: #003eaf !important;
            color: white !important;
            border-color: #003eaf !important;
        }

        .custom-btn-color:hover {
            background-color: #14d6e0 !important;
            border-color: #14d6e0 !important;
        }

        .custom-btn-color:active {
            background-color: #04123b !important;
            border-color: #04123b !important;
        }

        input[type="submit"].custom-btn-color {
            margin-top: 10px;
            /* Agrega algo de espacio encima del botón de enviar */
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (!empty($message1)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message1; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($message2)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message2; ?>
            </div>
        <?php endif; ?>

        <h5 class="display-6 ms-4">Regístrate</h5>
        <span><a href="inicioSesion.php" class="btn btn-info custom-btn-color">ó Iniciar sesión</a></span>

        <?php if (!isset($_SESSION['admin_verified']) || !$_SESSION['admin_verified']): ?>
            <!-- Formulario de administrador -->
            <form action="registrar.php" method="POST">
                <input type="hidden" name="admin_submit" value="1">
                <input name="admin_usuario" type="text" placeholder="Usuario de administrador" required>
                <input name="admin_password" type="password" placeholder="Contraseña de administrador" required>
                <input type="submit" value="Verificar Administrador" class="btn btn-primary custom-btn-color">
            </form>
        <?php else: ?>
            <!-- Formulario de registro de usuario -->
            <form action="registrar.php" method="POST">
                <input type="hidden" name="user_submit" value="1">
                <input name="usuario" type="text" placeholder="Ingresa tu Usuario" required>
                <input name="password" type="password" placeholder="Ingrese su contraseña" required>
                <input name="confirm_password" type="password" placeholder="Confirmar contraseña" required>
                <input type="submit" value="Registrar Usuario" class="btn btn-primary custom-btn-color">
            </form>
        <?php endif; ?>
    </div>
</body>

<script> //Bloqueo clic derecho y bloqueo para visualizar codigo fuente
    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
    });

    $(document).keydown(function (e) {
        if (e.which === 123) {
            return false;
        }
        if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
            return false;
        }
    });
</script>

</html>

<?php include '../css/footer.php' ?>