    <!-- Contenido -->

    <div class="container">

	<div class="edit_perfil-flex">
		<div class="edit_perfil-buttons">
			<a href=""><button class="btn_edit">Editar perfil</button></a>
			<a href="../controller/perfil_profesor.password_controller.php?id=<?php echo $_GET['id']; ?>&photo_perfil=<?php echo $_GET['photo_perfil']; ?>&name=<?php echo $_GET['name']; ?>&last_name=<?php echo $_GET['last_name']; ?>&phone=<?php echo $_GET['phone']; ?>&mail=<?php echo $_GET['mail']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>"><button class="btn_pass">Cambiar contraseña</button></a>
		</div>

	<form class="form__teacher" action="" method="POST" enctype="multipart/form-data">
		<h2 class="form__teacher-title">Editar perfil</h2>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		<div class="upload__image-perfil">

			<div class="upload__image-perfil-img">

			<?php if($_GET['photo_perfil'] != ''){ ?>

			    <img id="perfil-image" class="upload__image-perfil-image" src="../img/<?php echo $_GET['photo_perfil']; ?>" title="Ver foto">	
			<?php } else { ?>


			    <img id="perfil-image" class="upload__image-perfil-image" src="../img/avatar-admin.jpg" title="Ver foto">
		    
		    <?php } ?>

			   <label for="image_perfil">
			    <span class="icon-camera" title="Sube una foto de perfil"></span>
			   </label>

			</div>
			

		    <!-- Modal del perfil -->

		    <div class="modal__perfil" id="modal-perfil">
		    	<a class="modal__perfil-close" href="">X</a>
		    	<div class="modal__perfil-content" id="modal-perfil-content">

		    		<?php if(!empty($_GET['photo_perfil'])) { ?>
		    		
		    		<h2 class="modal__perfil-content-title"><?php echo ucwords($_GET['name']); ?></h2>

		    		<img class="modal__perfil-content-img" src="../img/<?php echo $_GET['photo_perfil']; ?>">
		    	    
		    	    <?php } else { ?>

		    		<h2 class="modal__perfil-content-title"><?php echo ucwords($_GET['name']); ?></h2>

		    	    <img class="modal__perfil-content-img" src="../img/avatar-admin.jpg">

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

		if (!empty($errors['image_size'])) {
			echo "<p class='error'>" . $errors['image_size'] . "</p>";
		}

		if (!empty($errors['image_type'])) {
			echo "<p class='error'>" . $errors['image_type'] . "</p>";
		}

		?>
		
		<label for="name">Nombre (s):</label><br>
		<input type="text" name="name" placeholder="Escribe tu nombre..." value="<?php echo $_GET['name']; ?>"><br>

		<?php

		if (!empty($errors['name'])) {
			echo "<p class='error'>" . $errors['name'] . "</p>";
		}

		?>

		<label for="last_name">Apellido (s):</label><br>
		<input type="text" name="last_name" placeholder="Escribe tu apellido..." value="<?php echo $_GET['last_name']; ?>"><br>

		<?php

		if (!empty($errors['last_name'])) {
			echo "<p class='error'>" . $errors['last_name'] . "</p>";
		}

		?>

		<label for="phone">Télefono:</label><br>
		<input type="text" name="phone" placeholder="Escribe tu télefono..." value="<?php echo $_GET['phone']; ?>"><br>

		<label for="mail">Correo:</label><br>
		<input type="text" name="mail" placeholder="Escribe tu correo..." value="<?php echo $_GET['mail']; ?>"><br>

		<?php

		if (!empty($errors['mail'])) {
			echo "<p class='error'>" . $errors['mail'] . "</p>";
		}

		?>

		<input type="submit" name="btn-update" value="Actualizar datos">
	</form>
    </div>
    </div>
