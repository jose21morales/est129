<?php
require_once("conectar.php");
$conn=Conectar::conexion();

$post_por_pagina=2;

if (isset($_GET['pagina'])) {
	if ($_GET['pagina']>1) {
		$pagina=$_GET['pagina'];
	} else {
		$pagina=1;
	}
} else {
	$pagina=1;
}

$empesar_desde=($pagina-1)*$post_por_pagina;

$sql="SELECT*FROM homeworks WHERE GRADO=:grado AND GRUPO=:grupo";
$statements=$conn->prepare($sql);
$statements->execute(array(':grado'=>$grado,':grupo'=>$grupo));
$num_registros=$statements->rowCount();
$total_paginas=ceil($num_registros / $post_por_pagina);

?>