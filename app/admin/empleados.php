<?php

ob_start();
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 'Administrador') {
    header("Location: login.php");
    exit();
}

include_once "encabezado.php";
include_once "funciones.php";

$empleados = obtenerEmpleados();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['empleado_id'])) {
    $empleado_id = $_POST['empleado_id'];
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $rol = trim($_POST['rol']);

    // Llamar a la función para editar el empleado
    $resultado = editarEmpleado($empleado_id, $nombre, $correo, $rol);

    if ($resultado) {
        // Redirigir a la misma página para reflejar los cambios
        header("Location: empleados.php");
        exit();
    } else {
        echo "Error al actualizar el empleado. Por favor, intenta de nuevo.";
    }
}
ob_end_flush();




include_once "encabezado.php";
include_once "funciones.php";

// Procesar la adición de un nuevo empleado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
    $nombre = trim($_POST['nombre']);
    $username = trim($_POST['username']);
    $correo = trim($_POST['correo']);
    $rol = trim($_POST['rol']);
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $resultado = agregarEmpleado($nombre, $username, $correo, $hashed_password, $rol);

    
}

// Procesar la edición de un empleado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'editar') {
    $empleado_id = $_POST['empleado_id'];
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $rol = trim($_POST['rol']);

    $resultado = editarEmpleado($empleado_id, $nombre, $correo, $rol);

    if ($resultado) {
        header("Location: empleados.php");
        exit();
    } else {
        echo "Error al actualizar el empleado. Por favor, intenta de nuevo.";
    }
}

// Procesar la eliminación de un empleado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
    $empleado_id = $_GET['id'];
    $resultado = eliminarEmpleado($empleado_id);
}
// Muestra un mensaje de alerta si la eliminación falla
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
    $empleado_id = $_GET['id'];
    $resultado = eliminarEmpleado($empleado_id);

    if (!$resultado) {
        // No se pudo eliminar porque el empleado está asignado a una cita
        $mensaje_error = "No se puede eliminar el empleado porque está asignado a una cita.";
    } else {
        header("Location: empleados.php");
        exit();
    }
}
$empleados = obtenerEmpleados();
?>

<div class="container mt-4">
    <h1>Empleados</h1>
    <?php if ($mensaje_error): ?>
        <div class="alert alert-danger">
            <?php echo $mensaje_error; ?>
        </div>
    <?php endif; ?>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#agregarEmpleadoModal">Agregar Empleado</button>

    <!-- Tabla de empleados -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?php echo htmlspecialchars($empleado->nombre); ?></td>
                    <td><?php echo htmlspecialchars($empleado->username); ?></td>
                    <td><?php echo htmlspecialchars($empleado->correo); ?></td>
                    <td><?php echo htmlspecialchars($empleado->rol); ?></td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarEmpleadoModal<?php echo $empleado->empleado_id; ?>">Editar</button>
                        <a href="empleados.php?accion=eliminar&id=<?php echo $empleado->empleado_id; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <!-- Modal para editar empleado -->
            <div class="modal fade" id="editarEmpleadoModal<?php echo $empleado->empleado_id; ?>" tabindex="-1" aria-labelledby="editarEmpleadoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="empleados.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Empleado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="empleado_id" value="<?php echo $empleado->empleado_id; ?>">
                                <input type="hidden" name="accion" value="editar">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($empleado->nombre); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="correo" value="<?php echo htmlspecialchars($empleado->correo); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rol" class="form-label">Rol</label>
                                    <select class="form-select" name="rol">
                                        <option <?php echo ($empleado->rol == 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                                        <option <?php echo ($empleado->rol == 'Empleado') ? 'selected' : ''; ?>>Empleado</option>
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

<!-- Modal para agregar empleado -->
<div class="modal fade" id="agregarEmpleadoModal" tabindex="-1" aria-labelledby="agregarEmpleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="empleados.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="accion" value="agregar">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" name="rol">
                            <option>Administrador</option>
                            <option>Empleado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once "pie.php"; ?>
