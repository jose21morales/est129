<!-- Contenido -->

	<div class="container">

	<div class="edit_perfil-flex">
		<div class="edit_perfil-buttons">
			<a href=""><button class="btn_edit">Editar perfil</button></a>
			<a href="../controller/perfil_alumno.password_controller.php?id=<?php echo $_GET['id']; ?>&avatar=<?php echo $_GET['avatar']; ?>&name=<?php echo $_GET['name']; ?>&last_name=<?php echo $_GET['last_name']; ?>&age=<?php echo $_GET['age']; ?>&sex=<?php echo $_GET['sex']; ?>&direction=<?php echo $_GET['direction']; ?>&phone=<?php echo $_GET['phone']; ?>&email=<?php echo $_GET['email']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>"><button class="btn_pass">Cambiar contraseña</button></a>
		</div>

	<form class="form__alumno" action="" method="POST" enctype="multipart/form-data">
		<h2 class="form__alumno-title">Editar perfil</h2>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		<div class="upload__image-perfil">

			<div class="upload__image-perfil-img">

			<?php if($_GET['avatar'] != ''){ ?>
			    <img id="perfil-image" class="upload__image-perfil-image" src="../img/<?php echo $_GET['avatar']; ?>" title="Ver foto">	
			<?php } elseif ($_GET['avatar'] == '' && $_GET['sex'] == 'h') { ?>
			    <img id="perfil-image" class="upload__image-perfil-image" src="../img/avatar-h.png" title="Ver foto">
		    <?php } elseif ($_GET['avatar'] == '' && $_GET['sex'] == 'm') { ?>

		        <img id="perfil-image" class="upload__image-perfil-image" src="../img/avatar-m.png" title="Ver foto">

		        <?php } ?>

			   <label for="image_perfil">
			    <span class="icon-camera" title="Sube una foto de perfil"></span>
			   </label>

			</div>
		
		    <!-- Modal del perfil -->

		    <div class="modal__perfil" id="modal-perfil">
		    	<a class="modal__perfil-close" href="">X</a>
		    	<div class="modal__perfil-content" id="modal-perfil-content">

		    		<?php if(!empty($_GET['avatar'])) { ?>
		    		
		    		<h2 class="modal__perfil-content-title"><?php echo ucwords($_GET['name']); ?></h2>

		    		<img class="modal__perfil-content-img" src="../img/<?php echo $_GET['avatar']; ?>">
		    	    
		    	    <?php } elseif ($_GET['avatar'] == '' && $_GET['sex'] == 'h') { ?>

		    		<h2 class="modal__perfil-content-title"><?php echo ucwords($_GET['name']); ?></h2>

		    	    <img class="modal__perfil-content-img" src="../img/avatar-h.png">

		    	    <?php } elseif ($_GET['avatar'] == '' && $_GET['sex'] == 'm') { ?>



		    	    <?php } ?>
		    	</div>
		    </div>

		    <!-- Fin de modal -->

		  <div class="upload__image-info">
		    <p class="upload__image-info-name-p"><label class="upload__image-info-name"><?php echo ucwords($_GET['name']); ?></label></p>
		    
		    <label class="upload__image-info-change" for="image_perfil">Cambiar foto de perfil</label>
		  </div>
	      
	      <input id="image_perfil" type="file" name="image_perfil">
		</div><br>

		<?php

		if (!empty($errores['image_size'])) {
			echo "<p class='error'>" . $errores['image_size'] . "</p>";
		}

		if (!empty($errores['image_type'])) {
			echo "<p class='error'>" . $errores['image_type'] . "</p>";
		}

		?>
		
		<label for="name">Nombre (s):</label><br>
		<input type="text" name="name" placeholder="Escribe tu nombre..." value="<?php echo $_GET['name']; ?>"><br>

		<?php

		if (!empty($errores['name'])) {
			echo "<p class='error'>" . $errores['name'] . "</p>";
		}

		?>

		<label for="last_name">Apellido (s):</label><br>
		<input type="text" name="last_name" placeholder="Escribe tu apellido..." value="<?php echo $_GET['last_name']; ?>"><br>

		<?php

		if (!empty($errores['last_name'])) {
			echo "<p class='error'>" . $errores['last_name'] . "</p>";
		}

		?>

		<label for="age">Edad:</label><br>
		<select name="age">
			<option><?php echo $_GET['age']; ?></option>
		</select><br>

		<?php

		if (!empty($errores['age'])) {
			echo "<p class='error'>" . $errores['age'] . "</p>";
		}

		?>

		<label for="sex">Sexo:</label><br>

		<select name="sex">
			<option>
				<?php

				if ($_GET['sex'] == 'h') {
					echo "Hombre";
				} elseif ($_GET['sex'] == 'm') {
					echo "Mujer";
				}

				?>
			</option>
		</select>

		<?php

		if (!empty($errores['sex'])) {
			echo "<p class='error'>" . $errores['sex'] . "</p>";
		}

		?>

		<label for="grado">Grado:</label><br>
		<select name="grado">
			<option><?php echo $_GET['grado']; ?></option>
		</select><br>

		<label for="grupo">Grupo:</label><br>
		<select name="grupo">
			<option><?php echo strtoupper($_GET['grupo']); ?></option>
		</select><br>

		<label for="direction">Dirección:</label><br>
		<input type="text" name="direction" placeholder="Escribe tu dirección..." value="<?php echo $_GET['direction']; ?>"><br>

		<?php

		if (!empty($errores['direction'])) {
			echo "<p class='error'>" . $errores['direction'] . "</p>";
		}

		?>

		<label for="phone">Télefono:</label><br>
		<input type="text" name="phone" placeholder="Escribe tu télefono..." value="<?php echo $_GET['phone']; ?>"><br>

		<label for="mail">Correo:</label><br>
		<input type="text" name="mail" placeholder="Escribe tu correo..." value="<?php echo $_GET['email']; ?>"><br>

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

		<input type="submit" name="btn-update" value="Actualizar datos">
	</form>
    </div>
	</div>
