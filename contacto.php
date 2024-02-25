<?php include("template/cabecera.php"); ?>


<!-- FORMULARIO DE CONTACTO -->
<div class="contenedor-titulo">
    <h1 class="titulo-top">Formulario de Contacto</h1>
</div>



<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-7 d-block mx-auto my-3">

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center mb-1">Contacto</h3>
                </div>

                <!-- BODY CON LOGIN -->
                <form class="container mx-auto mt-1" action="https://formsubmit.co/lexsansa@gmail.com" method="POST">
                    <div class="form-group mb-3">
                        <label for="nombre" class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Introduce tu nombre" required                         style="outline: none; /* Elimina el contorno predeterminado */
                        box-shadow: none; /* Elimina el efecto de sombra */
                        border-color: #68145218; /* Cambia el color del borde a rojo */">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Correo: </label>
                        <input type="email" name="email" class="form-control" placeholder="Introduce tu correo" required                         style="outline: none; /* Elimina el contorno predeterminado */
                        box-shadow: none; /* Elimina el efecto de sombra */
                        border-color: #68145218; /* Cambia el color del borde a rojo */">
                    </div>

                    <div class="form-group mb-3">
                        <label for="asunto" class="form-label">Asunto: </label>
                        <input type="text" class="form-control" name="asunto" placeholder="Introduce el asunto" required                         style="outline: none; /* Elimina el contorno predeterminado */
                        box-shadow: none; /* Elimina el efecto de sombra */
                        border-color: #68145218; /* Cambia el color del borde a rojo */">
                    </div>

                    <div class="form-group mb-3">
                        <label for="msg" class="form-label">Mensaje: </label>
                        <input type="text" class="form-control" name="msg" placeholder="Introduce tu mensaje" required 
                        style="outline: none; /* Elimina el contorno predeterminado */
                        box-shadow: none; /* Elimina el efecto de sombra */
                        border-color: #68145218; /* Cambia el color del borde a rojo */">
                    </div>

                    <button type="submit" class="btn w-100 my-2" value="enviar" style="background-color: #6814524c; padding: 10px 20px; border-radius: 10px; color: white; text-decoration: none;" onmouseover="this.style.backgroundColor='#66656585';" onmouseout="this.style.backgroundColor='#6814524c';">Enviar
                    </button>

                    <input type="hidden" name="_next" value="http://localhost/sitioweb/contacto.php">
                    <input type="hidden" name="_captcha" value="false">
                </form>



            </div>

            <!-- FIN BODY CON LOGIN -->

        </div>
    </div>


</div>


</div>


</div>
</div>

<?php include("template/pie.php"); ?>