<?php
require("registro.objetos.php");

class Registro {
	private $errores = array();

	public function insertForm() {
		ob_start();

		$error_name = '';
		$error_last_name = '';
		$error_age = '';
		$error_sex = '';
		$error_grado = '';
		$error_grupo = '';
		$error_direction = '';
		$error_mail = '';
		$error_mail_validate = '';
		$error_mail_exist = '';
		$error_password = '';
		$error_password2 = '';
		$error_password_characters = '';
		$error_password_confirm = '';

		if (isset($_POST['btn-form']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$objetos = new Registro_Objetos();
			
			$objetos->setPerfil(htmlentities(addslashes($_POST['perfil'])), ENT_QUOTES);
			$objetos->setName(htmlentities(addslashes($_POST['name']), ENT_QUOTES));
			$objetos->setLast_name(htmlentities(addslashes($_POST['last_name']), ENT_QUOTES));
			$objetos->setAge(htmlentities(addslashes($_POST['age']), ENT_QUOTES));
			$objetos->setSex(htmlentities(addslashes($_POST['sex']), ENT_QUOTES));
			$grado = substr($_POST['grado'], 0,1);
			$grupo = strtolower($_POST['grupo']);
			$objetos->setDirection(htmlentities(addslashes($_POST['direction']), ENT_QUOTES));
			$objetos->setPhone(htmlentities(addslashes($_POST['phone']), ENT_QUOTES));
			$objetos->setMail(htmlentities(addslashes($_POST['mail']), ENT_QUOTES));
			$objetos->setPassword(htmlentities(addslashes($_POST['password']), ENT_QUOTES));

			$pass_cifrado = password_hash($objetos->getPassword(), PASSWORD_DEFAULT, array('cost'=>12));
			
			$password2 = htmlentities(addslashes($_POST['password2']), ENT_QUOTES);
			$rol_id = $_POST['rol_id'];

			if ($objetos->getName() == '') {
				$error_name = 'Por favor escribe tu nombre';
			}

			if ($objetos->getLast_name() == '') {
				$error_last_name = 'Por favor escribe tu apellido';
			}

			if ($objetos->getAge() == '') {
				$error_age = 'Por favor selecciona tu edad';
			}

			if ($objetos->getSex() == '') {
				$error_sex = 'Por favor selecciona tu sexo';
			}

			if (empty($grado)) {
				$error_grado = 'Selecciona tu grado';
			}

			if (empty($grupo)) {
				$error_grupo = 'Selecciona tu grupo';
			}

			if ($objetos->getDirection() == '') {
				$error_direction = 'Por favor escribe tu dirección';
			}

			if ($objetos->getMail() == '') {
				$error_mail = 'Por favor escribe tu dirección de correo';
			} else {
				require_once("conectar.php");
				$conn=Conectar::conexion();

				$sql = "SELECT * FROM alumnos WHERE EMAIL = :mail";
                $statements = $conn->prepare($sql);
                $statements->bindValue(":mail",$objetos->getMail());
                $statements->execute();

                if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	                if ($registro['email'] == $objetos->getMail()) {
		                $error_mail_exist = 'El correo ya existe en la base de datos';
	                }
                }

				#if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				#	$error_mail_validate = 'Por favor ingresa un correo valido';
				#}
			}

			if ($objetos->getPassword() == '') {
				$error_password = 'Por favor escribe una contraseña';
			}

			if (empty($password2)) {
				$error_password2 = 'Por favor confirma tu contraseña';
			}

			if (strlen($objetos->getPassword()) > 0 AND strlen($objetos->getPassword()) < 8) {
				$error_password_characters = 'La contraseña debe tener por lo menos 8 caracteres';
			} elseif ($objetos->getPassword() != $password2) {
				$error_password_confirm = 'Las contraseñas no coinciden';
			}

			if (empty($error_name) && empty($error_last_name) && empty($error_age) && empty($error_sex) && empty($error_grado) && empty($error_grupo) && empty($error_direction) && empty($error_mail) && empty($error_mail_validate) && empty($error_mail_exist) && empty($error_password) && empty($error_password2) && empty($error_password_confirm) && empty($error_password_characters)) {

				require_once("conectar.php");
				$conn=Conectar::conexion();

				$random = uniqid();

				#header('Refresh: 10; URL=../index.php');
				#echo "Felicidades " . $objetos->getName() . " te haz registrado correctamente, te hemos enviamos un email de confirmación";

				$sql = "INSERT INTO alumnos (avatar,name,last_name,age,sex,direction,phone,email,password,verify_mail,code,grado,grupo,rol_id) VALUES (:avatar,:name,:last_name,:age,:sex,:direction,:phone,:email,:password,:verify_mail,:code,:grado,:grupo,:rol_id)";
				$statements = $conn->prepare($sql);

				$statements->bindValue(":avatar", $objetos->getPerfil());
				$statements->bindValue(":name", $objetos->getName());
				$statements->bindValue(":last_name", $objetos->getLast_name());
				$statements->bindValue(":age", $objetos->getAge());
				$statements->bindValue(":sex", $objetos->getSex());
				$statements->bindValue(":direction", $objetos->getDirection());
				$statements->bindValue(":phone", $objetos->getPhone());
				$statements->bindValue(":email", $objetos->getMail());
				$statements->bindValue(":password", $pass_cifrado);
				$statements->bindValue(":verify_mail", 0);
				$statements->bindValue(":code", $random);
				$statements->bindValue(":grado", $grado);
				$statements->bindValue(":grupo", $grupo);
				$statements->bindValue(":rol_id", $rol_id);

				$statements->execute();

				$mail_to = $objetos->getMail();
				$mail_subject = "Confirma tu dirección de correo | EST N° 129";
				$mail_from = "reply.est129.ga/";

				$mail_msg .= "Hola ".$objetos->getName().", para poder usar nuestra página web debes confirmar tu dirección de correo electronico. \n\n";
				$mail_msg .= "Ingresa el siguiente código para confirmar tu email:\n\n";
				$mail_msg .= "Código: " . $random;

				$headers = "From: " . $mail_from . "\r\n".
				"Reply-To: " . $mail_from . "\r\n".
				"X-Mailer: PHP/" . phpversion();
				mail($mail_to, $mail_subject, $mail_msg, $headers);

				header('Location: ../view/email_confirm.php');
			}
		}

		return $errores[] = array("name"=>$error_name,"last_name"=>$error_last_name,"age"=>$error_age,"sex"=>$error_sex,"grado"=>$error_grado,"grupo"=>$error_grupo,"direction"=>$error_direction,"mail"=>$error_mail,"mail_validate"=>$error_mail_validate,"mail_exist"=>$error_mail_exist,"password"=>$error_password,"password2"=>$error_password2,"password_characters"=>$error_password_characters,"password_confirm"=>$error_password_confirm);
		ob_end_flush();
	}
}

?>