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
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/alumno.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/perfil_alumno.password.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">
</head>
<body>

	<div class="header">
        <h2 class="left header-hello">Hola <?php echo $_GET['name']; ?></h2>
        <h2 class="right header-grado_grupo"><?php echo strtoupper($_GET['grado'] . "° " .$_GET['grupo']); ?></h2>

  	    <!--<h2 class="right"><?php #echo strtoupper(substr($grado_grupo, 0,1)."° ".substr($grado_grupo, 1,1)); ?></h2>-->
	</div>

	<div class="est">
		<img class="est-logo" src="../img/favicon.jpg">
		<p class="est-txt">Escuela Secundaria Técnica N° 129</p>
	</div>

	<nav class="nav">
	    <h3 class="logo">Aprende en casa</h3>
	    <span class="icon-bars" id="btnmenu"></span>
	    <ul class="menu" id="menu">
		    <li class="menu__item" id="menu-item">
		    	<div class="menu-perfil">
		    	<?php if($_GET['avatar'] != ''){ ?>

		    	  <img class="menu-perfil-img" src="../img/<?php echo $_GET['avatar']; ?>">
		    	
		    	<?php } elseif ($_GET['avatar'] == '' && $_GET['sex'] == 'h') { ?>
		    	
		    	  <img class="menu-perfil-img" src="../img/avatar-h.png">
		        
		        <?php } elseif ($_GET['avatar'] == '' && $_GET['sex'] == 'm') { ?>

		        	<img class="menu-perfil-img" src="../img/avatar-m.png">

		        <?php } ?>
		        
		    	  <?php echo "<p class='menu-perfil-p'>".$_GET['email']."</p>"; ?>
		    	</div>
		    </li>

			    <ul class="menu2" id="menu2">
			    	<li class="menu__item2"><a class="menu__link2" href=""><span class="icon-user"></span> Editar</a></li>
				    <li class="menu__item2"><a class="menu__link2" href="../model/close_session.php"><span class="icon-power-off"></span> Cerrar sesión</a></li>
			    </ul>
		</ul>
    </nav>
 
<div class="banner">
	    <ul class="banner-links">
		    <li class="banner__item"><a class="banner__link select" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>">Inicio</a></li>
		    <li class="banner__item"><a class="banner__link banner__link-left-covid" href="../controller/covid.controller.php?id=<?php echo $_GET['id']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>">Covid-19</a></li>
	    </ul>
</div>
