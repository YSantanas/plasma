<?php
// Iniciar la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: inicio.php');
    exit(); // Terminar el script para evitar que se procese más código innecesario
}

// Obtener el nombre de usuario de la sesión
$nickUsuario = isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : '';

?>


<!doctype html>
<html lang="en">

<head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- NAV DIFERENTE -->
    <header>

    <!-- Código PHP para la redirección -->

    <?php
    $url = "http://" . $_SERVER['HTTP_HOST'] . "/sitioweb" ?>

    <!-- FIN Código PHP para la redirección -->
        <nav class="navbar navbar-expand-lg mb-5"> <!-- Cambia la clase bg-primary por bg-light -->
            <div class="container-fluid">
                <a class="navbar-brand d-block mx-auto" href="../index.php">
                    <img src="../logoP1.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                </a>
                <!-- Agrega el atributo data-bs-toggle y data-bs-target para el botón del navbar -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/administrador/inicio.php" ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/administrador/seccion/productos.php" ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/administrador/seccion/cerrar.php" ?>">Salir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../">Sitio</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <!-- FIN NAV DIFERENTE -->