<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 'Administrador') {
    header("Location: login.php");
    exit();
}

include_once "funciones.php";

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $username = trim($_POST['username']);
    $correo = trim($_POST['correo']);
    $rol = trim($_POST['rol']);
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Llamar a la función para agregar el empleado
    $resultado = agregarEmpleado($nombre, $username, $correo, $rol, $hashed_password);

    if ($resultado) {
        // Redirigir a la página de empleados si la inserción fue exitosa
        header("Location: empleados.php");
        exit();
    } else {
        echo "Error al agregar el empleado. Por favor, intenta de nuevo.";
    }
}
?>
