<?php
session_start();
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
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #003da6!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../index2.html">
                    <img src="../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>

    <div class="container" style="padding-top: 70px;">
        <form class="formulario" method="POST" action="database_form_clientes2.php">
            <div class="container col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-auto mx-auto">
                        <img src="../img/CAC.png" alt="Imagen" style="max-width: 100px;">
                    </div>
                    <div class="col-md">
                        <h1 class="display-6 text-center">Encuesta de Servicio</h1>
                    </div>
                </div><br>

                <!-- Texto central -->
                <div class="subtitulo">
                    <p>
                        Encuesta de servicio realizada a clientes que han disminuido su actividad de compra con Serva y
                        que tienen relación con otra cuenta dada de alta con nosotros, el objetivo es conocer sus
                        necesidades y buscar retomar la relación comercial con ellos.
                    </p>
                </div>

                <div class="form-group">
                    <label for="Pregunta">Indicar si tiene relación con otro cliente</label><br>
                    <input type="radio" class="btn-check" name="relacion_otro" id="relacion_otro1" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="relacion_otro1">Si</label>

                    <input type="radio" class="btn-check" name="relacion_otro" id="relacion_otro2" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="relacion_otro2">No</label>
                </div>

                <div class="form-group">
                    <label for="Pregunta1">No. de cliente: </label>
                    <input type="text" name="num_cliente" class="form-control" id="num_cliente"
                        aria-describedby="nameHelp" placeholder="Ingrese Num. de cliente" required />
                    <small id="clienteStatus" class="form-text text-muted"></small> <!-- Div para mostrar el mensaje -->
                </div>

                <div class="form-group">
                    <label for="Pregunta2">En caso de no ser el titular de la cuenta colocar el nombre de la persona que
                        responde la encuesta (nombre y puesto o relación con el titular): </label>
                    <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nameHelp"
                        placeholder="Nombre, puesto o relación con el titular" required />
                </div>

                <div class="form-group">
                    <label for="Pregunta3">1. ¿Sigue en apertura su negocio?</label><br>
                    <input type="radio" class="btn-check" name="negocio" id="Si1" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si1">Si</label>

                    <input type="radio" class="btn-check" name="negocio" id="No2" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No2">No</label>
                </div>

                <!-- Resto del formulario -->
                <div id="formularioCompleto">
                    <div class="form-group">
                        <label for="Pregunta4">2. ¿Cuál es el motivo de su inactividad de compra con nosotros? Es
                            posible seleccionar más de una opción.</label><br>
                        <div class="btn-group-wrapper">
                            <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad1" value="Ventas bajas">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad1">Ventas bajas</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad2" value="Surtido">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad2">Surtido</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad3" value="Falta de visita del vendedor">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad3">Falta de visita del vendedor</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad4" value="Precios">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad4">Precios</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad5" value="Disponibilidad de material">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad5">Disponibilidad de material</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad6" value="Mala calidad del producto">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad6">Mala calidad del producto</label>
                            </div>

                            <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad7" value="Tiempos de entrega">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad7">Tiempos de entrega</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad8" value="Devoluciones y garantías">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad8">Devoluciones y garantías</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad9" value="Crédito y Cobranza">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad9">Crédito y Cobranza</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad10" value="Mala experiencia de compra">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad10">Mala experiencia de compra</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad11" value="Mala atención de TLK">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad11">Mala atención de TLK</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad12" value="Ventas bajas">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad12">No pudo ingresar a la página</label>
                            </div>

                            <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad13" value="Surtido">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad13">Motivos personales</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad14" value="Falta de visita del vendedor">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad14">Cambio de razón social</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad15" value="Precios">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad15">Cambio de giro comercial</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad16" value="Disponibilidad de material">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad16">Reapertura de negocio</label>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividadOtro" value="Otro">
                                <label class="btn btn-outline-primary btn-sm" for="inactividadOtro">Otro</label>
                            </div>
                        </div>

                        <!-- Campo de texto que se despliega -->
                        <div class="form-group" id="campoOtro" style="display:none; margin-top: 10px;">
                            <label for="otroTexto">Por favor, especifique:</label>
                            <input type="text" class="form-control" id="otroTexto" name="otroTexto"
                                placeholder="Ingrese por qué otro motivo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">3. De acuerdo a la respuesta anterior, colocar la
                            situación presentada con Serva en caso de que aplique.</label>
                        <textarea class="form-control" name="situacion" id="situacion" rows="3"
                            placeholder="Escriba la situación presentada"></textarea>
                    </div>

                    <div class="form-group" id="pregunta4">
                        <label for="Pregunta6">4. Notamos que hay otra cuenta dada de alta con nosotros relacionada a usted ¿Le interesaría retomar la relación comercial con Serva con su cuenta o prefiere</label><br>
                        <input type="radio" class="btn-check" name="alta_relacion" id="alta_relacion_1" value="Se queda con su cuenta">
                        <label class="btn btn-outline-primary btn-sm" for="alta_relacion_1">Se queda con su cuenta</label>

                        <input type="radio" class="btn-check" name="alta_relacion" id="alta_relacion_2" value="Trabajará a través de la cuenta relacionada">
                        <label class="btn btn-outline-primary btn-sm" for="alta_relacion_2">Trabajará a través de la cuenta relacionada</label>

                        <input type="radio" class="btn-check" name="alta_relacion" id="alta_relacion_3" value="Trabajaran en ambas cuentas">
                        <label class="btn btn-outline-primary btn-sm" for="alta_relacion_3">Trabajaran en ambas cuentas</label>
                    </div>

                    <div class="form-group" id="pregunta5">
                        <label for="Pregunta7">5. ¿Le interesaría retomar la relación comercial con Serva?</label><br>
                        <input type="radio" class="btn-check" name="relacion_com" id="relacion_com_si" value="Si">
                        <label class="btn btn-outline-primary btn-sm" for="relacion_com_si">Si</label>

                        <input type="radio" class="btn-check" name="relacion_com" id="relacion_com_no2" value="No">
                        <label class="btn btn-outline-primary btn-sm" for="relacion_com_no2">No</label>
                    </div><br>
                </div>

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
            const radiosNegocio = document.querySelectorAll('input[name="negocio"]');
            const formularioCompleto = document.getElementById('formularioCompleto');
            const campoOtro = document.getElementById('campoOtro');
            const checkboxesInactividad = document.querySelectorAll('input[name="inactividad[]"]');
            const estadoEnvio = document.getElementById('estado_envio');

            radiosNegocio.forEach(radio => {
                radio.addEventListener('change', function () {
                    formularioCompleto.classList.toggle('oculto', radio.value === 'No');

                    // Ajustar el valor del campo oculto
                    estadoEnvio.value = radio.value === 'No' ? 'solo_tres_campos' : '';
                });
            });

            checkboxesInactividad.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    campoOtro.style.display = checkbox.id === 'inactividadOtro' && checkbox.checked ? 'block' : 'none';
                });
            });

            document.querySelector('form').addEventListener('submit', function (event) {
                const isChecked = [...checkboxesInactividad].some(checkbox => checkbox.checked);
                const estado = estadoEnvio.value;

                if (estado === 'solo_tres_campos') {
                    // Solo permitir enviar si los campos requeridos están llenos
                    const numCliente = document.getElementById('num_cliente').value.trim();
                    const nombre = document.getElementById('nombre').value.trim();
                    const negocioSeleccionado = [...radiosNegocio].some(radio => radio.checked);

                    if (!numCliente || !nombre || !negocioSeleccionado) {
                        alert('Por favor, complete todos los campos requeridos.');
                        event.preventDefault();
                    }
                } else if (!isChecked) {
                    // Mostrar alerta si no se seleccionó ninguna opción en el caso contrario
                    alert('Por favor, seleccione al menos una opción para el motivo de inactividad.');
                    event.preventDefault();
                }
            });
        });
    </script>

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
                        url: 'verificar_cliente2.php',
                        data: { num_cliente: num_cliente },
                        success: function (response) {
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const relacionOtroSi = document.getElementById('relacion_otro1');
            const relacionOtroNo = document.getElementById('relacion_otro2');
            const pregunta4 = document.getElementById('pregunta4');

            // Inicialmente ocultar la pregunta 4 si está seleccionada la opción "No"
            if (relacionOtroNo.checked) {
                pregunta4.style.display = 'none';
            }

            // Mostrar u ocultar la pregunta 4 según la selección del usuario
            relacionOtroSi.addEventListener('change', function () {
                pregunta4.style.display = 'block';
            });

            relacionOtroNo.addEventListener('change', function () {
                pregunta4.style.display = 'none';
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const relacionOtroSi = document.getElementById('relacion_otro1');
            const relacionOtroNo = document.getElementById('relacion_otro2');
            const pregunta4 = document.getElementById('pregunta4');
            const pregunta5 = document.getElementById('pregunta5'); // Referencia a la pregunta 5

            // Inicialmente ocultar las preguntas según la selección
            if (relacionOtroNo.checked) {
                pregunta4.style.display = 'none';
            }

            // Mostrar u ocultar la pregunta 4 y 5 según la selección del usuario
            relacionOtroSi.addEventListener('change', function () {
                pregunta4.style.display = 'block';
                pregunta5.style.display = 'none'; // Ocultar pregunta 5 cuando se selecciona "Sí" en la pregunta 4
            });

            relacionOtroNo.addEventListener('change', function () {
                pregunta4.style.display = 'none';
                pregunta5.style.display = 'block'; // Mostrar pregunta 5 cuando se selecciona "No" en la pregunta 4
            });
        });
    </script>

    

    <?php include '../css/footer.php' ?>

</body>

</html>