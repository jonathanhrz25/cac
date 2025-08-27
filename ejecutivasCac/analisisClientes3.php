<?php
session_name('cac'); // Debe ser el mismo nombre de sesión
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "cac");
$sql = "SELECT * FROM form_clientes3";
$result = $conn->query($sql);

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro de Atencion a Clientes</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../ejecutivasCac/bloque3.php">
                <img src="../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar"
                        aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>

    <body style="padding-top: 40px;">

        <?php
        // Realiza la consulta para obtener los datos de la base de datos
        $sql = "SELECT * FROM form_clientes3";
        $stmt = $conn->query($sql);

        // Arreglo para almacenar los datos
        $datos = array();

        // Recorre los resultados y almacena los datos en el arreglo
        while ($fila = $stmt->fetch_assoc()) {
            $datos[] = $fila;
        }

        // Convierte los datos a formato JSON para usarlos en JavaScript
        $datos_json = json_encode($datos);
        ?>

        <div id="piechart_3d" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_2" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_3" style="width: 1000px; height: 550px;"></div>

        <script>
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Calidad de Servicio', 'Cantidad'],
                    <?php
                    $categorias = ["Si", "No"];
                    foreach ($categorias as $categoria) {
                        $sqlCategoria = "SELECT COUNT(*) as total FROM form_clientes3 WHERE negocio = '$categoria'";
                        $resultCategoria = mysqli_query($conn, $sqlCategoria);
                        $rowCategoria = mysqli_fetch_assoc($resultCategoria);
                        echo "['$categoria', " . $rowCategoria['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Cantidad de Clientes por Calificación de pregunta: 1. ¿Sigue en apertura su negocio?',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Calidad de Servicio', 'Cantidad'],
                    <?php
                    $categorias = [
                        "Ventas bajas",
                        "Tiempos de entrega",
                        "Surtido",
                        "Devoluciones y garantias",
                        "Falta de visita del vendedor",
                        "Credito y Cobranza",
                        "Precios",
                        "Mala experiencia de compra",
                        "Disponibilidad de material",
                        "Mala atencion de TLK",
                        "Mala calidad del producto",
                        "No pudo ingresar a la página",
                        "Motivos Personales",
                        "Cambio de razón social",
                        "Cambio de giro comercial",
                        "Reapertura de negocio",
                        "Se le quito el Crédito",
                        "Otro"
                    ];

                    foreach ($categorias as $categoria) {
                        $sqlCategoria = "SELECT COUNT(*) as total FROM form_clientes3 WHERE inactividad LIKE '%$categoria%'";
                        $resultCategoria = mysqli_query($conn, $sqlCategoria);
                        $rowCategoria = mysqli_fetch_assoc($resultCategoria);
                        echo "['$categoria', " . $rowCategoria['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Cantidad de Clientes por Calificación de pregunta: 2. ¿Cuál es el motivo de su inactividad de compra con nosotros?',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Calidad de Servicio', 'Cantidad'],
                    <?php
                    $categorias = ["Si", "No", "Si, con Crédito"];
                    foreach ($categorias as $categoria) {
                        $sqlCategoria = "SELECT COUNT(*) as total FROM form_clientes3 WHERE relacion_com = '$categoria'";
                        $resultCategoria = mysqli_query($conn, $sqlCategoria);
                        $rowCategoria = mysqli_fetch_assoc($resultCategoria);
                        echo "['$categoria', " . $rowCategoria['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Cantidad de Clientes por Calificación de pregunta: 4. ¿Le interesaría retomar la relación comercial con Serva?',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_3'));
                chart.draw(data, options);
            }
        </script>



    </body>

</body>

</html>

<?php include '../css/footer.php' ?>