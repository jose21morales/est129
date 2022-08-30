        <div class="container">

    	<a class="btn-new" href="controller/nueva_tarea.controller.php?id=<?php echo $_GET['id']; ?>&grado=<?php echo $_GET['grado'] ?>&grupo=<?php echo $_GET['grupo']; ?>&photo_perfil=<?php echo $teacher['photo_perfil']; ?>&mail=<?php echo $teacher['mail']; ?>">Nueva tarea</a>

    	<?php if(empty($homework_array)) { ?>
    	     <h4 class="no_homework">No hay tareas aun</h4>

	    <?php } else { ?>

    	<?php foreach($homework_array as $homework): ?>
    	
    <section class="section-homework container">
		
		<?php foreach($teacher_array as $teacher): ?>

		<div class="perfil__teacher container">
			<?php if($teacher['photo_perfil'] != ''){ ?>
			<img class="perfil__teacher-img" src="img/<?php echo $teacher['photo_perfil']; ?>" width="80px">
			<?php } else { ?>
			<img class="perfil__teacher-img" src="img/avatar-admin.jpg" width="80px">
		    <?php } ?>

		    <div class="perfil__teacher-content">
			    <p class="perfil__teacher-name">Profr. <?php echo ucwords($teacher['name']); ?></p>

			    <a class="perfil__teacher-erase" href="model/erase_homework.php?id=<?php echo $homework['id']; ?>&id_pro=<?php echo $_GET['id'] ?>&grado=<?php echo $homework['grado']; ?>&grupo=<?php echo $homework['grupo']; ?>">Borrar tarea</a><br>
			    <a href="controller/edit_homework.controller.php?id_hw=<?php echo $homework['id']; ?>&title=<?php echo $homework['title']; ?>&commenter=<?php echo $homework['commenter']; ?>&link=<?php echo $homework['link']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>&id=<?php echo $teacher['id_profesores'] ?>&photo_perfil=<?php echo $teacher['photo_perfil']; ?>&mail=<?php echo $teacher['mail']; ?>">Editar</a>
		    </div>
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

		<?php require("model/homework_sent.php"); ?>

		<?php if(empty($homework_send)) { ?>
		
			<h4 class="not_homework">No hay tareas recibidas</h4>
		
		<?php } else { ?>

		<?php foreach($homework_send as $homework_sent): ?>
		<div class="alumno__homework">

			<div class="alumno__homework-perfil">
			    <?php if($homework_sent['photo_perfil'] != ''){ ?>
			        <img class="alumno__homework-img" src="img/<?php echo $homework_sent['photo_perfil']; ?>">
			    <?php } elseif ($homework_sent['photo_perfil'] == '' && $homework_sent['sex'] == 'h') { ?>
			        <img class="alumno__homework-img" src="img/avatar-h.png">
		        <?php } elseif ($homework_sent['photo_perfil'] == '' && $homework_sent['sex'] == 'm') { ?>
		        	<img class="alumno__homework-img" src="img/avatar-m.png">
		        <?php } ?>
		        
		        <div class="alumno__homework-content">
		            <?php echo "<p class='alumno__homework-name'>".ucwords($homework_sent['name'])." ".ucwords($homework_sent['last_name'])."</p>"; ?>
			        
			        <?php echo "<p class='alumno__homework-mail'>".$homework_sent['mail']."</p>"; ?>
		        </div>
		        
		    </div>

		    <div class="alumno__homework-comment">
			    <?php echo "<p class='alumno__homework-date'>".$homework_sent['date_send']."</p>"; ?>

		        <?php echo "<p class='alumno__homework-commenter'>".$homework_sent['commenter']."</p>"; ?>

			    <label class="alumno__homework-label" for="files">File:</label><br>
			    <a class="alumno__homework-files" href="files/<?php echo $homework_sent['files']; ?>">Archivo</a>
		        
		        <hr class="line-alumnos">
		    
		    </div>

		</div>


	    <?php endforeach; ?>
	    <?php } ?>

	</section>
	<hr class="line-hr">

	<?php endforeach; ?>

    </div>

	<?php
	require("model/paginacion.php");

	$incrementNum=(($pagina+1)<=$total_paginas)?($pagina+1):1;
	$decrementNum=(($pagina-1)<1)?1:($pagina-1);

	?>

	<!-- Paginación -->
	
	<nav>
		<ul class="paginacion">
			<li class="li btn"><a class="pag-link" href="?id=<?php echo $id; ?>&grado=<?php echo $grado; ?>&grupo=<?php echo $grupo; ?>&pagina=<?php echo $decrementNum; ?>">&laquo;</a></li>
			<?php

			$desde=$pagina-(ceil($post_por_pagina/2)+$total_paginas);
			$hasta=$pagina+(ceil($post_por_pagina/2)+$total_paginas);

			$desde=($desde<1)?1:$desde;
			$hasta=($hasta<$post_por_pagina)?$post_por_pagina:$hasta;

			for ($i=$desde; $i <=$hasta ; $i++) { 
				if ($i<=$total_paginas) {
					if ($i==$pagina) {
						echo "<li class='li' id='active'><a class='pag-link' href='?id=".$id."&grado=".$grado."&grupo=".$grupo."&pagina=".$i."'>".$i."</a></li>";
					} else {
						echo "<li class='li'><a class='pag-link' href='?id=".$id."&grado=".$grado."&grupo=".$grupo."&pagina=".$i."'>".$i."</a></li>";
					}
				}
			}

			?>
			<li class="li"><a class="pag-link" href="?id=<?php echo $id; ?>&grado=<?php echo $grado; ?>&grupo=<?php echo $grupo; ?>&pagina=<?php echo $incrementNum; ?>">&raquo;</a></li>
		</ul>
	</nav>

	<?php
    }
	?>

    <footer class="footer-content">
    	<p class="footer-content-p">&copy; Escuela Secundaria Técnica N° 129 | Todos los derechos reservados</p>
    </footer>
    </div>
    </div>


    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/submenu.js"></script>
    <script type="text/javascript" src="js/open.js"></script>
    <script type="text/javascript" src="js/open_group.js"></script>
</body>
</html>