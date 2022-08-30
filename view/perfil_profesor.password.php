    <!-- Contenido -->

    <div class="container">

	<div class="edit_perfil-flex">
		<div class="edit_perfil-buttons">
			<a href="../controller/perfil_profesor.controller.php?id=<?php echo $_GET['id']; ?>&photo_perfil=<?php echo $_GET['photo_perfil']; ?>&name=<?php echo $_GET['name']; ?>&last_name=<?php echo $_GET['last_name']; ?>&phone=<?php echo $_GET['phone']; ?>&mail=<?php echo $_GET['mail']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>"><button class="btn_edit">Editar perfil</button></a>
			<a href=""><button class="btn_pass">Cambiar contraseña</button></a>
		</div>

	<form class="form__teacher" action="" method="POST" enctype="multipart/form-data">
		<h2 class="form__teacher-title">Cambio de contraseña</h2>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		<label for="password">Contraseña actual:</label>
		<input type="password" name="password_actual" placeholder="Escribe la contraseña actual...">

		<?php

		if (!empty($errors['password_actual'])) {
			echo "<p class='error'>" . $errors['password_actual'] . "</p>";
		}

		if (!empty($errors['password_actual-error'])) {
			echo "<p class='error'>" . $errors['password_actual-error'] . "</p>";
		}

		?>

		<label for="password">Contraseña:</label>
		<input type="password" name="password" placeholder="Escribe tu contraseña...">
		
		<?php

		if (!empty($errors['password'])) {
			echo "<p class='error'>" . $errors['password'] . "</p>";
		}

		?>

		<label for="password2">Confirma tu contraseña:</label>
		<input type="password" name="password2" placeholder="Confirma tu contraseña...">

		<?php

		if (!empty($errors['password2'])) {
			echo "<p class='error'>" . $errors['password2'] . "</p>";
		}

		if (!empty($errors['password_characters'])) {
			echo "<p class='error'>" . $errors['password_characters'] . "</p>";
		}

		if (!empty($errors['password_confirm'])) {
			echo "<p class='error'>" . $errors['password_confirm'] . "</p>";
		}

		?>

		<input type="submit" name="btn-password" value="Cambiar contraseña">
	</form>
    </div>
    </div>
