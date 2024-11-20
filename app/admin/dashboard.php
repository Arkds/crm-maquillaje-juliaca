<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['rol'] != 'Administrador') {
    // Redirigir a la página de login si el usuario no está autenticado o no es administrador
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "belleza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Procesar el formulario para agregar empleado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addEmployee'])) {
    $newUsername = trim($_POST['newUsername']);
    $newPassword = trim($_POST['newPassword']);
    $newEmail = trim($_POST['newEmail']);
    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Empleados (username, password, correo, rol) VALUES (?, ?, ?, 'Empleado')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $newUsername, $hashed_password, $newEmail);

    if ($stmt->execute()) {
        $success_message = "Empleado agregado exitosamente.";
    } else {
        $error_message = "Error al agregar el empleado. Por favor, intenta de nuevo.";
    }

    $stmt->close();
}

$conn->close();
?>

<?php include('encabezado.php'); ?>



    <!-- Contenido principal -->
    <main role="main" class="container-fluid" style="margin-top: 20px;">
        <h2>Bienvenido, <?php echo $_SESSION['username']; ?> (Administrador)</h2>
        <hr>

        <?php if (isset($success_message)): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <h4>Agregar Empleado</h4>
        <form action="dashboard.php" method="post">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="mb-3">
                <label for="newEmail" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="newEmail" name="newEmail" required>
            </div>
            <button type="submit" name="addEmployee" class="btn btn-primary">Agregar Empleado</button>
        </form>
    </main>
</div>

<?php include('pie.php'); ?>
