<?php
$servername = "localhost";
$username = "root"; // Ajusta tu usuario de base de datos
$password = ""; // Ajusta tu contraseña de base de datos
$dbname = "belleza"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar que los datos se han enviado correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar los datos recibidos
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $numero = filter_var($_POST['numero'], FILTER_SANITIZE_STRING);
    $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
    $servicio_solicitado = filter_var($_POST['servicio'], FILTER_SANITIZE_STRING);

    // Verificar si los campos son válidos
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit();
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO contactos (nombre, correo, numero, mensaje, servicio_solicitado) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        echo "Error al preparar la consulta: " . $conn->error;
        exit();
    }

    // Enlazar los parámetros y ejecutar la consulta
    $stmt->bind_param("sssss", $nombre, $correo, $numero, $mensaje, $servicio_solicitado);

    if ($stmt->execute()) {
        echo "¡Contacto guardado correctamente!";
        // Redirigir después de la inserción
        header("Location: index.php#contacto");
        exit(); // Detener la ejecución después de la redirección
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
