<?php

require("../model/profesor.model.php");

$password = new Profesor();
$errors = $password->getPasswordUpdate();

require("../view/header-banner_perfil_profesor_password.php");
require("../view/perfil_profesor.password.php");
require("../view/footer-perfil_profesor.php");

?>