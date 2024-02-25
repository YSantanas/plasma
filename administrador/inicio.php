<?php include("template/cabecera.php"); ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Cambios -->
                <div class="contenedorBasico">
                    <h1 class="display-3 p-2">Bienvenido al Inicio  <?php echo isset($nickUsuario) ? $nickUsuario : ''; ?></h1>
                    <p class="lead px-2">Aquí podrás añadir, modificar y borrar los productos</p>
                    <hr class="my-2">
                    <p class="lead contenedor-boton">
                        <a class="boton-empezar" href="seccion/productos.php" role="button">Empezar</a>
     
                    </p>
                </div>
                <!-- FIN Cambios -->

            </div>

        </div>
    </div>


    <?php include("../template/pie.php"); ?>