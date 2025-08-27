<?php
session_name('cac'); // Debe ser el mismo nombre de sesión
session_start();
require ("../../verificar/connect.php");
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
    <link rel="shortcut icon" href="../../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro de Atencion a Clientes</title>
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .thead th {
            color: white;
            font-family: "Segoe IU", serif;
            font-size: 120%;
            text-align: center;
        }

        /* Ocultar la tabla inicialmente */
        .hidden-table {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../../verificar/menu3.php">
                <img src="../../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="ruta" placeholder="Número de ruta" aria-label="Buscar ruta">
                    <input class="form-control mr-sm-2" type="search" name="num_cliente" placeholder="Número de cliente" aria-label="Buscar cliente">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>

    <body style="padding-top: 70px;">
        <?php
        require ("../../ejecutivasCac/conexion.php");

        // Inicializar las variables de búsqueda
        $ruta = isset($_GET['ruta']) ? $_GET['ruta'] : '';
        $num_cliente = isset($_GET['num_cliente']) ? $_GET['num_cliente'] : '';

        // Verificar si se proporcionaron parámetros de búsqueda
        if (isset($_GET['enviar'])) {
            // Crear la consulta SQL con los filtros
            $sql = "SELECT * FROM form_rutas WHERE 1";

            if ($ruta != '') {
                $sql .= " AND ruta LIKE '%$ruta%'";
            }
            if ($num_cliente != '') {
                $sql .= " AND num_cliente LIKE '%$num_cliente%'";
            }

            // Ordenar los resultados de manera descendente por el campo 'ruta'
            $sql .= " ORDER BY ruta ASC"; // O también puedes usar 'num_cliente' dependiendo de cómo quieras ordenar

            // Ejecutar la consulta
            $result = mysqli_query($conn, $sql);
        }
        ?>

        <body style="padding-top: 100px;">
            <h1 class="display-6">Tabla de Resultados Encuestas - Rutas</h1>

            <div class="table-responsive hidden-table" id="results-table">
                <table class="table table-hover">
                    <thead class="thead" style="background-color: #d63384!important;">
                        <tr>
                            <th>Ruta</th>
                            <th>Nombre</th>
                            <th>No. de cliente</th>
                            <th>Nombre del Responsable</th>
                            <th>1. ¿Con quién se apoya más para realizar sus pedidos?</th>
                            <th>2. ¿Con qué frecuencia lo visita su vendedor?</th>
                            <th>3. ¿Con qué frecuencia se comunica su TLK?</th>
                            <th>4. ¿El vendedor ha llegado a remplazar su visita por llamadas para cargar sus pedidos?</th>
                            <th>5. ¿Ha tenido que llamarle a su TLK para realizar sus pedidos?</th>
                            <th>6. En la escala del 1 al 10 ¿Qué posibilidad hay que recomiende nuestro servicio?</th>
                            <th>7. ¿Qué tan satisfecho está con el servicio que recibe?</th>
                            <th>Comentarios</th>
                            <th>8. ¿Desea realizar actualización de algún dato?</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($result)) {
                        while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $mostrar['ruta'] ?></td>
                                <td class="text-center"><?php echo $mostrar['nombre'] ?></td>
                                <td class="text-center"><?php echo $mostrar['num_cliente'] ?></td>
                                <td class="text-center"><?php echo $mostrar['nombre_responsable'] ?></td>
                                <td class="text-center"><?php echo $mostrar['apoyo'] ?></td>
                                <td class="text-center"><?php echo $mostrar['frecuencia_vende'] ?></td>
                                <td class="text-center"><?php echo $mostrar['frecuencia_tlk'] ?></td>
                                <td class="text-center"><?php echo $mostrar['remplazar'] ?></td>
                                <td class="text-center"><?php echo $mostrar['llamar'] ?></td>
                                <td class="text-center"><?php echo $mostrar['escala'] ?></td>
                                <td class="text-center"><?php echo $mostrar['servicio'] ?></td>
                                <td class="text-center"><?php echo $mostrar['comentario_escala'] ?></td>
                                <td class="text-center"><?php echo $mostrar['actualizacion'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div><br><br><br>

             <!-- Boton Descargar -->
             <!-- <div class="text-center">
                <a href="descargar.php" class="btn btn-primary">Descargar Excel</a>
            </div><br><br> -->

            <?php
            // Mostrar la tabla solo si hay resultados
            if (isset($result) && mysqli_num_rows($result) > 0) {
                echo '<script>document.getElementById("results-table").style.display = "block";</script>';
            }
            ?>

            <?php include '../../css/footer.php' ?>
        </body>
</html>
