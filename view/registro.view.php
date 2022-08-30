<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrate | EST N° 129</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/registro.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">
</head>
<body>

	<div class="form-registro--flex">

	<div class="form-registro-container">

	<form class="form-registro" action="" method="POST">
		<h2 class="form-registro-title">Introduce tus datos</h2>
		<label for="photo_perfil">Foto de perfil:</label><br>
		<input type="file" name="perfil"><br>

		<label for="name">Nombre (s):</label><br>
		<input type="text" name="name" placeholder="Escribe tu nombre..." value="<?php echo $name; ?>"><br>

		<?php

		if (!empty($errores['name'])) {
			echo "<p class='error'>" . $errores['name'] . "</p>";
		}

		?>

		<label for="last_name">Apellido (s):</label><br>
		<input type="text" name="last_name" placeholder="Escribe tu apellido..." value="<?php echo $last_name; ?>"><br>

		<?php

		if (!empty($errores['last_name'])) {
			echo "<p class='error'>" . $errores['last_name'] . "</p>";
		}

		?>

		<label for="age">Edad:</label><br>
		<select name="age">
			<?php

			for ($i=11; $i <= 14 ; $i++) { 
				echo "<option>" . $i . "</option>";
			}

			?>
			<option>15+</option>
		</select><br>

		<?php

		if (!empty($errores['age'])) {
			echo "<p class='error'>" . $errores['age'] . "</p>";
		}

		?>

		<label for="sex">Sexo:</label><br>
		Hombre <input type="checkbox" name="sex" value="h">
		Mujer <input type="checkbox" name="sex" value="m"><br>

		<?php

		if (!empty($errores['sex'])) {
			echo "<p class='error'>" . $errores['sex'] . "</p>";
		}

		?>

		<label for="grado">Grado:</label><br>
		<select name="grado">
			<option></option>
			<?php

			$grado = ['1','2','3'];

			for ($i=1; $i <= count($grado) ; $i++) { 
				echo "<option>" . $i . "°" . "</option>";
			}

			?>
		</select><br>

		<?php

		if (!empty($errores['grado'])) {
			echo "<p class='error'>" . $errores['grado'] . "</p>";
		}

		?>

		<label for="grupo">Grupo:</label><br>
		<select name="grupo">
			<option></option>
			<?php

			$grupo = ['a','b','c','d','e','f'];

			for ($i=0; $i < count($grupo) ; $i++) { 
				echo "<option>" . strtoupper($grupo[$i]) . "</option>";
			}

			?>
		</select><br>

		<?php

		if (!empty($errores['grupo'])) {
			echo "<p class='error'>" . $errores['grupo'] . "</p>";
		}

		?>

		<label for="direction">Dirección:</label><br>
		<input type="text" name="direction" placeholder="Escribe tu dirección..." value="<?php echo $direction; ?>"><br>

		<?php

		if (!empty($errores['direction'])) {
			echo "<p class='error'>" . $errores['direction'] . "</p>";
		}

		?>

		<label for="phone">Télefono:</label><br>
		<input type="text" name="phone" placeholder="Escribe tu télefono..." value="<?php echo $phone; ?>"><br>

		<label for="mail">Correo:</label><br>
		<input type="text" name="mail" placeholder="Escribe tu correo..." value="<?php echo $mail; ?>"><br>

		<?php

		if (!empty($errores['mail'])) {
			echo "<p class='error'>" . $errores['mail'] . "</p>";
		}

		if (!empty($errores['mail_validate'])) {
			echo "<p class='error'>" . $errores['mail_validate'] . "</p>";
		}

		if (!empty($errores['mail_exist'])) {
			echo "<p class='error'>" . $errores['mail_exist'] . "</p>";
		}

		?>

		<label for="password">Contraseña:</label><br>
		<input type="password" name="password" placeholder="Escribe tu contraseña..."><br>

		<?php

		if (!empty($errores['password'])) {
			echo "<p class='error'>" . $errores['password'] . "</p>";
		}

		?>

		<label for="password2">Confirma tu contraseña:</label><br>
		<input type="password" name="password2" placeholder="Confirma tu contraseña..."><br>

		<?php

		if (!empty($errores['password2'])) {
			echo "<p class='error'>" . $errores['password2'] . "</p>";
		}

		if (!empty($errores['password_characters'])) {
			echo "<p class='error'>" . $errores['password_characters'] . "</p>";
		}

		if (!empty($errores['password_confirm'])) {
			echo "<p class='error'>" . $errores['password_confirm'] . "</p>";
		}

		?>

		<input type="hidden" name="rol_id" value="2">

		<input type="submit" name="btn-form" value="Registrate">

	</form>
    </div>

	<div class="keep_in_home-container">
		<h2 class="keep_in_home-title">#QuedateEnCasa</h2>
		<div class="keep_in_home-content">
			<h3 class="keep_in_home-content-title">Medidas de prevención ante el covid-19</h3>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="../img/cubrebocas1.png">
				<p class="keep_in_home-number">1</p>
				<p class="keep_in_home-txt">Lava tus manos con solución alcohol-gel con concentración >60% antes de tocar el cubreboca.</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="../img/cubrebocas2.png">
				<p class="keep_in_home-number">2</p>
				<p class="keep_in_home-txt">Revisa que el cubreboca se encuentre íntegro y limpio (no rasgaduras, ligas inadecuadas).</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="../img/cubrebocas3.png">
				<p class="keep_in_home-number">3</p>
				<p class="keep_in_home-txt">Identiﬁca la parte que va hacia arriba (ajuste nasal) así como parte externa (pliegues hacia abajo – por lo general la parte con color hacia afuera).</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="../img/cubrebocas4.png">
				<p class="keep_in_home-number">4</p>
				<p class="keep_in_home-txt">No toques la parte interna.</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="../img/cubrebocas5.png">
				<p class="keep_in_home-number">5</p>
				<p class="keep_in_home-txt">Coloca el ajuste nasal sobre la nariz.</p>
			</div>
			<div class="keep_in_home">
				<img class="keep_in_home-img" src="../img/cubrebocas6.png">
				<p class="keep_in_home-number">6</p>
				<p class="keep_in_home-txt">Asegura que cubra nariz, boca y barbilla. Asegurate que ajusta bien el resto de tu cara.</p>
			</div>
		</div>
	</div>
    
    </div>

</body>
</html>