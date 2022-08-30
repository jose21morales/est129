<?php
session_start();

if (!isset($_SESSION['usuario'])) {
	header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EST N° 129 | Escuela Secundaria Técnica N° 129</title>
    <link rel="stylesheet" type="text/css" href="../css/update_homework.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/profesor.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>

	<div class="body-flex">

    <div class="sidebar">
    	<h2 class="sidebar-title">EST N° 129</h2>
    	<ul class="sidebar-menu">
    		<li class="sidebar-menu-grado1">1er. grado</li>
    			<ul class="sidebar-menu1" id="sidebar-menu2">
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=1&grupo=a">A</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=1&grupo=b">B</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=1&grupo=c">C</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=1&grupo=d">D</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=1&grupo=e">E</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=1&grupo=f">F</a></li>
    			</ul>
    		
    		<li class="sidebar-menu-grado2">2do. grado</li>
    			<ul class="sidebar-menu2">
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=2&grupo=a">A</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=2&grupo=b">B</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=2&grupo=c">C</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=2&grupo=d">D</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=2&grupo=e">E</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=2&grupo=f">F</a></li>
    			</ul>
    		<li class="sidebar-menu-grado3">3er. grado</li>
    			<ul class="sidebar-menu3">
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=3&grupo=a">A</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=3&grupo=b">B</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=3&grupo=c">C</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=3&grupo=d">D</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=3&grupo=e">E</a></li>
    				<li class="sidebar-menu-li2"><a class="sidebar-menu-link2" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=3&grupo=f">F</a></li>
    			</ul>
    	</ul>
    </div>

    <div class="global-container">
    	<img src="../img/menu.png" class="menu-bar"><br>

	<div class="header">
        <h2 class="header-title">Escuela Secundaria Técnica N° 129</h2>
        <h2 class="header-grado_grupo"><?php echo strtoupper($_GET['grado'] . "° " .$_GET['grupo']); ?></h2>
	</div>

	<nav class="nav">
		<h3 class="logo">DGEST</h3>
		<span class="icon-bars" id="btnmenu"></span>
		<ul class="menu" id="menu">

			<li class="menu__item" id="menu-item">
				<div class="menu-perfil">
				<?php if($_GET['photo_perfil'] != ''){ ?>
		    	  <img class="menu-perfil-img" src="../img/<?php echo $_GET['photo_perfil']; ?>">
		    	<?php } else { ?>
		    	  <img class="menu-perfil-img" src="../img/avatar-admin.jpg">
		    	<?php } ?>

		    	  <?php echo "<p class='menu-perfil-p'>".$_GET['mail']."</p>"; ?>
		    	</div>
		    </li>

		    <?php foreach($teacher_array as $teacher): ?>

			   <ul class="menu2" id="menu2">
			      <li class="menu__item2"><a class="menu__link2" href="../controller/perfil_profesor.controller.php?id=<?php echo $teacher['id_profesores'] ?>&photo_perfil=<?php echo $teacher['photo_perfil']; ?>&name=<?php echo $teacher['name']; ?>&last_name=<?php echo $teacher['last_name']; ?>&phone=<?php echo $teacher['phone']; ?>&mail=<?php echo $teacher['mail']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>"><span class="icon-user"></span> Editar</a></li>
                  <li class="menu__item2"><a class="menu__link2" href="../model/close_session.php"><span class="icon-power-off"></span> Cerrar sesión</a></li>
			   </ul>

			<?php endforeach; ?>
		</ul>
	</nav>

<div class="banner">
	    <ul class="banner-links">
		    <li class="banner__item"><a class="banner__link select" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>">Inicio</a></li>
		    <li class="banner__item"><a class="banner__link" href="../controller/alumnos_registrados.controller.php?id=<?php echo $_GET['id']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>">Alumnos</a></li>
	    </ul>
</div>

	<form class="form-update" action="" method="POST" enctype="multipart/form-data">
		<h2 class="form-update-title">Editar tarea</h2>
		<label for="title">Titulo:</label><br>
		<input type="text" name="title" placeholder="Escribe el titulo..." value="<?php echo $_GET['title']; ?>"><br>

		<?php

		if (!empty($errors['title'])) {
			echo "<p class='error'>" . $errors['title'] . "</p>";
		}

		?>
		
		<label for="commenter">Mensaje:</label><br>
		<textarea name="commenter" placeholder="Escribe un mensaje..."><?php echo $_GET['commenter']; ?></textarea><br>
		
		<label for="link">Link de YouTube:</label><br>
		<input type="text" name="link" placeholder="Pega aqui la URL de un video de YouTube..." value="<?php echo $_GET['link']; ?>"><br>

		<label for="video" class="video">Video</label><br>
		<input id="video" type="file" name="video"><br>

		<?php

		if (!empty($errors['video_type'])) {
			echo "<p class='error'>" . $errors['video_type'] . "</p>";
		}

		if (!empty($errors['video_size'])) {
			echo "<p class='error'>" . $errors['video_size'] . "</p>";
		}

		?>

		<label for="img" class="img">Imagen</label><br>
		<input id="img" type="file" name="img"><br>

		<?php
		
		if (!empty($errors['image_type'])) {
			echo "<p class='error'>" . $errors['image_type'] . "</p>";
		}

		if (!empty($errors['image_size'])) {
			echo "<p class='error'>" . $errors['image_size'] . "</p>";
		}

		?>

		<label for="audio" class="audio">Audio</label><br>
		<input id="audio" type="file" name="audio"><br>

		<?php

		if (!empty($errors['audio_type'])) {
			echo "<p class='error'>" . $errors['audio_type'] . "</p>";
		}

		if (!empty($errors['audio_size'])) {
			echo "<p class='error'>" . $errors['audio_size'] . "</p>";
		}

		?>

		<label for="pdf" class="pdf">PDF</label><br>
		<input id="pdf" type="file" name="pdf"><br>

		<?php

		if (!empty($errors['pdf_type'])) {
			echo "<p class='error'>" . $errors['pdf_type'] . "</p>";
		}

		if (!empty($errors['pdf_size'])) {
			echo "<p class='error'>" . $errors['pdf_size'] . "</p>";
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

		<input type="submit" name="btn-update" value="Actualizar">

	</form>

    <footer class="footer-content">
    	<p class="footer-content-p">&copy; Escuela Secundaria Técnica N° 129 | Reservados todos los derechos</p>
    </footer>
</div>
</div>

    <script type="text/javascript" src="../js/menu.js"></script>
    <script type="text/javascript" src="../js/modal.js"></script>
    <script type="text/javascript" src="../js/submenu.js"></script>
    <script type="text/javascript" src="../js/open.js"></script>
    <script type="text/javascript" src="../js/open_group.js"></script>
</body>
</html>