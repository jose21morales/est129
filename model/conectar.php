<?php

class Conectar {
	private $conexion;

	public static function conexion() {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=est129','root','system456');
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->exec('SET CHARACTER SET UTF8');

			return $conexion;
			
		} catch (Exception $e) {
			die("Error: " . $e->getMessage());
			echo "Linea: " . $e->getLine();
		}
	}
}

?>