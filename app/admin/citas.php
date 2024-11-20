<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once "encabezado.php";
include_once "funciones.php";

// Procesar edición de cita
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'editar') {
    $cita_id = $_POST['cita_id'];
    $fecha_cita = $_POST['fecha_cita'];

    $estado = $_POST['estado'];

    // Llamar a la función para actualizar la cita en la base de datos
    editarCita($cita_id, $fecha_cita, $estado);

    // Redirigir a citas.php para reflejar los cambios
    header("Location: citas.php");
    exit();
}

// Procesar eliminación de cita
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $cita_id = $_GET['eliminar'];
    eliminarCita($cita_id);
    
   
}

$citas = obtenerCitas();
?>

<div class="container mt-4">
    <h1>Citas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
               
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citas as $cita): ?>
            <tr>
                <td><?php echo htmlspecialchars($cita->fecha_cita); ?></td>
                
                <td><?php echo htmlspecialchars($cita->nombre_cliente); ?></td>
                <td><?php echo htmlspecialchars($cita->nombre_empleado); ?></td>
                <td><?php echo htmlspecialchars($cita->estado); ?></td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarCitaModal<?php echo $cita->cita_id; ?>">Editar</button>
                    <a href="citas.php?eliminar=<?php echo $cita->cita_id; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta cita?');">Eliminar</a>
                </td>
            </tr>
            <!-- Modal para editar cita -->
            <div class="modal fade" id="editarCitaModal<?php echo $cita->cita_id; ?>" tabindex="-1" aria-labelledby="editarCitaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="citas.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Cita</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="accion" value="editar">
                                <input type="hidden" name="cita_id" value="<?php echo $cita->cita_id; ?>">
                                <div class="mb-3">
                                    <label for="fecha_cita" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" name="fecha_cita" value="<?php echo htmlspecialchars($cita->fecha_cita); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="hora_cita" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name="hora_cita" value="<?php echo htmlspecialchars($cita->hora_cita); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <option <?php echo ($cita->estado == 'Programada') ? 'selected' : ''; ?>>Programada</option>
                                        <option <?php echo ($cita->estado == 'Completada') ? 'selected' : ''; ?>>Completada</option>
                                        <option <?php echo ($cita->estado == 'Cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
