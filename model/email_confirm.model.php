<?php

require_once("conectar.php");
$conn = Conectar::conexion();

$error = '';
$msg = '';

if (isset($_POST['mail-code']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	$mail_code = htmlspecialchars(stripslashes($_POST['code']));

	$sql = "SELECT CODE FROM alumnos WHERE CODE = :mail_code";
	$statements = $conn->prepare($sql);
	$statements->bindValue(":mail_code",$mail_code);
	$statements->execute();
	$num_registro = $statements->rowCount();

	$registro = $statements->fetch(PDO::FETCH_ASSOC);
	if ($num_registro == 0) {
		$error = 'El código es incorrecto';
	} else {
		$query = "UPDATE alumnos SET VERIFY_MAIL = 1 WHERE CODE = :mail_code";
		$statements = $conn->prepare($query);
		$statements->bindValue(":mail_code",$mail_code);
		$statements->execute();

		header('Refresh:2; URL=../index.php');
		$msg = "¡Felicidades ha confirmado su correo con éxito!";
	}
}

?>