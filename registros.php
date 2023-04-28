<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}

// Realizar la conexión a la base de datos (cambia los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contactovt";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los registros de la tabla clientes
$query = "SELECT * FROM clientes";
$result = $conn->query($query);

$registros = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $registros[] = $row;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registros anteriores</title>
</head>

<body>
  <h2>Registros anteriores</h2>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Tipo de documento</th>
      <th>Número de documento</th>
      <th>Línea de crédito</th>
      <th>Monto de crédito</th>
      <th>Teléfono</th>
      <th>Email</th>
    </tr>
    <?php foreach ($registros as $registro) { ?>
      <tr>
        <td><?php echo $registro['nombre']; ?></td>
        <td><?php echo $registro['tipo_documento']; ?></td>
        <td><?php echo $registro['numero_documento']; ?></td>
        <td><?php echo $registro['linea_credito']; ?></td>
        <td><?php echo $registro['monto_credito']; ?></td>
        <td><?php echo $registro['telefono']; ?></td>
        <td><?php echo $registro['email']; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>