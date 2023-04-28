<?php
// Verificar si se han enviado todos los datos
if (isset($_POST['nombre_ejecutivo'], $_POST['apellido_ejecutivo'], $_POST['nombre_cliente'], $_POST['apellido_cliente'], $_POST['tipo_documento'], $_POST['numero_documento'], $_POST['linea_credito'], $_POST['monto_credito'], $_POST['telefono'], $_POST['email'])) {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_datos = 'contactovt';

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
    }

    // Escapar los datos para evitar inyección de SQL
    $nombre_ejecutivo = mysqli_real_escape_string($conexion, $_POST['nombre_ejecutivo']);
    $apellido_ejecutivo = mysqli_real_escape_string($conexion, $_POST['apellido_ejecutivo']);
    $nombre_cliente = mysqli_real_escape_string($conexion, $_POST['nombre_cliente']);
    $apellido_cliente = mysqli_real_escape_string($conexion, $_POST['apellido_cliente']);
    $tipo_documento = mysqli_real_escape_string($conexion, $_POST['tipo_documento']);
    $numero_documento = mysqli_real_escape_string($conexion, $_POST['numero_documento']);
    $linea_credito = mysqli_real_escape_string($conexion, $_POST['linea_credito']);
    $monto_credito = mysqli_real_escape_string($conexion, $_POST['monto_credito']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);

    // Verificar si ya existe un registro con el número de documento proporcionado
    $consulta_existencia = "SELECT * FROM tabla_clientes WHERE numero_documento = '$numero_documento'";
    $resultado_existencia = mysqli_query($conexion, $consulta_existencia);

    if (mysqli_num_rows($resultado_existencia) > 0) {
        // Cerrar la conexión
        mysqli_close($conexion);

        // Mostrar el pop-up indicando que ya existe el registro y redireccionar al index
        echo "<script>
                alert('Ya existe un registro con el número de documento proporcionado.');
                window.location.href = 'index.php';
              </script>";
    } else {
        // Crear la consulta SQL para insertar los datos en la tabla
        $consulta = "INSERT INTO tabla_clientes (nombre_ejecutivo, apellido_ejecutivo, nombre_cliente, apellido_cliente, tipo_documento, numero_documento, linea_credito, monto_credito, telefono, email) 
                VALUES ('$nombre_ejecutivo', '$apellido_ejecutivo', '$nombre_cliente', '$apellido_cliente', '$tipo_documento', '$numero_documento', '$linea_credito', '$monto_credito', '$telefono', '$email')";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $consulta)) {
            // Cerrar la conexión
            mysqli_close($conexion);

            // Mostrar el pop-up indicando que los datos se han guardado correctamente y pedir confirmación para abrir la página del banco
            echo "<script>
                    var confirmacion = confirm('Los datos se han guardado correctamente. ¿Deseas continuar?');
                    if (confirmacion) {
                        var newWindow = window.open('https://www.linkedin.com/in/richard-madera/', '_blank');
                        newWindow.focus();
                        }
                        window.location.href = 'index.php';
                        </script>";
        } else {
            // Cerrar la conexión
            mysqli_close($conexion);
            // Mostrar el pop-up indicando el error al guardar los datos y redireccionar al index
            echo "<script>
        alert('Error al guardar los datos: " . mysqli_error($conexion) . "');
        window.location.href = 'index.php';
      </script>";
        }
    }
} else {
    // Mostrar el pop-up indicando que todos los campos son obligatorios y redireccionar al index
    echo "<script>
            alert('Todos los campos son obligatorios.');
            window.location.href = 'index.php';
          </script>";
}
