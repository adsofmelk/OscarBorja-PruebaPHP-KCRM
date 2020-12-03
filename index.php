<?php

//se incluye cabecera en html
require_once("views/header.phtml");

// se incluye clase para conexion a base de datos
require_once("lib/conexionClass.php");

if (isset($_GET['controller'])) {
    if (file_exists("controllers/". $_GET['controller']."Controller.php")) {
        require_once("controllers/". $_GET['controller']."Controller.php");
    } else {
        echo "El controlador ".  $_GET['controller'] . " no existe";
    }
} else {
    require_once("controllers/productoController.php");
}

// se incluye pie de pagina en html
require_once("views/footer.phtml");

?>
