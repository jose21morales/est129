<?php

require("../model/alumnos_registrados.model.php");

$id = $_GET['id'];
$grado = $_GET['grado'];
$grupo = $_GET['grupo'];

$teacher = new Profesor_datos();
$teacher_array = $teacher->getTeacher($id);

$datos_alumnos = $teacher->alumnosRegistrados($grado, $grupo);

require("../view/alumnos_registrados.php");

?>