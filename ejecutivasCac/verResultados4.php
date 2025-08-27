<?php
session_name('cac'); // Debe ser el mismo nombre de sesión
session_start();
require ("conexion.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro de Atencion a Clientes</title>
    <style>
        .more-content {
            display: none;
        }

        .show-more-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .thead th {
            color: white;
            font-family: "Segoe IU", serif;
            font-size: 120%;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../ejecutivasCac/bloque4.php">
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

    <body style="padding-top: 70px;">

        <?php
        require ("conexion.php");

        // Inicializar la variable de búsqueda
        $busqueda = "";

        // Verificar si se proporcionó un parámetro de búsqueda
        if (isset($_GET['enviar'])) {
            $busqueda = $_GET["busqueda"];

            // Consulta SQL para buscar en la tabla 'form_clientes2'
            $sql = "SELECT * FROM form_clientes4 WHERE (num_cliente LIKE '%$busqueda%')";

            // Ejecutar la consulta
            $result = mysqli_query($conn, $sql);
        }
        ?>

        <?php

        // Número de resultados por página
        $resultados_por_pagina = 10;

        // Página actual, si no se proporciona, asumiremos la página 1
        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcular el índice del primer resultado en esta página
        $indice_inicio = ($pagina_actual - 1) * $resultados_por_pagina;

        // Consulta SQL con limit y offset para paginación
        $sql_paginacion = "SELECT * FROM form_clientes4 WHERE (num_cliente LIKE '%$busqueda%') LIMIT $indice_inicio, $resultados_por_pagina";
        $result_paginacion = mysqli_query($conn, $sql_paginacion);

        // Iterar sobre los resultados y construir la tabla
        ?>

        <body style="padding-top: 100px;">
            <h1 class="display-6">Tabla de Resultados Encuestas - Clientes</h1>
            <div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead" style="background-color: #d63384!important;">
                            <tr>
                                <th>Id</th>
                                <th>Rrelación con otro cliente</th>
                                <th>No. de cliente</th>
                                <th>Nombre y puesto con el titular</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>2. Inactividad de compra con nosotros</th>
                                <th>Surtido</th>
                                <th>Falta de visita del Vendedor</th>
                                <th>Precios</th>
                                <th>Disponibilidad de Material</th>
                                <th>Mala calidad del Producto</th>
                                <th>Tiempos de Entrega</th>
                                <th>Devoluciones y garantias</th>
                                <th>Credito y Cobranza</th>
                                <th>Mala experiencia de Compra</th>
                                <th>Mala atencion de TLK</th>
                                <th>Cambio de razon social</th>
                                <th>Cambio de Giro comercial</th>
                                <th>Reapertura de Negocio</th>
                                <th>Se le quito el credito</th>
                                <th>Prefiere la competencia</th>
                                <th>Otro motivo</th>
                                <th>3. Seguir trabajando con su cuenta o a través de la cuenta relacionada</th>
                                <th>4. ¿Le interesa seguir trabajando con nosotros?</th>
                            </tr>
                        </thead>
                        <?php
                        while ($mostrar = mysqli_fetch_array($result_paginacion)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $mostrar['Id'] ?></td>
                                <td class="text-center"><?php echo $mostrar['relacion_otro'] ?></td>
                                <td class="text-center"><?php echo $mostrar['num_cliente'] ?></td>
                                <td class="text-center"><?php echo $mostrar['nombre'] ?></td>
                                <td class="text-center"><?php echo $mostrar['telefono'] ?></td>
                                <td class="text-center"><?php echo $mostrar['correo'] ?></td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad']) > 10) {
                                    echo substr($mostrar['inactividad'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad2']) > 10) {
                                    echo substr($mostrar['inactividad2'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad2'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad2'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad3']) > 10) {
                                    echo substr($mostrar['inactividad3'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad3'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad3'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad4']) > 10) {
                                    echo substr($mostrar['inactividad4'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad4'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad4'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad5']) > 10) {
                                    echo substr($mostrar['inactividad5'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad5'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad5'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad6']) > 10) {
                                    echo substr($mostrar['inactividad6'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad6'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad6'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad7']) > 10) {
                                    echo substr($mostrar['inactividad7'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad7'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad7'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad8']) > 10) {
                                    echo substr($mostrar['inactividad8'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad8'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad8'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad9']) > 10) {
                                    echo substr($mostrar['inactividad9'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad9'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad9'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad10']) > 10) {
                                    echo substr($mostrar['inactividad10'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad10'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad10'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad11']) > 10) {
                                    echo substr($mostrar['inactividad11'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad11'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad11'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad14']) > 10) {
                                    echo substr($mostrar['inactividad14'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad14'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad14'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad15']) > 10) {
                                    echo substr($mostrar['inactividad15'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad15'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad15'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad16']) > 10) {
                                    echo substr($mostrar['inactividad16'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad16'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad16'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad17']) > 10) {
                                    echo substr($mostrar['inactividad17'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad17'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad17'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividad19']) > 10) {
                                    echo substr($mostrar['inactividad19'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividad19'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividad19'];
                                }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                if (strlen($mostrar['inactividadOtro']) > 10) {
                                    echo substr($mostrar['inactividadOtro'], 0, 10) . '<span class="more-content">' . substr($mostrar['inactividadOtro'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['inactividadOtro'];
                                }
                                ?>
                                </td>
                                <td class="text-center"><?php echo $mostrar['alta_relacion'] ?></td>
                                <td class="text-center"><?php echo $mostrar['relacion_com'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>

            <?php
            // Calcular el número total de páginas
            $sql_total_resultados = "SELECT COUNT(*) as total FROM form_clientes4 WHERE (num_cliente LIKE '%$busqueda%')";
            $result_total_resultados = mysqli_query($conn, $sql_total_resultados);

            if ($result_total_resultados) {
                $total_resultados = mysqli_fetch_assoc($result_total_resultados)['total'];
                $total_paginas = ceil($total_resultados / $resultados_por_pagina);
            } else {
                // Manejar el caso en que la consulta falle
                echo "Error al obtener el total de resultados.";
                // Puedes agregar más información sobre el error si es necesario
                exit();
            }
            ?>

            <!-- Código de paginación con el nuevo estilo... -->
            <div class="d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link"
                                href="?pagina=<?php echo ($pagina_actual <= 1) ? 1 : ($pagina_actual - 1); ?>&busqueda=<?php echo urlencode($busqueda); ?>">Anterior</a>
                        </li>

                        <?php
                        // Limita el número de páginas mostradas a solo 4
                        $max_paginas_mostradas = 4;

                        $mitad_max_paginas = floor($max_paginas_mostradas / 2);
                        $pagina_inicio = max(1, $pagina_actual - $mitad_max_paginas);
                        $pagina_fin = min($total_paginas, $pagina_inicio + $max_paginas_mostradas - 1);

                        if ($pagina_fin - $pagina_inicio < $max_paginas_mostradas - 1) {
                            $pagina_inicio = max(1, $pagina_fin - $max_paginas_mostradas + 1);
                        }

                        // Muestra "..." si hay más páginas antes de la primera página mostrada
                        if ($pagina_inicio > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?pagina=1&busqueda=' . urlencode($busqueda) . '&enviar=Buscar">1</a></li>';
                            if ($pagina_inicio > 2) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                        }

                        // Muestra las páginas
                        for ($i = $pagina_inicio; $i <= $pagina_fin; $i++) {
                            echo '<li class="page-item ' . (($pagina_actual == $i) ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '&busqueda=' . urlencode($busqueda) . '&enviar=Buscar">' . $i . '</a></li>';
                        }

                        // Muestra "..." si hay más páginas después de la última página mostrada
                        if ($pagina_fin < $total_paginas) {
                            if ($pagina_fin < $total_paginas - 1) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                            echo '<li class="page-item"><a class="page-link" href="?pagina=' . $total_paginas . '&busqueda=' . urlencode($busqueda) . '&enviar=Buscar">' . $total_paginas . '</a></li>';
                        }
                        ?>

                        <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                            <a class="page-link"
                                href="?pagina=<?php echo ($pagina_actual >= $total_paginas) ? $total_paginas : ($pagina_actual + 1); ?>&busqueda=<?php echo urlencode($busqueda); ?>">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Boton Descargar -->
            <div class="text-center">
                <a href="descargar4.php" class="btn btn-primary">Descargar Excel</a>
            </div><br><br><br>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var showMoreBtns = document.querySelectorAll('.show-more-btn');
                    showMoreBtns.forEach(function (btn) {
                        btn.addEventListener('click', function () {
                            var moreContent = this.previousElementSibling;
                            if (moreContent.style.display === 'none') {
                                moreContent.style.display = 'inline';
                                this.textContent = ' Ver menos';
                            } else {
                                moreContent.style.display = 'none';
                                this.textContent = ' Ver más';
                            }
                        });
                    });

                    var sidebarToggle = document.getElementById('sidebarToggle');
                    var sidebarNav = document.getElementById('sidebarNav');
                    var mainContent = document.querySelector('.main-content');

                    sidebarToggle.addEventListener('click', function () {
                        sidebarNav.classList.toggle('hidden');
                        mainContent.classList.toggle('expanded');
                    });
                });
            </script>


            <?php
            // Cerrar la conexión
            $conn->close();
            ?>

            <?php include '../css/footer.php' ?>
        </body>

</html>