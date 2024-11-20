<?php
function obtenerConexion() {
    $servername = "localhost";
    $username = "root"; // tu usuario de base de datos
    $password = ""; // tu contraseña de base de datos
    $dbname = "belleza"; // nombre de tu base de datos

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
// Obtener todos los empleados
function obtenerEmpleados() {
    $conn = obtenerConexion();
    $sql = "SELECT * FROM Empleados";
    $resultado = $conn->query($sql);

    $empleados = [];
    while ($fila = $resultado->fetch_object()) {
        $empleados[] = $fila;
    }

    $conn->close();
    return $empleados;
}
// Obtener una cita por ID
function obtenerCitaPorId($id) {
    $conn = obtenerConexion();
    $sql = "SELECT * FROM Citas WHERE cita_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $cita = $resultado->fetch_object();

    $stmt->close();
    $conn->close();
    return $cita;
}
// Obtener todas las citas
function obtenerCitas() {
    $conn = obtenerConexion();
    $sql = "SELECT c.cita_id, c.fecha_cita, c.estado, e.nombre AS nombre_empleado, cont.nombre AS nombre_cliente 
            FROM Citas c
            JOIN Empleados e ON c.empleado_id = e.empleado_id
            JOIN Contactos cont ON c.contacto_id = cont.contacto_id";
    $resultado = $conn->query($sql);

    $citas = [];
    while ($fila = $resultado->fetch_object()) {
        $citas[] = $fila;
    }

    $conn->close();
    return $citas;
}
// Obtener todas las reseñas
function obtenerReseñas() {
    $conn = obtenerConexion();
    $sql = "SELECT r.*, c.fecha_cita, cont.nombre AS nombre_cliente 
            FROM Reseñas r
            JOIN Citas c ON r.cita_id = c.cita_id
            JOIN Contactos cont ON c.contacto_id = cont.contacto_id";
    $resultado = $conn->query($sql);

    $reseñas = [];
    while ($fila = $resultado->fetch_object()) {
        $reseñas[] = $fila;
    }

    $conn->close();
    return $reseñas;
}
function agregarEmpleado($nombre, $username, $correo, $password, $rol) {
    $conn = obtenerConexion();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Empleados (nombre, username, correo, password, rol) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $username, $correo, $hashed_password, $rol);
    $resultado = $stmt->execute();

    $stmt->close();
    $conn->close();
    return $resultado;
}
// Editar empleado existente
function editarEmpleado($id, $nombre, $correo, $rol) {
    $conn = obtenerConexion();
    $sql = "UPDATE Empleados SET nombre = ?, correo = ?, rol = ? WHERE empleado_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $correo, $rol, $id);
    $resultado = $stmt->execute();

    $stmt->close();
    $conn->close();
    return $resultado;
}
// Editar cita existente
function editarCita($id, $fecha_cita,  $estado) {
    $conn = obtenerConexion();
    $sql = "UPDATE citas SET fecha_cita = ?, estado = ? WHERE cita_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $fecha_cita,  $estado, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Eliminar empleado
function eliminarEmpleado($empleado_id) {
    $conn = obtenerConexion();

    // Verificar si el empleado está asignado a alguna cita
    $check_sql = "SELECT COUNT(*) AS asignaciones FROM Citas WHERE empleado_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $empleado_id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    $row = $result->fetch_assoc();

    if ($row['asignaciones'] > 0) {
        // El empleado está asignado a una cita, no puede ser eliminado
        $stmt_check->close();
        $conn->close();
        return false;
    }

    // Proceder con la eliminación si no hay citas asignadas
    $stmt_check->close();
    $sql = "DELETE FROM Empleados WHERE empleado_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $empleado_id);
    $resultado = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $resultado;
}

// Eliminar cita
function eliminarCita($id) {
    $conn = obtenerConexion();
    $sql = "DELETE FROM Citas WHERE cita_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $resultado = $stmt->execute();

    $stmt->close();
    $conn->close();
    return $resultado;
}
// Agregar un nuevo contacto a la base de datos
function agregarContacto($nombre, $correo, $numero, $mensaje, $servicio) {
    $conn = obtenerConexion();
    $sql = "INSERT INTO Contactos (nombre, correo, $numero mensaje, servicio_solicitado) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Mostrar error si hay un problema con la preparación de la consulta
        echo "Error en la preparación: " . $conn->error;
        return false;
    }

    $stmt->bind_param("sssi", $nombre, $correo, $numero, $mensaje, $servicio);
    $resultado = $stmt->execute();

    if (!$resultado) {
        // Mostrar error específico si la ejecución falla
        echo "Error en la ejecución: " . $stmt->error;
        return false;
    }

    $stmt->close();
    $conn->close();
    return $resultado;
}





function obtenerContactos() {
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "belleza"; 
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT c.contacto_id, c.nombre, c.correo,c.numero, c.mensaje, s.nombre AS nombre_servicio, c.estado 
            FROM contactos c
            LEFT JOIN servicios s ON c.servicio_solicitado = s.servicio_id";
    $result = $conn->query($sql);

    $contactos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $contactos[] = $row;
        }
    }

    $conn->close();
    return $contactos;
}


function eliminarContacto($contacto_id) {
    $conn = obtenerConexion();
    $sql = "DELETE FROM contactos WHERE contacto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $contacto_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
function programarCita($contacto_id, $empleado_id, $fecha_cita) {
    $conn = obtenerConexion();
    $sql = "INSERT INTO Citas (contacto_id, empleado_id, fecha_cita, estado) VALUES (?, ?, ?, 'Programada')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $contacto_id, $empleado_id, $fecha_cita);
    $resultado = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $resultado;
}

?>


