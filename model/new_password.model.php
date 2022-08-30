<?php

require_once("conectar.php");
$base = Conectar::conexion();

$errors = [];

if (isset($_GET['mail']) && isset($_GET['token'])) {

	$mail = htmlspecialchars(addslashes($_GET['mail']));
	$token = htmlspecialchars(addslashes($_GET['token']));

	$sql = "SELECT token FROM profesores WHERE mail = :mail";
	$statements_prof = $base->prepare($sql);
	$statements_prof->bindValue(":mail", $mail);

	$statements_prof->execute();

	$sql = "SELECT token FROM alumnos WHERE email = :email";
	$statements_alum = $base->prepare($sql);
	$statements_alum->bindValue(":email", $mail);

	$statements_alum->execute();

	$fila_prof = $statements_prof->fetch(PDO::FETCH_ASSOC);
	$fila_alum = $statements_alum->fetch(PDO::FETCH_ASSOC);

	if (empty($mail) || empty($token)) {
		header('Location: ../controller/recuperar_password.controller.php');
	}

	if ($fila_prof['token'] == $token || $fila_alum['token'] == $token) {

if (isset($_POST['btn-password']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	$password = htmlspecialchars(addslashes($_POST['password']));
	$password2 = htmlspecialchars(addslashes($_POST['password2']));
	$pass_cifrado = password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);

	if (empty($password)) {
		$errors['password'] = 'Por favor escribe una contraseña';
	}
	if (empty($password2)) {
		$errors['password2'] = 'Por favor confirma tu contraseña';
	}
	if (strlen($password) > 0 && strlen($password) < 8) {
		$errors['password_characters'] = 'La contraseña debe tener un minimo de 8 caracteres';
	} elseif ($password != $password2) {
		$errors['password_confirm'] = 'Las contraseñas no coinciden';
	}

	if (empty($errors['password']) && empty($errors['password2']) && empty($errors['password_characters']) && empty($errors['password_confirm'])) {

		$sql = "UPDATE profesores SET PASSWORD = :password, TOKEN = '' WHERE MAIL = :mail";
		$statements = $base->prepare($sql);
		$statements->bindValue(":password", $pass_cifrado);
		$statements->bindValue(":mail", $mail);
		$statements->execute();
		
		$sql = "UPDATE alumnos SET PASSWORD = :password, TOKEN = '' WHERE EMAIL = :email";
		$statements = $base->prepare($sql);
		$statements->bindValue(":password", $pass_cifrado);
		$statements->bindValue(":email", $mail);
		$statements->execute();

		header('Refresh:2;URL=../index.php');
		echo "<p class='msg'>Tu contraseña se ha cambiado con éxito</p>";
	}
}
} else {
	header('Refresh:6;URL=../controller/recuperar_password.controller.php');
	$errors['token'] = 'Error en el token, por favor ingresa nuevamente tu correo para reenviarte el link';
}
}

?>