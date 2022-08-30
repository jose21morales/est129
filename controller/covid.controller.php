<?php

require("../model/covid.model.php");

$id=$_GET['id'];

$alumno = new Alumno_datos();
$datos_alumnos = $alumno->datosAlumnos($id);

require("../view/covid.php");

?>