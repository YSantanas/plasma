   <!-- INICIO DEL HTML -->
   <!doctype html>
   <html lang="en">

   <head>
       <title>Administrador</title>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

       <link rel="stylesheet" href="../css/styles.css">
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>

   <body>

       <!-- NAV DIFERENTE -->
       <header>

           <!-- Código PHP para la redirección -->

           <?php
            $url = "http://" . $_SERVER['HTTP_HOST']. "/sitioweb" ?>

           <!-- FIN Código PHP para la redirección -->
           <nav class="navbar navbar-expand-lg mb-5"> <!-- Cambia la clase bg-primary por bg-light -->
               <div class="container-fluid">
                   <a class="navbar-brand d-block mx-auto" href="../index.php">
                       <img src="../../logoP.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
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

       <!-- Código PHP -->

       <?php
        //print_r($_POST);
        $txtId = isset($_POST['txtId']) ? $_POST['txtId'] : "";
        $txtTitle = isset($_POST['txtTitle']) ? $_POST['txtTitle'] : "";
        $txtImage = isset($_FILES['txtImage']['name']) ? $_FILES['txtImage']['name'] : "";
        $seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : "";


        //Conexión con la BD para pruebas

        include("../config/bd.php");

        //FIN de Conexión con la BD



        switch ($seleccion) {

            case "Agregar":

                $sentencia = $conexion->prepare("INSERT INTO productos (titulo, img) VALUES (:titulo, :img);");
                $sentencia->bindParam(':titulo', $txtTitle);

                $tiempo = new DateTime();
                $nombreImg = ($txtImage != "") ? $tiempo->getTimestamp() . "_" . $_FILES["txtImage"]["name"] : "image.jpg";
                // si se tiene un archivo se renombra con  la fecha + nombre del archivo y sino image.jpg

                $temporalImg = $_FILES["txtImage"]["tmp_name"];

                if ($temporalImg != "") {
                    //si es diferete a vacio movemos la imagen a la direccion
                    move_uploaded_file($temporalImg, "../../img/" . $nombreImg);
                }
                $sentencia->bindParam(':img', $nombreImg);
                $sentencia->execute();
                //redirigimos a pdroductos
                header("Location:productos.php");
                break;

            case "Modificar":
                $sentencia = $conexion->prepare("UPDATE productos SET titulo=:titulo WHERE id=:id"); //selecciona los poductos cuando el id...
                $sentencia->bindParam(':titulo', $txtTitle);
                $sentencia->bindParam(':id', $txtId);
                $sentencia->execute();

                if ($txtImage != "") {

                    //si la imagen existe recupera el nombre
                    $tiempo = new DateTime();
                    $nombreImg = ($txtImage != "") ? $tiempo->getTimestamp() . "_" . $_FILES["txtImage"]["name"] : "image.jpg";
                    // si se tiene un archivo se renombra con  la fecha + nombre del archivo y sino image.jpg

                    $temporalImg = $_FILES["txtImage"]["tmp_name"];
                    move_uploaded_file($temporalImg, "../../img/" . $nombreImg);


                    $sentencia = $conexion->prepare("SELECT img FROM productos WHERE id=:id"); //selecciona los poductos cuando el id...
                    $sentencia->bindParam(':id', $txtId);
                    $sentencia->execute();
                    $producto = $sentencia->fetch(PDO::FETCH_LAZY); //  Cargar los datos

                    //PRIMERO SE BORRA

                    if (isset($producto["img"]) && ($producto["img"] != "imagen.jpg")) {
                        //si existe y es diferente de imagen.jpg

                        if (file_exists("../../img/" . $producto["img"])) {
                            //SI existe lo borramos
                            unlink("../../img/" . $producto["img"]);
                        }
                    }


                    // Y LUEGO SE ACTUALIZA

                    $sentencia = $conexion->prepare("UPDATE productos SET img=:img WHERE id=:id"); //selecciona los poductos cuando el id...
                    $sentencia->bindParam(':img', $nombreImg);
                    $sentencia->bindParam(':id', $txtId);
                    $sentencia->execute();
                }
                //redirigimos a productos
                header("Location:productos.php");
                break;

            case "Cancelar":

                //unicamente redirigimos a pdroductos
                header("Location:productos.php");

                break;

            case "Cambiar":
                $sentencia = $conexion->prepare("SELECT * FROM productos WHERE id=:id");
                $sentencia->bindParam(':id', $txtId);
                $sentencia->execute();
                $producto = $sentencia->fetch(PDO::FETCH_LAZY);
                $txtTitle = $producto['titulo'];
                $txtImage = $producto['img'];

                break;


            case "Borrar":

                $sentencia = $conexion->prepare("SELECT img FROM productos WHERE id=:id"); //selecciona los poductos cuando el id...
                $sentencia->bindParam(':id', $txtId);
                $sentencia->execute();
                $producto = $sentencia->fetch(PDO::FETCH_LAZY); //  Cargar los datos


                if (isset($producto["img"]) && ($producto["img"] != "imagen.jpg")) {
                    //si existe y es diferente de imagen.jpg

                    if (file_exists("../../img/" . $producto["img"])) {
                        //SI existe lo borramos
                        unlink("../../img/" . $producto["img"]);
                    }
                }

                $sentencia = $conexion->prepare("DELETE FROM productos WHERE id=:id"); //se mostrara la tabla productos
                $sentencia->bindParam(':id', $txtId);
                $sentencia->execute();
                header("Location:productos.php");

                break;
        }

        //MOSTRANDO DATOS
        $sentencia = $conexion->prepare("SELECT * FROM productos"); //se mostrara la tabla productos
        $sentencia->execute();
        $totalProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC); // variable que almacena el contenido TOTAL


        ?>


       <!-- SEPARACION CON EL CUERPO DEL HTML-->
       <div class="row justify-content-center">
           <div class="col-md-5 mt-5">
               <div class="card">
                   <div class="card-header mb-2 bg-secondary text-white">
                       Productos
                   </div>
                   <div class="card-body">
                       <!-- formulario para agregar -->
                       <form method="POST" enctype="multipart/form-data">
                           <!-- El ID se cambia automaticamente -->
                           <div class="form-group">
                               <!--  <label for="txtId">ID:</label>-->
                               <input type="hidden" id="txtId" name="txtId" value="<?php echo $txtId; ?>" placeholder="Introduce el identificador" class="form-control" required readonly>
                           </div>
                           <!-- FIN del ID se cambia automaticamente -->

                           <div class="form-group">
                               <label for="txtTitle">Título:</label>
                               <input type="text" id="txtTitle" name="txtTitle" value="<?php echo $txtTitle; ?>" placeholder="Introduce el Titulo" class="form-control" required>


                           </div>
                           <div class="form-group">
                               <label for="txtImage ">Imagen:</label>

                               <br />
                               <div class="text-center">

                                   <?php if ($txtImage != "") { ?>
                                       <img src="../../img/<?php echo $txtImage; ?>" class="img-thumbnail rounded mx-auto d-block" width="100px" alt="">


                                   <?php   } ?>

                                   <?php echo $txtImage; ?>

                               </div>
                               <input type="file" id="txtImage" name="txtImage" accept="image/*" class="form-control-file mt-3">
                           </div>
                           <div class="d-flex justify-content-between">
                               <button type="submit" name="seleccion" value="Agregar" <?php echo ($seleccion == "Cambiar") ? "disabled" : "";  ?> class="btn  btn-success">Agregar</button>
                               <button type="submit" name="seleccion" value="Modificar" <?php echo ($seleccion != "Cambiar") ? "disabled" : "";  ?> class="btn btn-warning botonM">Modificar</button>
                               <button type="submit" name="seleccion" value="Cancelar" <?php echo ($seleccion != "Cambiar") ? "disabled" : "";  ?> class="btn btn-danger botonC">Cancelar</button>
                           </div>

                       </form>
                   </div>
                   <!-- Vista agregada -->
               </div>
           </div>
           <div class="col-md-6 mt-5 mr-1">


               <!-- Tabla para mostrar contenido -->
               <table class="table table-bordered">
                   <thead class="bg-secondary text-white">
                       <tr>
                           <th>ID</th>
                           <th>Titulo</th>
                           <th>Imagen</th>
                           <th>Selección</th>
                       </tr>
                   </thead>
                   <tbody>

                       <!-- Código PHP-->
                       <?php foreach ($totalProductos as $producto) { ?>
                           <tr>
                               <td><?php echo $producto['id']; ?></td>
                               <td><?php echo $producto['titulo']; ?></td>
                               <td>
                                   <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['img']; ?>" width="100px" alt="">
                               </td>


                               <td>
                                   <form method="post">

                                       <!--hidden oculta-->

                                       <input type="hidden" name="txtId" id="txtId" value="<?php echo $producto['id']; ?>">

                                       <button type="submit" name="seleccion" value="Cambiar" class="btn btn-warning my-2 d-block mx-auto">Cambiar</button>

                                       <button type="submit" name="seleccion" value="Borrar" class="btn btn-danger d-block mx-auto">Borrar</button>

                                   </form>

                               </td>

                           </tr>


                       <?php } ?>

                   </tbody>
               </table>
               <!-- FIN Tabla para mostrar contenido -->
           </div>
       </div>

       <?php include("../template/pie.php"); ?>