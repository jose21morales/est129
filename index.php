<?php
session_start();
date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['usuario'])) {

    if ($_SESSION['usuario'] == 1) {
	    require("controller/profesor.controller.php");
    }

    elseif ($_SESSION['usuario'] == 2) {
	    require("controller/alumno.controller.php");
    }
    
} else {
	require("controller/login.controller.php");
}

?>