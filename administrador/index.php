<?php
session_start();

if ($_POST) {
    if (($_POST['usuario']=="admin")&&($_POST['contra']=="sistema")) {
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="admin";
        header('Location: inicio.php');
    } else {
        $aviso="Usuario o contraseña incorrecto";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Inicio</title>
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
                <a class="navbar-brand d-block mx-auto" href="#">
                    <img src="../logoP.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                </a>
                <!-- Agrega el atributo data-bs-toggle y data-bs-target para el botón del navbar -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" 
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/" ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/nosotros.php" ?>">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/productos.php" ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url . "/contacto.php" ?>">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./">Login</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <!-- FIN NAV DIFERENTE -->
<div class="contenedor-titulo">
<h1 class="titulo-top">Solo Personal Autorizado</h1>
</div>



<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-7 d-block mx-auto my-3">

            <div class="card">
                <div class="card-header">
                <h3 class="text-center mb-1">Login</h3>
                </div>

                <!-- BODY CON LOGIN -->

         <?php if(isset($aviso)){ ?>
            <div class="card-body">
            <div class="alert alert-danger" role="alert">
                <strong><?php echo $aviso; ?></strong>
            </div>

         <?php } ?>
                

                    <form method="POST" class="container mx-auto" id="loginForm">
                        

                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="username" name="usuario" placeholder="Introduce tu usuario" required                         style="outline: none; /* Elimina el contorno predeterminado */
                        box-shadow: none; /* Elimina el efecto de sombra */
                        border-color: #68145218; /* Cambia el color del borde a rojo */">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="contra" placeholder="Introduce tu contraseña" required                         style="outline: none; /* Elimina el contorno predeterminado */
                        box-shadow: none; /* Elimina el efecto de sombra */
                        border-color: #68145218; /* Cambia el color del borde a rojo */">
                        </div>

                        <button type="submit" class="btn w-100 my-2" id="submitButton" style="background-color: #6814524c; padding: 10px 20px; border-radius: 10px; color: white; text-decoration: none;" onmouseover="this.style.backgroundColor='#66656585';" onmouseout="this.style.backgroundColor='#6814524c';">Entrar</button>
                    </form>

                </div>

                <!-- FIN BODY CON LOGIN -->

            </div>
        </div>


    </div>
</div>


<?php include("../template/pie.php"); ?>