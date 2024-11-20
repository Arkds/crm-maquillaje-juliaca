<?php
include_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contacto_id = intval($_POST['contacto_id']);
    $empleado_id = intval($_POST['empleado_id']);
    $fecha_cita = $_POST['fecha_cita'];

    if (convertirA_Cita($contacto_id, $empleado_id, $fecha_cita)) {
        header("Location: citas.php");
    } else {
        echo "Error al convertir el contacto en cita.";
    }
}
?>
