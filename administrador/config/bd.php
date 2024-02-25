<?php 


//Conexión con la BD para pruebas

$host = "localhost";
$bd = "sistema";
$usuario = "root";
$contra = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contra);
    if ($conexion) {
        //echo "Conexión exitosa ...";
        echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
        </svg>
        
        <div id="successMessage" class="container text-center mt-5">
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" width="24" height="24"><use xlink:href="#check-circle-fill"/></svg>
                <div class="d-block mx-auto">Conexión Exitosa</div>
            </div>
        </div>';
        

          
        
        echo '<script>
                setTimeout(function() {
                    document.getElementById("successMessage").style.display = "none";
                }, 3000); // Ocultar el mensaje después de 3 segundos (3000 milisegundos)
              </script>';
    }
} catch (Exception $ex) {
    //echo $ex->getMessage();
    echo '<div class="container text-center mt-5"><div class="alert alert-danger" role="alert">' . $ex->getMessage() . '</div></div>';
}
?>


