<?php

require("model/alumno.model.php");
require("model/profesor.model.php");
$id=$_GET['id'];
$grado=$_GET['grado'];
$grupo=$_GET['grupo'];

if ($id == '' || $grado == '' || $grupo == '') {
	echo "<style>
	.container {
		margin:10px;
	}

	.text {
		font-family:'Arial';
		margin-bottom:6px;
	}

	.close_session {
		background:rgb(0,140,0);
		color:#fff;
		padding:8px;
		border:2px solid rgb(0,100,0);
		border-radius:5px;
		margin-top:15px;
		text-decoration:none;
		font-family:'Arial';
	}

	.close_session:hover {
		background:rgb(0,150,0);
	}

	     </style>
	";

    echo "<div class='container'>";
	
	echo "<p class='text'>Por favor cierra sesión antes de salir</p>";
	echo "<br><a class='close_session' href='model/close_session.php'>Cerra sesion</a>";

	echo "</div>";
	exit();
}

$alumno = new Alumno();
$datos_alumnos = $alumno->datosAlumnos($id);

$homework_array = $alumno->getHomework($grado,$grupo);

$profesor = new Profesor();
$teacher_array = $profesor->getTeacher(3);

$errors = $alumno->insertHomework();

require("view/header-banner_alumno.php");
require("view/alumno.view.php");

?>