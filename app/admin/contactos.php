<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once "encabezado.php";
include_once "funciones.php";

// Si hay una solicitud para eliminar un contacto
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    eliminarContacto($id);
   
}

// Si se ha enviado el formulario para convertir un contacto en cita
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contacto_id'])) {
    $contacto_id = $_POST['contacto_id'];
    $empleado_id = $_POST['empleado_id'];
    $fecha_cita = $_POST['fecha_cita'];

    // Llamar a la función para crear la cita
    $resultado = programarCita($contacto_id, $empleado_id, $fecha_cita);

    
}

$contactos = obtenerContactos();
$empleados = obtenerEmpleados(); // Asegurarse de tener empleados disponibles para seleccionar en el modal
?>

<div class="container mt-4">
    <h1>Contactos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Numero</th>
                <th>Servicio Solicitado</th>
                <th>Mensaje</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
            <tr>
                <td><?php echo htmlspecialchars($contacto->nombre); ?></td>
                <td><?php echo htmlspecialchars($contacto->correo); ?></td>
                <td><?php echo htmlspecialchars($contacto->numero); ?></td>
                <td><?php echo htmlspecialchars($contacto->nombre_servicio); ?></td>
                <td><?php echo htmlspecialchars($contacto->mensaje); ?></td>
                <td><?php echo htmlspecialchars($contacto->estado); ?></td>
                <td>
                    <?php if ($contacto->estado == 'Pendiente'): ?>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#convertirCitaModal<?php echo $contacto->contacto_id; ?>">Convertir a Cita</button>
                    <?php endif; ?>
                    <a href="contactos.php?eliminar=<?php echo $contacto->contacto_id; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <!-- Modal para convertir contacto en cita -->
            <div class="modal fade" id="convertirCitaModal<?php echo $contacto->contacto_id; ?>" tabindex="-1" aria-labelledby="convertirCitaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="contactos.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Programar Cita</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="contacto_id" value="<?php echo $contacto->contacto_id; ?>">
                                <div class="mb-3">
                                    <label for="empleado_id" class="form-label">Asignar Empleado</label>
                                    <select class="form-select" name="empleado_id" required>
                                        <?php foreach ($empleados as $empleado): ?>
                                            <option value="<?php echo $empleado->empleado_id; ?>"><?php echo htmlspecialchars($empleado->nombre); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_cita" class="form-label">Fecha de Cita</label>
                                    <input type="datetime-local" class="form-control" name="fecha_cita" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Programar Cita</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once "pie.php"; ?>
