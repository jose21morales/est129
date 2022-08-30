<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Recuperar contraseña | EST N° 129</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/recuperar_password.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">
</head>
<body>

	<form class="form-recupera_password" action="" method="POST">
	<h3 class="form-recupera_password-title">Ingresa tu correo para restablecer la contraseña</h3>
		<label for="mail">Correo:</label><br>
		<input type="text" name="mail" id="mail" placeholder="Escribe tu correo..."><br>
		<?php

		if (!empty($errors['mail'])) {
			echo "<p class='error'>" . $errors['mail'] . "</p>";
		}

		if (!empty($errors['mail_not_exist'])) {
			echo "<p class='error'>" . $errors['mail_not_exist'] . "</p>";
		}

		?>

		<input type="submit" name="btn-mail" value="Restablecer contraseña">
	</form>

</body>
</html>