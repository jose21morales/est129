<?php
require("../model/registro.model.php");

$registro=new Registro();

$errores = $registro->insertForm();

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$direction = $_POST['direction'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];

require("../view/registro.view.php");

?>