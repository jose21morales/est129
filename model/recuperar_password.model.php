<?php

class Recupera_Password {

	public function getPassword() {
		require_once("conectar.php");
		$base = Conectar::conexion();

		$errors = array();
		$msg = array();

		if (isset($_POST['btn-mail']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$mail = htmlentities(addslashes($_POST['mail']), ENT_QUOTES);

			if (empty($mail)) {
				$errors['mail'] = 'Por favor escribe tu dirección de correo electronico';
			} else {
				// Profesores
				$sql_prof = "SELECT MAIL FROM profesores WHERE MAIL = :mail";
                $statements_prof = $base->prepare($sql_prof);
                $statements_prof->bindValue(":mail",$mail);
                $statements_prof->execute();

                $num_profesor = $statements_prof->rowCount();
                
				// Alumnos
				$sql_alum = "SELECT EMAIL FROM alumnos WHERE EMAIL = :email";
                $statements_alum = $base->prepare($sql_alum);
                $statements_alum->bindValue(":email",$mail);
                $statements_alum->execute();

                $num_alumno = $statements_alum->rowCount();

                if ($num_profesor == 0 && $num_alumno == 0) {
               	    $errors['mail_not_exist'] = 'El correo no existe en la base de datos';
                }
			}

			if (empty($errors['mail']) && empty($errors['mail_not_exist'])) {

				$token = uniqid();

				$sql = "UPDATE profesores SET token = :token WHERE mail = :mail";
				$statements = $base->prepare($sql);
				$statements->bindValue(":token",$token);
				$statements->bindValue(":mail",$mail);
				$statements->execute();

				$sql = "UPDATE alumnos SET token = :token WHERE email = :email";
				$statements = $base->prepare($sql);
				$statements->bindValue(":token",$token);
				$statements->bindValue(":email",$mail);
				$statements->execute();

				// Devuelve el nombre

				$sql="SELECT NAME FROM profesores WHERE MAIL = :mail";
				$resultado_prof = $base->prepare($sql);
				$resultado_prof->bindValue(":mail",$mail);
				$resultado_prof->execute();

				$sql="SELECT NAME FROM alumnos WHERE EMAIL = :email";
				$resultado_alum = $base->prepare($sql);
				$resultado_alum->bindValue(":email",$mail);
				$resultado_alum->execute();

				$registro_prof = $resultado_prof->fetch(PDO::FETCH_ASSOC);
				$registro_alum = $resultado_alum->fetch(PDO::FETCH_ASSOC);
				
				$mail_to = $mail;
				$mail_subject = 'Cambio de contraseña';

				$mail_msg = "Hola " . $registro_prof['name'] . $registro_alum['name'] . " haz solicitado cambiar tu contraseña, ingresa al siguiente link.\n";
				$mail_msg .= "https://www.est129.ga/view/new_password.view.php?mail=$mail&token=$token";
				
				$headers = "From: www.est129.ga/" . "\r\n" .
				"Reply-To: www.est129.ga/" . "\r\n" .
				"X-Mailer: PHP/" . phpversion();

				mail($mail_to, $mail_subject, $mail_msg, $headers);
				#header('Refresh: 2; URL=../index.php');
				echo "<p class='msg'>Te hemos enviado un mensaje para restablecer tu contraseña</p>";

			}

			
		}

		return $errors;
	}
}

?>