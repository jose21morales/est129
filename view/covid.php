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
	<link rel="stylesheet" type="text/css" href="../css/covid.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">
</head>
<body class="covid-body">

	<?php
    	foreach ($datos_alumnos as $datos) {		
	?>
	<div class="header">
        <h2 class="left header-hello">Hola <?php echo $datos['name']; ?></h2>
        <h2 class="right header-grado_grupo"><?php echo strtoupper($grado . "° " .$grupo); ?></h2>

  	    <!--<h2 class="right"><?php #echo strtoupper(substr($grado_grupo, 0,1)."° ".substr($grado_grupo, 1,1)); ?></h2>-->
	</div>

	<div class="est">
		<img class="est-logo" src="../img/favicon.jpg">
		<p class="est-txt">Escuela Secundaria Técnica N° 129</p>
	</div>


	<?php
    }
	?>

	<?php
    	foreach ($datos_alumnos as $datos) {		
	?>

	<nav class="nav">
	    <h3 class="logo">Aprende en casa</h3>
	    <span class="icon-bars" id="btnmenu"></span>
	    <ul class="menu" id="menu">
		    <li class="menu__item" id="menu-item">
		    	<div class="menu-perfil">
		    	<?php if($datos['avatar'] != ''){ ?>

		    	  <img class="menu-perfil-img" src="../img/<?php echo $datos['avatar']; ?>">
		    	
		    	<?php } elseif ($datos['avatar'] == '' && $datos['sex'] == 'h') { ?>
		    	
		    	  <img class="menu-perfil-img" src="../img/avatar-h.png">
		        
		        <?php } elseif ($datos['avatar'] == '' && $datos['sex'] == 'm') { ?>

		        	<img class="menu-perfil-img" src="../img/avatar-m.png">

		        <?php } ?>

		    	  <?php echo "<p class='menu-perfil-p'>".$datos['email']."</p>"; ?>
		    	</div>
		    </li>

			    <ul class="menu2" id="menu2">
			    	<li class="menu__item2"><a class="menu__link2" href="../controller/perfil_alumno.controller.php?id=<?php echo $id; ?>&avatar=<?php echo $datos['avatar']; ?>&name=<?php echo $datos['name']; ?>&last_name=<?php echo $datos['last_name']; ?>&age=<?php echo $datos['age']; ?>&sex=<?php echo $datos['sex']; ?>&direction=<?php echo $datos['direction']; ?>&phone=<?php echo $datos['phone']; ?>&email=<?php echo $datos['email']; ?>&grado=<?php echo $grado; ?>&grupo=<?php echo $grupo; ?>"><span class="icon-user"></span> Editar</a></li>
				    <li class="menu__item2"><a class="menu__link2" href="../model/close_session.php"><span class="icon-power-off"></span> Cerrar sesión</a></li>
			    </ul>
		</ul>
    </nav>

<?php
}
?>

<div class="banner">
	    <ul class="banner-links">
		    <li class="banner__item"><a class="banner__link banner__link-right-inicio" href="../index.php?id=<?php echo $_GET['id']; ?>&grado=<?php echo $_GET['grado']; ?>&grupo=<?php echo $_GET['grupo']; ?>">Inicio</a></li>
		    <li class="banner__item"><a class="banner__link select gray" href="">Covid-19</a></li>
	    </ul>
</div>

<div class="covid-container">
	<div class="covid-content">
        <h1 class="covid-title-h1">Medidas de protección básicas contra el nuevo coronavirus</h1>
    
        <p class="covid-txt">Manténgase al día de la información más reciente sobre el brote de COVID-19, a la que puede acceder en el sitio web de la OMS y a través de las autoridades de salud pública pertinentes a nivel nacional y local. La mayoría de las personas que se infectan padecen una enfermedad leve y se recuperan, pero en otros casos puede ser más grave. Cuide su salud y proteja a los demás a través de las siguientes medidas:</p>

        <br><br>

        <h3 class="covid-title">Lávese las manos frecuentemente</h3>
    
        <p class="covid-txt">Lávese las manos con frecuencia con un desinfectante de manos a base de alcohol o con agua y jabón.
        <br><br><b>¿Por qué?</b> Lavarse las manos con un desinfectante a base de alcohol o con agua y jabón mata el virus si este está en sus manos.
        </p>
	</div>

	<div class="covid-content">
        <h3 class="covid-title">Adopte medidas de higiene respiratoria</h3>
    
        <p class="covid-txt">Al toser o estornudar, cúbrase la boca y la nariz con el codo flexionado o con un pañuelo; tire el pañuelo inmediatamente y lávese las manos con un desinfectante de manos a base de alcohol, o con agua y jabón.
        <br><br><b>¿Por qué?</b> Al cubrir la boca y la nariz durante la tos o el estornudo se evita la propagación de gérmenes y virus. Si usted estornuda o tose cubriéndose con las manos puede contaminar los objetos o las personas a los que toque.
        </p>	
	</div>

	<div class="covid-content">
        <h3 class="covid-title">Mantenga el distanciamiento social</h3>
    
        <p class="covid-txt">Mantenga al menos 1 metro (3 pies) de distancia entre usted y las demás personas, particularmente aquellas que tosan, estornuden y tengan fiebre.
        <br><br><b>¿Por qué?</b> Cuando alguien con una enfermedad respiratoria, como la infección por el 2019-nCoV, tose o estornuda, proyecta pequeñas gotículas que contienen el virus. Si está demasiado cerca, puede inhalar el virus.
        </p>
	</div>

	<div class="covid-content">
        <h3 class="covid-title">Evite tocarse los ojos, la nariz y la boca</h3>

        <p class="covid-txt"><b>¿Por qué?</b> Las manos tocan muchas superficies que pueden estar contaminadas con el virus. Si se toca los ojos, la nariz o la boca con las manos contaminadas, puedes transferir el virus de la superficie a si mismo.</p>
	</div>

	<div class="covid-content">
        <h3 class="covid-title">Si tiene fiebre, tos y dificultad para respirar, solicite atención médica a tiempo</h3>

        <p class="covid-txt">Indique a su prestador de atención de salud si ha viajado a una zona de China en la que se haya notificado la presencia del 2019-nCoV, o si ha tenido un contacto cercano con alguien que haya viajado desde China y tenga síntomas respiratorios.
        <br><br><b>¿Por qué?</b> Siempre que tenga fiebre, tos y dificultad para respirar, es importante que busque atención médica de inmediato, ya que dichos síntomas pueden deberse a una infección respiratoria o a otra afección grave. Los síntomas respiratorios con fiebre pueden tener diversas causas, y dependiendo de sus antecedentes de viajes y circunstancias personales, el 2019-nCoV podría ser una de ellas.
        </p>
	</div>

	<div class="covid-content">
        <h3 class="covid-title">Manténgase informado y siga las recomendaciones de los profesionales sanitarios</h3>

        <p class="covid-txt">Manténgase informado sobre las últimas novedades en relación con la COVID-19. Siga los consejos de su dispensador de atención de salud, de las autoridades sanitarias pertinentes a nivel nacional y local o de su empleador sobre la forma de protegerse a sí mismo y a los demás ante la COVID-19.
        <br><br><b>¿Por qué?</b> Las autoridades nacionales y locales dispondrán de la información más actualizada acerca de si la COVID-19 se está propagando en su zona. Son los interlocutores más indicados para dar consejos sobre las medidas que la población de su zona debe adoptar para protegerse. 
        </p>
	</div>

	<div class="covid-content">
        <h3 class="covid-title">Medidas de protección para las personas que se encuentran en zonas donde se está propagando la COVID-19 o que las han visitado recientemente (en los últimos 14 días)</h3>

        <p class="covid-txt">
        
        <b>1.-</b> Siga las orientaciones expuestas arriba.
        <br>
    	<b>2.-</b> Permanezca en casa si empieza a encontrarse mal, aunque se trate de síntomas leves como cefalea y rinorrea leve, hasta que se recupere.
        
        <br><b>¿Por qué?</b> Evitar los contactos con otras personas y las visitas a centros médicos permitirá que estos últimos funcionen con mayor eficacia y ayudará a protegerle a usted y a otras personas de posibles infecciones por el virus de la COVID-19 u otros.
        <br><br>

    	<b>1.-</b> Si tiene fiebre, tos y dificultad para respirar, busque rápidamente asesoramiento médico, ya que podría deberse a una infección respiratoria u otra afección grave. Llame con antelación e informe a su dispensador de atención de salud sobre cualquier viaje que haya realizado recientemente o cualquier contacto que haya mantenido con viajeros.

        <br><br><b>¿Por qué?</b> Llamar con antelación permitirá que su dispensador de atención de salud le dirija rápidamente hacia el centro de salud adecuado. Esto ayudará también a prevenir la propagación del virus de la COVID-19 y otros virus.
        </p>

	</div>

</div>


<script type="text/javascript" src="../js/submenu.js"></script>
</body>
</html>