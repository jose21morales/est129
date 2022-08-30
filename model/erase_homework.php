<?php
require_once("conectar.php");
$base=Conectar::conexion();

$id = $_GET['id'];

$sql = "DELETE FROM homeworks WHERE ID = :id";
$statements=$base->prepare($sql);
$statements->bindValue(":id", $id);
$statements->execute();

header('Location: ../index.php?id='.$_GET['id_pro'].'&grado='.$_GET['grado'].'&grupo='.$_GET['grupo']);

?>