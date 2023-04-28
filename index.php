<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="CTM_GoatSan">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

    <!-- Title Page-->
    <title>Contacto Vivienda Total</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
 <!-- form-->
<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Contacto Vivienda Total</h2>
                    <form method="POST" action="guardar_registro.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Nombre del Ejecutivo" name="nombre_ejecutivo" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Apellido del ejecutivo" name="apellido_ejecutivo" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Nombre del cliente" name="nombre_cliente" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Apellido del cliente" name="apellido_cliente" apellido_cliente" name="apellido_cliente" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="tipo_documento" required>
                                            <option disabled="disabled" selected="selected">Tipo de documento</option>
                                            <option>Cedula</option>
                                            <option>Cedula de extranjeria</option>
                                            <option>Pasaporte</option>
                                            <option>Otro</option>
                                        </select>
                                        <div class="select-dropdown">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Número de documento" name="numero_documento" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Línea de Crédito" name="linea_credito" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="number" placeholder="Monto del Crédito" name="monto_credito" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Teléfono" name="telefono" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Correo" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn-primary btn--blue btn-lg" type="submit">VOLVER</button>
                            <button class="btn btn-secondary btn--green btn-lg" type="submit">ENVIAR</button>
                            <!-- Agrega el siguiente botón a tu formulario -->
                            <form method="POST" action="descargar_datos.php">
  <button type="submit" class="btn btn-primary btn--red btn-lg" onclick="window.location.href='descargar_datos.php'">Descargar Datos</button>
</form>

                           


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <!-- Popup -->

    <script>
        function showPopup() {
            document.getElementById("popup").style.display = "block";
        }

        function hidePopup() {
            document.getElementById("popup").style.display = "none";
        }

        function openNewWindow() {
            var form = document.forms[0];
            var url = form.action;
            var data = new FormData(form);
            var newWindow = window.open(url, "_blank");
            newWindow.onload = function() {
                newWindow.document.getElementById("nombre_ejecutivo").value = data.get("nombre_ejecutivo");
                newWindow.document.getElementById("apellido_ejecutivo").value = data.get("apellido_ejecutivo");
                newWindow.document.getElementById("nombre_cliente").value = data.get("nombre_cliente");
                newWindow.document.getElementById("tipo_documento").value = data.get("tipo_documento");
                newWindow.document.getElementById("apellido_cliente").value = data.get("apellido_cliente");
                newWindow.document.getElementById("linea_credito").value = data.get("linea_credito");
                newWindow.document.getElementById("numero_documento").value = data.get("numero_documento");
                newWindow.document.getElementById("telefono").value = data.get("telefono");
                newWindow.document.getElementById("monto_credito").value = data.get("monto_credito");
                newWindow.document.getElementById("email").value = data.get("email");
            };
        }
    </script>

</body>

</html>

