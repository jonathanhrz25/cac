<?php
session_name('cac');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ./inicioSesion.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "cac");

$ruta = isset($_GET['ruta']) ? $_GET['ruta'] : '';

// Consulta para obtener los registros basados en la ruta
$sql = "SELECT * FROM form_rutas WHERE ruta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $ruta);
$stmt->execute();
$result = $stmt->get_result();

$datos = [];
while ($fila = $result->fetch_assoc()) {
    $datos[] = $fila;
}

$datos_json = json_encode($datos);

/* echo '<pre>';
var_dump($datos);
echo '</pre>'; */
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../../css/style2.css">
    <title>Centro de Atencion a Clientes</title>
</head>

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
                <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar"
                    aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
</header>

<body style="padding-top: 40px;">

    <!-- Graficas de las preguntas de la encuesta -->

    <!-- Gráfica 1: ¿Con quién se apoya más para realizar sus pedidos? -->
    <div id="piechart_apoyo" style="width: 1000px; height: 550px;"></div>

    <!-- Gráfica 2: ¿Con qué frecuencia lo visita su vendedor? -->
    <div id="piechart_frecuencia_vende" style="width: 1000px; height: 550px;"></div>

    <!-- Gráfica 3: ¿Con qué frecuencia se comunica su TLK? -->
    <div id="piechart_frecuencia_tlk" style="width: 1000px; height: 550px;"></div>

    <!-- Gráfica 4: ¿El vendedor ha llegado a remplazar su visita por llamadas para cargar sus pedidos? -->
    <div id="piechart_reemplazo_visita" style="width: 1000px; height: 550px;"></div>

    <!-- Gráfica 5: ¿Ha tenido que llamarle a su TLK para realizar sus pedidos? -->
    <div id="piechart_llamar_tlk" style="width: 1000px; height: 550px;"></div>

    <!-- Gráfica 6: En la escala del 1 al 10 ¿Qué posibilidad hay que recomiende nuestro servicio? -->
    <div id="piechart_recomendacion" style="width: 1000px; height: 550px;"></div>

    <!-- Gráfica 7: ¿Qué tan satisfecho está con el servicio que recibe? -->
    <div id="piechart_satisfaccion" style="width: 1000px; height: 550px;"></div>

    <script type="text/javascript">
        google.charts.load("current", { packages: ["corechart"] });

        // Gráfico 1: ¿Con quién se apoya más para realizar sus pedidos?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Apoyo', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                $apoyo = ["Vendedor" => 0, "TLK" => 0, "Ambos" => 0, "Pagina" => 0];
                foreach ($datos as $row) {
                    if (isset($apoyo[$row['apoyo']])) {
                        $apoyo[$row['apoyo']]++;
                    }
                }
                foreach ($apoyo as $categoria => $cantidad) {
                    echo "['$categoria', $cantidad],";
                }
                ?>
            ]);

            var options = { title: '1: ¿Con quién se apoya más para realizar sus pedidos?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_apoyo'));
            chart.draw(data, options);
        });

        // Gráfico 2: ¿Con qué frecuencia lo visita su vendedor?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Frecuencia', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                $frecuencia_vende = ["Semanal" => 0, "Quincenal" => 0, "Mensual" => 0, "Mayor a 1 mes" => 0, "No lo visitan" => 0];
                foreach ($datos as $row) {
                    if (isset($frecuencia_vende[$row['frecuencia_vende']])) {
                        $frecuencia_vende[$row['frecuencia_vende']]++;
                    }
                }
                foreach ($frecuencia_vende as $categoria => $cantidad) {
                    echo "['$categoria', $cantidad],";
                }
                ?>
            ]);

            var options = { title: '2: ¿Con qué frecuencia lo visita su vendedor?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_frecuencia_vende'));
            chart.draw(data, options);
        });

        // Gráfico 3: ¿Con qué frecuencia se comunica su TLK?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Frecuencia', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                $frecuencia_tlk = ["Semanal" => 0, "Quincenal" => 0, "Mensual" => 0, "Mayor a 1 mes" => 0, "No le marcan" => 0];
                foreach ($datos as $row) {
                    if (isset($frecuencia_tlk[$row['frecuencia_tlk']])) {
                        $frecuencia_tlk[$row['frecuencia_tlk']]++;
                    }
                }
                foreach ($frecuencia_tlk as $categoria => $cantidad) {
                    echo "['$categoria', $cantidad],";
                }
                ?>
            ]);

            var options = { title: '3: ¿Con qué frecuencia se comunica su TLK?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_frecuencia_tlk'));
            chart.draw(data, options);
        });

        // Gráfico 4: ¿El vendedor ha llegado a remplazar su visita por llamadas para cargar sus pedidos?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Respuesta', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                $remplazo_visita = ["Si" => 0, "No" => 0, "Algunas veces" => 0, "Frecuentemente" => 0];
                foreach ($datos as $row) {
                    if (isset($remplazo_visita[$row['remplazar']])) {
                        $remplazo_visita[$row['remplazar']]++;
                    }
                }
                foreach ($remplazo_visita as $categoria => $cantidad) {
                    echo "['$categoria', $cantidad],";
                }
                ?>
            ]);

            var options = { title: '4: ¿El vendedor ha llegado a remplazar su visita por llamadas para cargar sus pedidos?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_reemplazo_visita'));
            chart.draw(data, options);
        });

        // Gráfico 5: ¿Ha tenido que llamarle a su TLK para realizar sus pedidos?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Respuesta', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                $remplazo_visita = ["Si" => 0, "No" => 0, "Algunas veces" => 0, "Frecuentemente" => 0];
                foreach ($datos as $row) {
                    if (isset($remplazo_visita[$row['llamar']])) {
                        $remplazo_visita[$row['llamar']]++;
                    }
                }
                foreach ($remplazo_visita as $categoria => $cantidad) {
                    echo "['$categoria', $cantidad],";
                }
                ?>
            ]);

            var options = { title: '5: ¿Ha tenido que llamarle a su TLK para realizar sus pedidos?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_llamar_tlk'));
            chart.draw(data, options);
        });

        // Gráfico 6: En la escala del 1 al 10 ¿Qué posibilidad hay que recomiende nuestro servicio?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Posibilidad', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                for ($i = 1; $i <= 10; $i++) {
                    $count = 0;
                    foreach ($datos as $row) {
                        if ($row['escala'] == $i) {
                            $count++;
                        }
                    }
                    echo "['$i', $count],";
                }
                ?>
            ]);

            var options = { title: '6: En la escala del 1 al 10 ¿Qué posibilidad hay que recomiende nuestro servicio?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_recomendacion'));
            chart.draw(data, options);
        });

        // Gráfico 7: ¿Qué tan satisfecho está con el servicio que recibe?
        google.charts.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Satisfacción', 'Cantidad'],
                <?php
                // Variables para contar respuestas
                $satisfaccion = ["Muy satisfecho" => 0, "Satisfecho" => 0, "Neutro" => 0, "Insatisfecho" => 0, "Muy insatisfecho" => 0];
                foreach ($datos as $row) {
                    if (isset($satisfaccion[$row['servicio']])) {
                        $satisfaccion[$row['servicio']]++;
                    }
                }
                foreach ($satisfaccion as $categoria => $cantidad) {
                    echo "['$categoria', $cantidad],";
                }
                ?>
            ]);

            var options = { title: '7: ¿Qué tan satisfecho está con el servicio que recibe?', is3D: true };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_satisfaccion'));
            chart.draw(data, options);
        });
    </script>


</body>

<?php include '../../css/footer.php' ?>

</html>