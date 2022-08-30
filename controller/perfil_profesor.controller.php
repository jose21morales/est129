<?php

require("../model/profesor.model.php");

$id = $_GET['id'];

$teacherUpdate = new Profesor();
$teacher = $teacherUpdate->getTeacher($id);
$errors = $teacherUpdate->getTeacherUpdate();

require("../view/header-banner_perfil_profesor.php");
require("../view/perfil_profesor.view.php");
require("../view/footer-perfil_profesor.php");

?>