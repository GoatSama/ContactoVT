<?php
// Conectar a la base de datos (reemplaza los valores con los de tu configuración)
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_datos = 'contactovt';

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

// Consulta para obtener los datos de la tabla
$consulta = "SELECT * FROM tabla_clientes";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die('Error al obtener los datos: ' . mysqli_error($conexion));
}

// Nombre del archivo CSV
$nombreArchivo = 'datos_clientes.csv';

// Abrir el archivo CSV en modo escritura
$archivoCSV = fopen($nombreArchivo, 'w');

// Escribir la cabecera del archivo CSV con BOM (Byte Order Mark) para que sea compatible con Excel 365
$cabecera = "\xEF\xBB\xBFNombre Ejecutivo,Apellido Ejecutivo,Nombre Cliente,Apellido Cliente,Tipo Documento,Número Documento,Línea de Crédito,Monto Crédito,Teléfono,Correo\n";
fwrite($archivoCSV, $cabecera);

// Escribir los datos de los clientes en el archivo CSV
while ($fila = mysqli_fetch_assoc($resultado)) {
    $linea = $fila['nombre_ejecutivo'] . "," . $fila['apellido_ejecutivo'] . "," . $fila['nombre_cliente'] . "," . $fila['apellido_cliente'] . "," . $fila['tipo_documento'] . "," . $fila['numero_documento'] . "," . $fila['linea_credito'] . "," . $fila['monto_credito'] . "," . $fila['telefono'] . "," . $fila['email'] . "\n";
    fwrite($archivoCSV, $linea);
}

// Cerrar el archivo CSV
fclose($archivoCSV);

// Descargar el archivo CSV generado
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=' . $nombreArchivo);
header('Pragma: no-cache');
readfile($nombreArchivo);
unlink($nombreArchivo); // Eliminar el archivo después de ser descargado

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
