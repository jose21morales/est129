<?php

class Profesor_datos {

	public function getTeacher($id) {
		require_once("conectar.php");
		$conn=Conectar::conexion();

		$teachers=[];

		$sql="SELECT * FROM profesores WHERE ID_PROFESORES = :id";
		$statements=$conn->prepare($sql);
		$statements->execute([':id'=>$id]);
		while ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
			$teachers[]=$registro;
		}

		return $teachers;
	}

	public function alumnosRegistrados($grado, $grupo) {
		require_once("conectar.php");
		$base = Conectar::conexion();

		$array = [];

		$sql = "SELECT * FROM alumnos WHERE grado = :grado AND grupo = :grupo";
		$statements = $base->prepare($sql);
		$statements->bindValue(":grado", $grado);
		$statements->bindValue(":grupo", $grupo);
		$statements->execute();

		while ($row = $statements->fetch(PDO::FETCH_ASSOC)) {
			$array[] = $row;
		}

		return $array;
	}
}

?>