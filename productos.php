<?php include("template/cabecera.php"); ?>



<?php
//incluimos la BD
include("administrador/config/bd.php");

//MOSTRANDO DATOS
$sentencia = $conexion->prepare("SELECT * FROM productos"); //se mostrara la tabla productos
$sentencia->execute();
$totalProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC); // variable que almacena el contenido TOTAL


?>

<div class="container">
    <div class="row">
        <?php foreach($totalProductos as $producto): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top py-2" src="img/<?php echo $producto['img'];?>" alt="">
                    <div class="card-body text-center">
                        <h4 class="card-title"><?php echo $producto['titulo'];?></h4>
                        <a name="" id="" class="btn btn-dark d-block mx-auto" href="#" role="button">Ver más</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>






<?php include("template/pie.php"); ?>