<?php

require("../model/alumno.model.php");

$password = new Alumno();
$errores = $password->getPasswordUpdate();

require("../view/header-banner_perfil_alumno_password.php");
require("../view/perfil_alumno.password.php");
require("../view/footer-perfil_alumno.php");

?>