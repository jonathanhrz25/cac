<?php
session_start();
require("../../clientes/connect.php");

// Obtener el parámetro de la ruta desde la URL
$ruta = isset($_GET['ruta']) ? $_GET['ruta'] : null;

// Verificar que la ruta está definida
if ($ruta) {
    // Consulta para obtener la ruta y el nombre correspondiente de la tabla form_rutas
    $sql = "SELECT ruta, nombre FROM form_rutas WHERE ruta = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ruta); // Enlazar el parámetro de la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encuentra un resultado
    if ($result->num_rows > 0) {
        // Obtener la fila de resultados
        $row = $result->fetch_assoc();
        $ruta = $row['ruta'];
        $nombre = $row['nombre'];
    } else {
        // Si no se encuentra la ruta, puedes manejar el error aquí
        $ruta = "No encontrada";
        $nombre = "No encontrado";
    }

    $stmt->close();
} else {
    $ruta = "No definida";
    $nombre = "No definido";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Encuesta de Servicio</title>
    <style>
        .formulario {
            text-align: justify;
            padding: 10px;
        }

        .subtitulo {
            text-align: center;
            padding: 10px;
        }

        .cuadro1 {
            text-align: center;
            padding: 10px;
        }

        .btn-group-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-group-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn-group-row label {
            flex: 1;
            text-align: center;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .btn-group-row {
                flex-direction: column;
            }

            .btn-group-wrapper {
                gap: 5px;
            }
        }

        @media (min-width: 769px) {
            .btn-group-wrapper {
                gap: 15px;
            }
        }

        .oculto {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../rutas/ruta47.php">
                    <img src="../../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>

    <div class="container" style="padding-top: 70px;">
        <form class="formulario" method="POST" action="../db/database_form_ruta.php">
            <div class="container col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-auto mx-auto">
                        <img src="../../img/CAC.png" alt="Imagen" style="max-width: 100px;">
                    </div>
                    <div class="col-md">
                        <h1 class="display-6 text-center">Encuesta de Servicio</h1>
                    </div>
                </div><br>

                <!-- Texto central -->
                <div class="subtitulo">
                    <p>
                        Buenas tardes, nos comunicamos de atención a clientes de Automotriz Serva para conocer el servicio que recibe de su equipo de ventas.
                    </p>
                </div>

                <div class="form-group">
                    <label for="Pregunta1">Ruta: </label>
                    <input type="text" name="ruta" class="form-control" id="ruta" value="<?= htmlspecialchars($ruta); ?>" disabled />
                    <small id="clienteStatus" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="Pregunta1">Nombre: </label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= htmlspecialchars($nombre); ?>" disabled />
                    <small id="clienteStatus" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="Pregunta1">No. de cliente: </label>
                    <input type="text" name="num_cliente" class="form-control" id="num_cliente" aria-describedby="nameHelp"
                        placeholder="Ingrese Num. de cliente" required />
                    <small id="clienteStatus" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="Pregunta1">Nombre del Responsable: </label>
                    <input type="text" name="nombre_responsable" class="form-control" id="nombre_responsable" aria-describedby="nameHelp"
                        placeholder="Ingrese Nombre del responsable" required />
                    <small id="clienteStatus" class="form-text text-muted"></small>
                </div>

                <!-- Nuevos campos integrados -->
                <div class="form-group">
                    <label for="apoyo">1. ¿Con quién se apoya más para realizar sus pedidos?</label><br>
                    <div class="btn-group" role="group" aria-label="Pregunta apoyo">
                        <input type="radio" class="btn-check" name="apoyo" value="Vendedor" id="apoyo1" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="apoyo1">a) Vendedor</label>

                        <input type="radio" class="btn-check" name="apoyo" value="TLK" id="apoyo2" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="apoyo2">b) TLK</label>

                        <input type="radio" class="btn-check" name="apoyo" value="Ambos" id="apoyo3" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="apoyo3">c) Ambos</label>

                        <input type="radio" class="btn-check" name="apoyo" value="Pagina" id="apoyo4" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="apoyo4">d) A través de la página</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="frecuencia_vende">2. ¿Con qué frecuencia lo visita su vendedor?</label><br>
                    <div class="btn-group" role="group" aria-label="Pregunta frecuencia vendedor">
                        <input type="radio" class="btn-check" name="frecuencia_vende" value="Semanal" id="frecuencia1" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia1">Semanal</label>

                        <input type="radio" class="btn-check" name="frecuencia_vende" value="Quincenal" id="frecuencia2" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia2">Quincenal</label>

                        <input type="radio" class="btn-check" name="frecuencia_vende" value="Mensual" id="frecuencia3" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia3">Mensual</label>

                        <input type="radio" class="btn-check" name="frecuencia_vende" value="Mayor a 1 mes" id="frecuencia4" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia4">Mayor a 1 mes</label>

                        <input type="radio" class="btn-check" name="frecuencia_vende" value="No lo visitan" id="frecuencia5" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia5">No lo visitan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="frecuencia_tlk">3. ¿Con qué frecuencia se comunica su TLK?</label><br>
                    <div class="btn-group" role="group" aria-label="Pregunta frecuencia TLK">
                        <input type="radio" class="btn-check" name="frecuencia_tlk" value="Semanal" id="frecuencia_tlk1" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia_tlk1">Semanal</label>

                        <input type="radio" class="btn-check" name="frecuencia_tlk" value="Quincenal" id="frecuencia_tlk2" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia_tlk2">Quincenal</label>

                        <input type="radio" class="btn-check" name="frecuencia_tlk" value="Mensual" id="frecuencia_tlk3" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia_tlk3">Mensual</label>

                        <input type="radio" class="btn-check" name="frecuencia_tlk" value="Mayor a 1 mes" id="frecuencia_tlk4" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia_tlk4">Mayor a 1 mes</label>

                        <input type="radio" class="btn-check" name="frecuencia_tlk" value="No le marcan" id="frecuencia_tlk5" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="frecuencia_tlk5">No le marcan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="remplazar">4. ¿El vendedor ha llegado a remplazar su visita por llamadas para cargar sus pedidos?</label><br>
                    <div class="btn-group" role="group" aria-label="Pregunta reemplazo visita">
                        <input type="radio" class="btn-check" name="remplazar" value="Si" id="reemplazo1" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="reemplazo1">a) Si</label>

                        <input type="radio" class="btn-check" name="remplazar" value="No" id="reemplazo2" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="reemplazo2">b) No</label>

                        <input type="radio" class="btn-check" name="remplazar" value="Algunas veces" id="reemplazo3" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="reemplazo3">c) Algunas veces</label>

                        <input type="radio" class="btn-check" name="remplazar" value="Frecuentemente" id="reemplazo4" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="reemplazo4">d) Frecuentemente</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="llamar">5. ¿Ha tenido que llamarle a su TLK para realizar sus pedidos?</label><br>
                    <div class="btn-group" role="group" aria-label="Pregunta llamar TLK">
                        <input type="radio" class="btn-check" name="llamar" value="Si" id="llamar1" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="llamar1">a) Si</label>

                        <input type="radio" class="btn-check" name="llamar" value="No" id="llamar2" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="llamar2">b) No</label>

                        <input type="radio" class="btn-check" name="llamar" value="Algunas veces" id="llamar3" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="llamar3">c) Algunas veces</label>

                        <input type="radio" class="btn-check" name="llamar" value="Frecuentemente" id="llamar4" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="llamar4">d) Frecuentemente</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="escala">6. En la escala del 1 al 10 ¿Qué posibilidad hay que recomiende nuestro servicio?</label><br>
                    <div class="btn-group-wrapper">
                        <div class="btn-group-row">
                            <?php for ($i = 1; $i <= 10; $i++) { ?>
                                <input type="radio" class="btn-check" name="escala" value="<?= $i ?>" id="escala<?= $i ?>" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="escala<?= $i ?>"><?= $i ?></label>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="servicio">7. ¿Qué tan satisfecho está con el servicio que recibe?</label><br>
                    <div class="btn-group-wrapper">
                        <div class="btn-group-row">
                            <input type="radio" class="btn-check" name="servicio" value="Muy insatisfecho" id="servicio1" autocomplete="off" required>
                            <label class="btn btn-outline-primary" for="servicio1">Muy insatisfecho</label>

                            <input type="radio" class="btn-check" name="servicio" value="Insatisfecho" id="servicio2" autocomplete="off" required>
                            <label class="btn btn-outline-primary" for="servicio2">Insatisfecho</label>

                            <input type="radio" class="btn-check" name="servicio" value="Neutro" id="servicio3" autocomplete="off" required>
                            <label class="btn btn-outline-primary" for="servicio3">Neutro</label>

                            <input type="radio" class="btn-check" name="servicio" value="Satisfecho" id="servicio4" autocomplete="off" required>
                            <label class="btn btn-outline-primary" for="servicio4">Satisfecho</label>

                            <input type="radio" class="btn-check" name="servicio" value="Muy satisfecho" id="servicio5" autocomplete="off" required>
                            <label class="btn btn-outline-primary" for="servicio5">Muy satisfecho</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comentarios</label>
                    <textarea class="form-control" name="comentario_escala" id="comentario_escala" rows="3"
                        placeholder="Si tiene algun comentario, escribalo en este apartado"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">8.	¿Desea realizar actualización de algún dato?</label>
                    <textarea class="form-control" name="actualizacion" id="actualizacion" rows="3"
                        placeholder="Datos a actualizar"></textarea>
                </div>

                <!-- Resto del formulario -->
                <div class="cuadro1">
                    <h7>Contactos Centro de Atención a Clientes:</h7><br>
                    <h7>Tel: 771 532 4260 Ext: 3000, 3001, 3002, 3003 y 3004</h7><br>
                    <h7>WhatsApp: 771 403 1130</h7><br>
                </div><br><br>

                <!-- Campo oculto para controlar el estado de envío -->
                <input type="hidden" id="estado_envio" name="estado_envio" value="">

                <!-- Boton de guardado Formulario -->
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                </div><br><br><br>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const numClienteInput = document.getElementById('num_cliente');
            const clienteStatus = document.getElementById('clienteStatus');
            const allInputs = document.querySelectorAll('input, textarea');
            const submitButton = document.querySelector('input[type="submit"]');

            // Verificación automática al cambiar el campo de número de cliente
            numClienteInput.addEventListener('blur', function () {
                const num_cliente = numClienteInput.value.trim();
                if (num_cliente) {
                    $.ajax({
                        type: 'POST',
                        url: '../../clientes/verificar_cliente5.php',
                        data: { num_cliente: num_cliente },
                        success: function(response) {
                            if (response === '1') {
                                clienteStatus.textContent = "Este cliente ya ha respondido la encuesta anteriormente.";
                                clienteStatus.style.color = "red";
                                deshabilitarFormulario(); // Deshabilitar el formulario
                            } else {
                                clienteStatus.textContent = "";
                                habilitarFormulario(); // Habilitar el formulario
                            }
                        }
                    });
                }
            });

            function deshabilitarFormulario() {
                allInputs.forEach(input => input.disabled = true);
                submitButton.disabled = true;
            }

            function habilitarFormulario() {
                allInputs.forEach(input => input.disabled = false);
                submitButton.disabled = false;
            }
        });
    </script>

    <?php include '../../css/footer.php' ?>

</body>

</html>
