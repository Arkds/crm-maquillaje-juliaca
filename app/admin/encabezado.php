<?php

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CRM">
    <title>CRM - Gestión de Estudio de Maquillaje</title>
    <!-- Cargar el CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Cargar iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" type="text/css">
    <!-- Cargar estilos propios -->
    <link href="../estilos.css" rel="stylesheet">
    <!-- Cargar scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Barra de navegación arriba -->
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #9bdbdb;">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="./iconr.png" alt="logo " style="width: 120px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="info.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenedor principal -->
    <div class="d-flex">
        <!-- Barra de navegación en el costado para pantallas grandes -->
        <nav class="vh-100 d-none d-md-block" style="width: 250px; background-color: #9bdbdb;">
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action text-white" href="dashboard.php "  style="background-color: #9bdbcc;">
                    <span class="mdi mdi-desktop-mac-dashboard"></span> Dashboard
                </a>
                <a class="list-group-item list-group-item-action text-white" href="empleados.php"  style="background-color: #9bdbcc;">
                    <span class="mdi mdi-account-multiple"></span> Empleados
                </a>
                <a class="list-group-item list-group-item-action text-white" href="contactos.php"  style="background-color: #9bdbcc;">
                    <span class="mdi mdi-email"></span> Contactos
                </a>
                <a class="list-group-item list-group-item-action text-white" href="citas.php"  style="background-color: #9bdbcc;">
                    <span class="mdi mdi-calendar"></span> Citas
                </a>
                <a class="list-group-item list-group-item-action text-white" href="reseñas.php"  style="background-color: #9bdbcc;">
                    <span class="mdi mdi-star"></span> Reseñas
                </a>
            </div>
        </nav>

        <!-- Barra de navegación en el costado para pantallas pequeñas -->
        <nav class="navbar navbar-expand-md navbar-dark  d-md-none " style="background-color: #9bdbdb;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="sidebarNav">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action  text-white" href="dashboard.php" style="background-color: #9bdbcc;" >
                            <span class="mdi mdi-desktop-mac-dashboard"></span> Dashboard
                        </a>
                        <a class="list-group-item list-group-item-action  text-white" href="empleados.php" style="background-color: #9bdbcc;" >
                            <span class="mdi mdi-account-multiple"></span> Empleados
                        </a>
                        <a class="list-group-item list-group-item-action text-white" href="contactos.php" style="background-color: #9bdbcc;">
                            <span class="mdi mdi-email"></span> Contactos
                        </a>
                        <a class="list-group-item list-group-item-action text-white" href="citas.php" style="background-color: #9bdbcc;" >
                            <span class="mdi mdi-calendar"></span> Citas
                        </a>
                        <a class="list-group-item list-group-item-action text-white" href="reseñas.php" style="background-color: #9bdbcc;">
                            <span class="mdi mdi-star"></span> Reseñas
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main role="main" class="container-fluid" style="margin-top: 20px;">
            <!-- Aquí va el contenido de tu página -->
