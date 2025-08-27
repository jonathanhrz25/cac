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

        .contact-container {
            display: flex;
            justify-content: center; /* Centra los campos en el contenedor */
            gap: 20px; /* Espacio entre los campos */
        }

        .contact-container .form-control {
            width: 500px; /* Ajusta el ancho de los campos */
            text-align: center; /* Centra el texto dentro de los campos */
        }

        .form-group {
            font-family: Arial, sans-serif;
        }

        .btn-group-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-group-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-group-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-outline-primary {
            border: 1px solid #007bff;
            color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        .add-btn {
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 18px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 50%;
            cursor: pointer;
        }

        #campoOtro {
            display: none;
            margin-top: 10px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .checkbox-container label {
            margin-left: 5px;
            margin-right: 10px;
        }

        .add-btn {
            margin-left: auto; /* Coloca el botón a la derecha */
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #003da6!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../index4.html">
                    <img src="../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>

    <div class="container" style="padding-top: 70px;">
        <form class="formulario" method="POST" action="database_form_clientes4.php">
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
                    Encuesta de servicio realizada a clientes que a partir de 2024 presentan un patrón de inactividad, el propósito es conocer la situación presentada 
                    y canalizarla con el área correspondiente para resolución, previniendo tener un gran número de clientes inactivos en las carteras.
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
                    <label for="Pregunta3">1. Confirmación de datos de contacto del cliente:</label><br>
                    <div class="contact-container">
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo" required>
                    </div>
                </div>


                <!-- Resto del formulario -->
                <div id="formularioCompleto">
                    <div class="form-group">
                        <label for="Pregunta4">2. ¿Cuál es el motivo de su inactividad de compra con nosotros? Es
                            posible seleccionar más de una opción.</label><br>
                        <div class="btn-group-wrapper">
                            <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad1" value="Ventas bajas" onchange="toggleAddButton('inactividad1')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad1">Ventas bajas</label>
                                <!-- <div class="form-group" id="text-inactividad1" style="display: none; margin-top: 10px;">
                                    <label for="inactividad1Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad1Text" name="detalles[inactividad1]" placeholder="Ingrese detalles de Ventas bajas">
                                </div> -->

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad2" value="Surtido" onchange="toggleAddButton('inactividad2')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad2">Surtido</label>
                                <div class="form-group" id="text-inactividad2" style="display: none; margin-top: 10px;">
                                    <label for="inactividad2Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad2Text" name="detalles[inactividad2]" placeholder="Ingrese detalles de Surtido">
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad3" value="Falta de visita del vendedor" onchange="toggleAddButton('inactividad3')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad3">Falta de visita del vendedor</label>
                                <div class="form-group" id="text-inactividad3" style="display: none; margin-top: 10px;">
                                    <label for="inactividad3Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad3Text" name="detalles[inactividad3]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad4" value="Precios" onchange="toggleAddButton('inactividad4')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad4">Precios</label>
                                <div class="form-group" id="text-inactividad4" style="display: none; margin-top: 10px;">
                                    <label for="inactividad4Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad4Text" name="detalles[inactividad4]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad5" value="Disponibilidad de material" onchange="toggleAddButton('inactividad5')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad5">Disponibilidad de material</label>
                                <div class="form-group" id="text-inactividad5" style="display: none; margin-top: 10px;">
                                    <label for="inactividad5Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad5Text" name="detalles[inactividad5]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad6" value="Mala calidad del producto" onchange="toggleAddButton('inactividad6')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad6">Mala calidad del producto</label>
                                <div class="form-group" id="text-inactividad6" style="display: none; margin-top: 10px;">
                                    <label for="inactividad6Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad6Text" name="detalles[inactividad6]" placeholder="Describa el por que…" >
                                </div>
                            </div>

                            <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad7" value="Tiempos de entrega" onchange="toggleAddButton('inactividad7')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad7">Tiempos de entrega</label>
                                <div class="form-group" id="text-inactividad7" style="display: none; margin-top: 10px;">
                                    <label for="inactividad7Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad7Text" name="detalles[inactividad7]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad8" value="Devoluciones y garantías" onchange="toggleAddButton('inactividad8')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad8">Devoluciones y garantías</label>
                                <div class="form-group" id="text-inactividad8" style="display: none; margin-top: 10px;">
                                    <label for="inactividad8Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad8Text" name="detalles[inactividad8]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad9" value="Crédito y Cobranza" onchange="toggleAddButton('inactividad9')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad9">Crédito y Cobranza</label>
                                <div class="form-group" id="text-inactividad9" style="display: none; margin-top: 10px;">
                                    <label for="inactividad9Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad9Text" name="detalles[inactividad9]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad10" value="Mala experiencia de compra" onchange="toggleAddButton('inactividad10')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad10">Mala experiencia de compra</label>
                                <div class="form-group" id="text-inactividad10" style="display: none; margin-top: 10px;">
                                    <label for="inactividad10Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad10Text" name="detalles[inactividad10]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad11" value="Mala atención de TLK" onchange="toggleAddButton('inactividad11')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad11">Mala atención de TLK</label>
                                <div class="form-group" id="text-inactividad11" style="display: none; margin-top: 10px;">
                                    <label for="inactividad11Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad11Text" name="detalles[inactividad11]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad12" value="Ventas bajas" onchange="toggleAddButton('inactividad12')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad12">No pudo ingresar a la página</label>
                                <!-- <div class="form-group" id="text-inactividad12" style="display: none; margin-top: 10px;">
                                    <label for="inactividad12Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad12Text" name="detalles[inactividad12]" placeholder="Describa el por que…" >
                                </div> -->
                            </div>

                            <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad13" value="Surtido" onchange="toggleAddButton('inactividad13')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad13">Motivos personales</label>
                                <!-- <div class="form-group" id="text-inactividad13" style="display: none; margin-top: 10px;">
                                    <label for="inactividad13Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad13Text" name="detalles[inactividad13]" placeholder="Describa el por que…" >
                                </div> -->

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad14" value="Falta de visita del vendedor" onchange="toggleAddButton('inactividad14')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad14">Cambio de razón social</label>
                                <div class="form-group" id="text-inactividad14" style="display: none; margin-top: 10px;">
                                    <label for="inactividad14Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad14Text" name="detalles[inactividad14]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad15" value="Precios" onchange="toggleAddButton('inactividad15')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad15">Cambio de giro comercial</label>
                                <div class="form-group" id="text-inactividad15" style="display: none; margin-top: 10px;">
                                    <label for="inactividad15Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad15Text" name="detalles[inactividad15]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad16" value="Disponibilidad de material" onchange="toggleAddButton('inactividad16')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad16">Reapertura de negocio</label>
                                <div class="form-group" id="text-inactividad16" style="display: none; margin-top: 10px;">
                                    <label for="inactividad16Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad16Text" name="detalles[inactividad16]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad17" value="Se le quito el Crédito" onchange="toggleAddButton('inactividad17')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad17">Se le quito el Crédito</label>
                                <div class="form-group" id="text-inactividad17" style="display: none; margin-top: 10px;">
                                    <label for="inactividad17Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad17Text" name="detalles[inactividad17]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad18" value="Cerro Negocio" onchange="toggleAddButton('inactividad18')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad18">Cerro Negocio</label>
                                <!-- <div class="form-group" id="text-inactividad18" style="display: none; margin-top: 10px;">
                                    <label for="inactividad18Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad18Text" name="detalles[inactividad18]" placeholder="Describa el por que…" >
                                </div> -->
                            </div>
                        </div>

                        <div class="btn-group-row">
                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad19" value="Prefiere la Competencia" onchange="toggleAddButton('inactividad19')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad19">Prefiere la Competencia</label>
                                <div class="form-group" id="text-inactividad19" style="display: none; margin-top: 10px;">
                                    <label for="inactividad19Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad19Text" name="detalles[inactividad19]" placeholder="Describa el por que…" >
                                </div>

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividad20" value="No requiere Material" onchange="toggleAddButton('inactividad20')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividad20">No requiere Material</label>
                                <!-- <div class="form-group" id="text-inactividad20" style="display: none; margin-top: 10px;">
                                    <label for="inactividad20Text">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividad20Text" name="detalles[inactividad20]" placeholder="Describa el por que…" >
                                </div> -->

                                <input type="checkbox" class="btn-check" name="inactividad[]" id="inactividadOtro" value="Otro" onchange="toggleAddButton('inactividadOtro')">
                                <label class="btn btn-outline-primary btn-sm" for="inactividadOtro">Otro</label>
                                <div class="form-group" id="text-inactividadOtro" style="display: none; margin-top: 10px;">
                                    <label for="inactividadOtroText">Por favor, especifique:</label>
                                    <input type="text" class="form-control" id="inactividadOtroText" name="detalles[inactividadOtro]" placeholder="Describa el por que…" >
                                </div>
                            </div>
                        </div>

                        <div id="text-box-container"></div>
                    </div>

                    <div class="form-group" id="pregunta4">
                        <label for="Pregunta6">3. Notamos que hay otra cuenta dada de alta con nosotros relacionada a usted ¿Le interesaría seguir trabajando 
                            con su cuenta o a través de la cuenta relacionada?</label><br>
                        <input type="radio" class="btn-check" name="alta_relacion" id="alta_relacion_1" value="Se queda con su cuenta">
                        <label class="btn btn-outline-primary btn-sm" for="alta_relacion_1">Se queda con su cuenta</label>

                        <input type="radio" class="btn-check" name="alta_relacion" id="alta_relacion_2" value="Trabajará a través de la cuenta relacionada">
                        <label class="btn btn-outline-primary btn-sm" for="alta_relacion_2">Trabajará a través de la cuenta relacionada</label>

                        <input type="radio" class="btn-check" name="alta_relacion" id="alta_relacion_3" value="Trabajaran en ambas cuentas">
                        <label class="btn btn-outline-primary btn-sm" for="alta_relacion_3">Trabajaran en ambas cuentas</label>
                    </div>

                    <div class="form-group" id="pregunta5">
                        <label for="Pregunta7">4. ¿Le interesa seguir trabajando con nosotros?</label><br>
                        <input type="radio" class="btn-check" name="relacion_com" id="relacion_com_si" value="Si">
                        <label class="btn btn-outline-primary btn-sm" for="relacion_com_si">Si</label>

                        <input type="radio" class="btn-check" name="relacion_com" id="relacion_com_no2" value="No">
                        <label class="btn btn-outline-primary btn-sm" for="relacion_com_no2">No</label>

                        <input type="radio" class="btn-check" name="relacion_com" id="relacion_com_no3" value="Si, con Crédito">
                        <label class="btn btn-outline-primary btn-sm" for="relacion_com_no3">Si, con Crédito</label>
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
                        url: 'verificar_cliente4.php',
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

    <script>
        function toggleAddButton(optionId) {
        const checkbox = document.getElementById(optionId);
        const textBoxContainer = document.getElementById(`text-${optionId}`);
        const addButton = textBoxContainer.querySelector('.add-btn');

        // Mostrar u ocultar el contenedor de texto y habilitar el botón si el checkbox está seleccionado
        if (checkbox.checked) {
            textBoxContainer.style.display = 'block';
            addButton.disabled = false;
        } else {
            textBoxContainer.style.display = 'none';
            addButton.disabled = true;
        }
    }

    function toggleTextBox(optionId) {
        const textBox = document.getElementById(`${optionId}Text`);
        if (textBox) {
            textBox.focus(); // Puedes ajustar para que el usuario ingrese el detalle
        }
    }
    </script>


    <script>
        // Función para activar o desactivar la visibilidad y el atributo "required"
        function toggleAddButton(checkboxId) {
            const checkbox = document.getElementById(checkboxId);
            const textField = document.getElementById(`text-${checkboxId}`);
            const inputField = textField.querySelector('input');  // Obtenemos el campo de texto dentro del div

            // Si el checkbox está marcado, mostramos el campo de texto y lo hacemos requerido
            if (checkbox.checked) {
                textField.style.display = "block";
                inputField.setAttribute("required", "true");  // Añadimos el atributo "required"
            } else {
                textField.style.display = "none";
                inputField.removeAttribute("required");  // Quitamos el atributo "required"
            }
        }

        // Validación para asegurarnos de que el formulario puede enviarse sin error
        function validateForm(event) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            let checkboxChecked = false;

            // Verificamos si al menos un checkbox está seleccionado
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    checkboxChecked = true;
                }
            });

            // Si no hay checkbox seleccionado, validamos los campos visibles que tengan 'required'
            if (!checkboxChecked) {
                const formFields = document.querySelectorAll('.form-group input[required]');
                let formValid = true;

                formFields.forEach(field => {
                    if (field.style.display !== 'none' && !field.value) {
                        formValid = false; // Si hay un campo visible requerido vacío, no se permite el envío
                    }
                });

                // Si el formulario no es válido, prevenimos el envío
                if (!formValid) {
                    event.preventDefault();
                    alert("Por favor, completa los campos requeridos.");
                }
            }
        }

        // Añadir el evento de validación antes de enviar el formulario
        const form = document.querySelector('form'); // Selecciona el formulario
        if (form) {
            form.addEventListener('submit', validateForm);
        }
    </script>







    <?php include '../css/footer.php' ?>

</body>

</html>