
    <?php if(empty($homework_array)) { ?>
         <h4>No hay tareas aun</h4>

	<?php } else { ?>

	<?php

	foreach ($homework_array as $homework):

	?>


	<section class="section-homework container">
		<?php foreach($teacher_array as $teacher): ?>
		<div class="perfil__teacher container">
			<?php if($teacher['photo_perfil'] != ''){ ?>
			<img class="perfil__teacher-img" src="img/<?php echo $teacher['photo_perfil']; ?>">
			<?php } else { ?>
			<img class="perfil__teacher-img" src="img/avatar-admin.jpg">
		    <?php } ?>

			<p class="perfil__teacher-name">Profr. <?php echo ucwords($teacher['name']); ?></p>
			
		</div>

	    <?php endforeach; ?>
		<div class="homework">
			<h2 class="homework-title"><?php echo $homework['title']; ?></h2>
			<h4 class="homework-date"><?php echo $homework['date_hw']; ?></h4>
			<p class="homework-commenter"><?php echo $homework['commenter']; ?></p>

			<?php if($homework['link'] != ''): ?>
			   <iframe class="homework-link" src="<?php echo $homework['link']; ?>"></iframe>
		    <?php endif; ?>

		    <?php if($homework['video'] != ''): ?>
			   <video class="homework-video" src="video/<?php echo $homework['video']; ?>" controls></video>
			<?php endif; ?>

			<?php if($homework['img'] != ''): ?>
			   <img class="homework-img" src="img/<?php echo $homework['img']; ?>" width="450px">
			<?php endif; ?>

			<?php if($homework['audio'] != ''): ?>
			   <audio class="homework-audio" src="audio/<?php echo $homework['audio']; ?>" controls></audio>
			<?php endif; ?>

			<?php if($homework['pdf'] != ''): ?>
			   <a class="homework-pdf" href="files/<?php echo $homework['pdf']; ?>">PDF</a>
			<?php endif; ?>

		</div>

		<?php foreach($datos_alumnos as $datos): ?>
		<div class="alumno__homework">
			<form class="alumno__homework-form" action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="homework_id" value="<?php echo $homework['id']; ?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
					
				<input type="hidden" name="avatar" value="<?php echo $datos['avatar']; ?>">
				<input type="hidden" name="name" value="<?php echo $datos['name']; ?>">
				<input type="hidden" name="last_name" value="<?php echo $datos['last_name']; ?>">
				<input type="hidden" name="sex" value="<?php echo $datos['sex']; ?>">
				<input type="hidden" name="mail" value="<?php echo $datos['email']; ?>">
				<input type="hidden" name="grado" value="<?php echo $grado; ?>">
				<input type="hidden" name="grupo" value="<?php echo $grupo; ?>">
				
				<div class="alumno__homework-perfil">
		    	<?php if($datos['avatar'] != ''){ ?>

		    	  <img class="alumno__homework-img" src="img/<?php echo $datos['avatar']; ?>">
		    	
		    	<?php } elseif ($datos['avatar'] == '' && $datos['sex'] == 'h') { ?>
		    	
		    	  <img class="alumno__homework-img" src="img/avatar-h.png">
		        
		        <?php } elseif ($datos['avatar'] == '' && $datos['sex'] == 'm') { ?>

		        	<img class="alumno__homework-img" src="img/avatar-m.png">

		        <?php } ?>

		        <?php echo "<p class='alumno__homework-name'>" . ucwords($datos['name'])." ".ucwords($datos['last_name']) . "</p>"; ?>
		        </div>
                
                <div class="alumno__homework-comment">
                <textarea class="alumno__homework-commenter" name="commenter" placeholder="Escribe un mensaje..."></textarea>

				<p class="pdf-label-name" for="file">Video, Imagen, Audio o PDF:</p><br>
				<label class="pdf-label" for="pdf">Archivo</label>
				<input id="pdf" type="file" name="pdf">
							<?php
							if (!empty($errors['image_type'])) {
								echo "<p class='error'>".$errors['image_type']."</p>";
							}

							if (!empty($errors['image_size'])) {
								echo "<p class='error'>".$errors['image_size']."</p>";
							}
							if (!empty($errors['image_empty'])) {
								echo "<p class='error'>".$errors['image_empty']."</p>";
							}
							?>

							<?php
							$send = $alumno->getHomeworkSend($datos['email'], $homework['id']);
							if ($send == true) {
								echo "<p class='enviada'>Tarea enviada</p>";
							} else {
								echo "<p class='no_enviada'>No se ha enviado ninguna tarea</p>";
							}
							?>

							<input type="submit" name="btn-hw" value="Enviar tarea">
				</div>
			</form>
		</div>

	    <?php endforeach; ?>
	</section>

	<hr class="line-hr">

	<?php

    endforeach;

	?>

	<?php
    require("model/paginacion.php");

	$incrementNum=(($pagina + 1) <= $total_paginas) ? ($pagina + 1):1;
	$decrementNum=(($pagina - 1) < 1)?1:($pagina-1);

	?>

	<nav>
		<ul class="paginacion">
			<li><a class="pag-link" href="?id=<?php echo $id; ?> & grado=<?php echo $grado; ?>&grupo=<?php echo $grupo; ?> & pagina=<?php echo $decrementNum; ?>">&laquo;</a></li>
			<?php

			$desde=$pagina-(ceil($post_por_pagina/2)+$total_paginas);
			$hasta=$pagina+(ceil($post_por_pagina/2)+$total_paginas);

			$desde=($desde < 1)?1:$desde;
			$hasta=($hasta < $post_por_pagina)?$post_por_pagina:$hasta;

			for ($i=$desde; $i <= $hasta ; $i++) { 
				if ($i <= $total_paginas) {
					if ($i == $pagina) {
						echo "<li class='active'><a class='pag-link' href='?id=".$id." & grado=".$grado."&grupo=".$grupo." & pagina=".$i."'>".$i."</a></li>";
					} else {
						echo "<li><a class='pag-link' href='?id=".$id." & grado=".$grado."&grupo=".$grupo." & pagina=".$i."'>".$i."</a></li>";
					}
				}
			}

			?>
			<li><a class="pag-link" href="?id=<?php echo $id; ?> & grado=<?php echo $grado; ?>&grupo=<?php echo $grupo; ?> & pagina=<?php echo $incrementNum; ?>">&raquo;</a></li>
		</ul>
	</nav>

    <?php } ?>

    <footer class="footer-content">
    	<p class="footer-content-p">&copy; Escuela Secundaria Técnica N° 129 | Reservados todos los derechos</p>
    </footer>

    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/submenu.js"></script>
</body>
</html>