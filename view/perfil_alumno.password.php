<!-- Contenido -->

	<div class="container">

	<div class="edit_perfil-flex">
		<div class="edit_perfil-buttons">
			<a href="../controller/perfil_alumno.controller.php?id=<?php echo $_GET['id']; ?>&avatar=<?php echo $_GET['avatar']; ?>&name=<?php echo $_GET['name']; ?>&last_name=<?php echo $_GET['last_name']; ?>&age=<?php echo $_GET['age']; ?>&sex=<?php echo $_GET['sex']; ?>&direction=<?php echo $_GET['direction']; ?>&phone=<?php echo $_GET['phone']; ?>&email=<?php echo $_GET['email']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>"><button class="btn_edit">Editar perfil</button></a>
			<a href=""><button class="btn_pass">Cambiar contraseña</button></a>
		</div>

	<form class="form__alumno" action="" method="POST">
		<h2 class="form__alumno-title">Cambio de contraseña</h2>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		<label for="password">Contraseña actual:</label><br>
		<input type="password" name="password_actual" placeholder="Escribe tu contraseña actual..."><br>

		<?php

		if (!empty($errores['password_actual'])) {
			echo "<p class='error'>" . $errores['password_actual'] . "</p>";
		}

		if (!empty($errores['password_actual-error'])) {
			echo "<p class='error'>" . $errores['password_actual-error'] . "</p>";
		}

		?>

		<label for="password">Nueva contraseña:</label><br>
		<input type="password" name="password" placeholder="Escribe una contraseña nueva..."><br>

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

		<input type="submit" name="btn-password" value="Cambiar contraseña">
	</form>
    </div>
    </div>
    