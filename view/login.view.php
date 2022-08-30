<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login | EST N° 129</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">
</head>
<body>

	<div class="page__login--flex container">
		<div class="form-login-container">

		<div class="form-head">
			<h3 class="form-login-title">Iniciar sesión</h3>
			<p class="form-login-txt">Escuela Secundaria Técnica N° 129</p>
		</div>

		<form class="form-login" action="" method="POST">
			<table>
				<tr>
					<td></td>
					<td><label for="mail">Correo:</label></td>
				</tr>
				<tr>
					<td><span class="icon-user"></span></td>
					<td><input type="text" name="mail" id="mail" placeholder="Escribe tu correo..." value="<?php echo $login; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><label for="password">Contraseña:</label></td>
				</tr>
				<tr>
					<td><span class="icon-lock"></span></td>
					<td><input type="password" name="password" id="password" placeholder="Escribe tu contraseña..."></td>
				</tr>
				<tr>
					<td colspan="2" class="error">
				    <?php

		            if (!empty($errors['login_empty'])) {
			            echo $errors['login_empty'];
		            }

		            if (!empty($errors['login_incorrect'])) {
			            echo $errors['login_incorrect'];
		            }

	                ?>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="btn-login" value="Iniciar sesión"></td>
				</tr>
				<tr>
					<td class="form-link" colspan="2">¿No tienes cuenta? <a href="controller/registro.controller.php">Haz clic aqui</a></td>
				</tr>
				<tr>
					<td class="form-link" colspan="2"><a href="controller/recuperar_password.controller.php">¿Olvidaste tu contraseña?</a></td>
				</tr>
			</table>
		</form>
	<footer class="footer">
		<p>&copy; Escuela Secundaria Técnica N° 129 | Reservados todos los derechos</p>
	</footer>
	</div>

	<div class="keep_in_home-container">
		<h2 class="keep_in_home-title">#QuedateEnCasa</h2>
		<div class="keep_in_home-content">
			<h3 class="keep_in_home-content-title">Medidas de prevención ante el covid-19, ¿Cómo ponerse el cubrebocas?</h3>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="img/cubrebocas1.png">
				<p class="keep_in_home-number">1</p>
				<p class="keep_in_home-txt">Lava tus manos con solución alcohol-gel con concentración 70% antes de tocar el cubreboca.</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="img/cubrebocas2.png">
				<p class="keep_in_home-number">2</p>
				<p class="keep_in_home-txt">Revisa que el cubreboca se encuentre íntegro y limpio (no rasgaduras, ligas inadecuadas).</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="img/cubrebocas3.png">
				<p class="keep_in_home-number">3</p>
				<p class="keep_in_home-txt">Identiﬁca la parte que va hacia arriba (ajuste nasal) así como parte externa (pliegues hacia abajo – por lo general la parte con color hacia afuera).</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="img/cubrebocas4.png">
				<p class="keep_in_home-number">4</p>
				<p class="keep_in_home-txt">No toques la parte interna.</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="img/cubrebocas5.png">
				<p class="keep_in_home-number">5</p>
				<p class="keep_in_home-txt">Coloca el ajuste nasal sobre la nariz.</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="img/cubrebocas6.png">
				<p class="keep_in_home-number">6</p>
				<p class="keep_in_home-txt">Asegura que cubra nariz, boca y barbilla. Asegurate que ajusta bien el resto de tu cara.</p>
			</div>
		</div>
	</div>

	</div>


</body>
</html>