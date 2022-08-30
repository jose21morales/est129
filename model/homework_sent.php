<?php
		
		require_once("model/conectar.php");
		$base = Conectar::conexion();

		$homework_send = [];

		$sql="SELECT * FROM get_homework WHERE HOMEWORK_ID = :id AND GRADO = :grado AND GRUPO = :grupo ORDER BY ID DESC";
		$statements = $base->prepare($sql);
		$statements->bindValue(":id", $homework['id']);
		$statements->bindValue(":grado", $grado);
		$statements->bindValue(":grupo", $grupo);
		$statements->execute();

		while ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
			$homework_send[] = $registro;
		}

?>