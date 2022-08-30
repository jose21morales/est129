<?php

class Alumno_datos {
	private $datos_alumnos = array();

	public function datosAlumnos($id) {
		require_once("../model/conectar.php");
	    $conn=Conectar::conexion();
	    $sql="SELECT * FROM alumnos WHERE id_alumnos=:id";
	    $statements=$conn->prepare($sql);
	    $statements->bindValue(':id',$id);
	    $statements->execute();
	    
	    while($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	       $datos_alumnos[] = $registro;
        }

        return $datos_alumnos;
	}
}

?>