<?php require("../model/email_confirm.model.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Confirmar correo | EST N° 129</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/email_confirm.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">
</head>
<body>
		<?php

		if (!empty($msg)) {
			echo "<p class='msg'>" . $msg . "</p>";
		}

		?>
	<h3 class="form-confirm-title">Confirma tu dirección de correo electronico</h3>

	<form class="form-confirm" action="" method="POST">
		<label for="code">Ingresa el código que te enviamos a tu correo</label>
		<input type="text" name="code" placeholder="Escribe el código...">
		<?php

		if (!empty($error)) {
			echo "<p class='error'>" . $error . "</p>";
		}

		?>
		<input type="submit" name="mail-code" value="Confirmar correo">
	</form>

</body>
</html>