


<?php

$pagina = "login";

if (!empty($_GET['pagina']))  {
    $inicio = $_GET['pagina'];
}

if(is_file("controlador/".$pagina.".php")) {
    require_once("controlador/".$pagina.".php");
}
else{
    echo"Pagina no encontrada";
}


?>