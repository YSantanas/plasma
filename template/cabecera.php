<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisma</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />

</head>
<body class="d-flex flex-column min-vh-100">
<header>

<nav class="navbar navbar-expand-lg mb-5"> <!-- Cambia la clase bg-primary por bg-light -->
  <div class="container-fluid">
  <a class="navbar-brand d-block mx-auto" href="#">
      <img src="logoP1.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
    </a>
    <!-- Agrega el atributo data-bs-toggle y data-bs-target para el botón del navbar -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Inicio
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nosotros.php">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos.php">Productos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="administrador/">Login</a>
        </li>


      </ul>

    </div>
  </div>
</nav>

</header>

 <!-- Carrusel en HTML Y CSS -->

 <div class="carrusel-nuevo">
    <!-- imagen 1 -->
    <ul>
      <li>
        <img src="./img/plasma/mod2.png" class="d-block w-100" alt="...">
        <div class="texto-carrousel">
          <h2> Imagen 1</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>

        </div>

      </li>
      <!-- imagen 2 -->
      <li>
        <img src="./img/plasma/mod3.png" class="d-block w-100" alt="...">
        <div class="texto-carrousel">
          <h2> Imagen 2</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>

        </div>
        <!--  imagen 3-->
      </li>
      <li>
        <img src="./img/plasma/mod2.png" class="d-block w-100" alt="...">
        <div class="texto-carrousel">
          <h2> Imagen 3</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>

        </div>

      </li>
    </ul>

  </div>

  <!--FIN Carrusel en HTML Y CSS -->


