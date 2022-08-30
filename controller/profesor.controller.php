<?php

require("model/profesor.model.php");

$id = '3';
$grado='1';
$grupo='a';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if (isset($_GET['grado'])) {
	$grado=$_GET['grado'];
}
if (isset($_GET['grupo'])) {
	$grupo=$_GET['grupo'];
}

if (!isset($_GET['id']) && !isset($_GET['grado']) && !isset($_GET['grupo'])) {
	header('Location: index.php?id=3&grado=1&grupo=a');
}

$homework=new Profesor();
$homework_array=$homework->getHomework($grado,$grupo);
$teacher_array=$homework->getTeacher($id);

require("view/header-banner.php");
require("view/profesor.view.php");

?>