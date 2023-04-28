<?php
// Verificar si se han enviado los datos de inicio de sesión
if (isset($_POST['usuario'], $_POST['contrasena'])) {
    // Comprobar si el usuario y la contraseña son válidos (aquí debes implementar tu propia lógica de autenticación)
    $usuario_valido = false;  // Variable para verificar el usuario válido (reemplaza con tu lógica de autenticación)

    if ($usuario_valido) {
        // Iniciar sesión y redirigir al formulario de registro
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: index.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Todos los campos son obligatorios.";
}
