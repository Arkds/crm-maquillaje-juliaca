<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once "encabezado.php";
include_once "funciones.php";

$reseñas = obtenerReseñas();
?>

<div class="container mt-4">
    <h1>Reseñas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha de Cita</th>
                <th>Puntuación</th>
                <th>Comentarios</th>
                <th>Fecha Reseña</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reseñas as $reseña): ?>
            <tr>
                <td><?php echo htmlspecialchars($reseña->nombre_cliente); ?></td>
                <td><?php echo htmlspecialchars($reseña->fecha_cita); ?></td>
                <td><?php echo htmlspecialchars($reseña->puntuacion); ?></td>
                <td><?php echo htmlspecialchars($reseña->comentarios); ?></td>
                <td><?php echo htmlspecialchars($reseña->fecha_reseña); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once "pie.php"; ?>
