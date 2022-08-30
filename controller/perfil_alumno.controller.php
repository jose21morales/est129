<?php

require("../model/alumno.model.php");

$alumno = new Alumno();
$errores = $alumno->getAlumnoUpdate();

require("../view/header-banner_perfil_alumno.php");
require("../view/perfil_alumno.view.php");
require("../view/footer-perfil_alumno.php");

?>