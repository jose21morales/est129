<?php

class Alumno {
	private $datos_alumnos = array();

	public function datosAlumnos($id) {
		require_once("model/conectar.php");
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

	public function getHomework($grado,$grupo){
		require_once("model/conectar.php");
	    $conn=Conectar::conexion();

	    require("model/paginacion.php");
	    
	    $homework=array();
		
		$sql="SELECT*FROM homeworks WHERE GRADO = :grado AND GRUPO = :grupo ORDER BY DATE_HW DESC LIMIT $empesar_desde, $post_por_pagina";
		$statements=$conn->prepare($sql);
		$statements->bindValue(":grado",$grado);
		$statements->bindValue(":grupo",$grupo);
		$statements->execute();

		while($registro=$statements->fetch(PDO::FETCH_ASSOC)) {

	       $homework[] = $registro;
        }

        return $homework;
	}

	public function getAlumnoUpdate() {
		require_once("conectar.php");
		$conn=Conectar::conexion();

		$errors = array();

		$error_image_size = '';
		$error_image_type = '';

		$error_name = '';
		$error_last_name = '';
		$error_age = '';
		$error_sex = '';
		$error_grado = '';
		$error_grupo = '';
		$error_direction = '';
		$error_phone = '';
		$error_mail = '';

		if (isset($_POST['btn-update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id=$_POST['id'];
			$image_perfil_name = $_FILES['image_perfil']['name'];
			$image_perfil_type = $_FILES['image_perfil']['type'];
			$image_perfil_size = $_FILES['image_perfil']['size'];

			$name = htmlentities(addslashes($_POST['name']), ENT_QUOTES);
			$last_name = htmlentities(addslashes($_POST['last_name']), ENT_QUOTES);
			$age = $_POST['age'];
			$sex = strtolower($_POST['sex']);
			$grado = strtolower(substr($_POST['grado'], 0,1));
			$grupo = strtolower($_POST['grupo']);
			$direction = htmlentities(addslashes($_POST['direction']), ENT_QUOTES);
			$phone = htmlentities(addslashes($_POST['phone']), ENT_QUOTES);
			$mail = htmlentities(addslashes($_POST['mail']), ENT_QUOTES);

			if ($image_perfil_size <= 1000000) {
				if ($image_perfil_type == 'image/jpg' || $image_perfil_type == 'image/jpeg' || $image_perfil_type == 'image/png' || $image_perfil_type == 'image/gif' || $image_perfil_type == '') {

					$folder_fate = $_SERVER['DOCUMENT_ROOT'] . '/EST129/img/';

					move_uploaded_file($_FILES['image_perfil']['tmp_name'], $folder_fate . $image_perfil_name);
				} else {
					$error_image_type = 'El archivo elegido no es una imagen';
				}
			} else {
				$error_image_size = 'El tamaño de la imagen excede 1 MB';
			}

			if (empty($name)) {
				$error_name = 'Por favor escribe tu nombre';
			}
			if (empty($last_name)) {
				$error_last_name = 'Por favor escribe tu apellido';
			}
			if (empty($age)) {
				$error_age = 'Por favor escribe tu edad';
			}
			if (empty($sex)) {
				$error_sex = 'Por favor selecciona tu sexo';
			}
			if (empty($grado)) {
				$error_grado = 'Por favor selecciona tu grado';
			}
			if (empty($grupo)) {
				$error_grupo = 'Por favor selecciona tu grupo';
			}
			if (empty($direction)) {
				$error_direction = 'Por favor escribe tu dirección';
			}
			if (empty($mail)) {
				$error_mail = 'Por favor escribe tu correo';
			}

			if (empty($error_image_size) && empty($error_image_type) && empty($error_name) && empty($error_last_name) && empty($error_age) && empty($error_sex) && empty($error_grado) && empty($error_grupo) && empty($error_direction) && empty($error_phone) && empty($error_mail)) {

		        $sql = "UPDATE alumnos SET AVATAR = :avatar, NAME = :name, LAST_NAME = :last_name, AGE = :age, SEX = :sex, DIRECTION = :direction, PHONE = :phone, EMAIL = :mail WHERE ID_ALUMNOS = :id";
		        $statements = $conn->prepare($sql);
		        $statements->bindValue(":id", $id);
		        $statements->bindValue(":avatar", $image_perfil_name);
		        $statements->bindValue(":name", $name);
		        $statements->bindValue(":last_name", $last_name);
		        $statements->bindValue(":age", $age);
		        $statements->bindValue(":sex", $sex);
		        $statements->bindValue(":direction", $direction);
		        $statements->bindValue(":phone", $phone);
		        $statements->bindValue(":mail", $mail);
		        $statements->execute();

		        $sql = "UPDATE get_homework SET photo_perfil = :photo_perfil, name = :name, last_name = :last_name, mail = :mail WHERE alumnos_id = :id";
		        $statements = $conn->prepare($sql);
		        $statements->bindValue(":id", $id);
		        $statements->bindValue(":photo_perfil", $image_perfil_name);
		        $statements->bindValue(":name", $name);
		        $statements->bindValue(":last_name", $last_name);
		        $statements->bindValue(":mail", $mail);
		        $statements->execute();

		        header('Location: ../index.php?id='.$_GET['id'].'&grado='.$_GET['grado'].'&grupo='.$_GET['grupo']);
			}

		}

		return $errors[] = ['image_size'=>$error_image_size,'image_type'=>$error_image_type,'name'=>$error_name,'last_name'=>$error_last_name,'age'=>$error_age,'sex'=>$error_sex,'grado'=>$error_grado,'grupo'=>$error_grupo,'direction'=>$error_direction,'phone'=>$error_phone,'mail'=>$error_mail];
	}

	public function getPasswordUpdate() {
		require_once("conectar.php");
		$conn=Conectar::conexion();

		$errors = [];
		$count = 0;

	if (isset($_POST['btn-password']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

		$id = $_POST['id'];
		$password_actual = htmlentities(addslashes($_POST['password_actual']), ENT_QUOTES);
	    $password = htmlentities(addslashes($_POST['password']), ENT_QUOTES);
		$password2 = htmlentities(addslashes($_POST['password2']), ENT_QUOTES);

		$pass_cifrado = password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);

		if (empty($password_actual)) {
			$errors['password_actual'] = 'Escribe tu contraseña actual';
		} else {

		    $sql = "SELECT password FROM alumnos WHERE id_alumnos = :id";
		    $statements = $conn->prepare($sql);
		    $statements->bindValue(":id", $id);
		    $statements->execute();

		    if ($row = $statements->fetch(PDO::FETCH_ASSOC)) {
			    if (password_verify($password_actual, $row['password'])) {
			    	$count++;
			    }
		    }
		    
			if ($count == 0) {
				$errors['password_actual-error'] = 'La contraseña es incorrecta';
			}
		}

		if (empty($password)) {
			$errors['password'] = 'Escribe tu contraseña';
		}
		if (empty($password2)) {
			$errors['password2'] = 'Confirma tu contraseña';
		}
		if (strlen($password) > 0 && strlen($password) < 8) {
			$errors['password_characters'] = 'Tu contraseña debe tener un minimo de 8 caracteres';
		} elseif ($password != $password2) {
			$errors['password_confirm'] = 'Las contraseñas no coinciden';
		}

		if (empty($errors)) {
			$sql = "UPDATE alumnos SET password = :password WHERE id_alumnos = :id";
			$resultado = $conn->prepare($sql);
			$resultado->bindValue(":password", $pass_cifrado);
			$resultado->bindValue(":id", $id);
			$resultado->execute();

			header('Location:../index.php?id='.$_GET['id'].'&grado='.$_GET['grado'].'&grupo='.$_GET['grupo']);
		}
	}

		return $errors;
	}

	public function insertHomework() {
		require_once("conectar.php");
		$base=Conectar::conexion();

		$errors = [];

		if (isset($_POST['btn-hw']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id=$_POST['id'];
			$avatar=$_POST['avatar'];
			$name=$_POST['name'];
			$last_name=$_POST['last_name'];
			$sex=$_POST['sex'];
			$mail=$_POST['mail'];
			$month = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
			$date_send = date('d') . " de " . $month[date('m')-1] . " de " . date('Y') . " " . date('H:i:s');
			$homework_id=$_POST['homework_id'];
			$commenter = htmlentities(addslashes($_POST['commenter']), ENT_QUOTES);
			$files_name = $_FILES['pdf']['name'];
			$files_type = $_FILES['pdf']['type'];
			$files_size = $_FILES['pdf']['size'];
			$grado=$_POST['grado'];
			$grupo=$_POST['grupo'];

			if ($files_size <= 20000000) {
				if ($files_type == 'video/mp4' || $files_type == 'audio/mpeg' || $files_type == 'image/jpg' || $files_type == 'image/jpeg' || $files_type == 'image/png' || $files_type == 'image/gif' || $files_type == '' || $files_type == 'application/pdf' || $files_type == 'application/msword' || $files_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $files_type == 'application/msaccess' || $files_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $files_type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation') {

					$folder_fate = "files/";

					$file = $folder_fate . basename($_FILES['pdf']['name']);

					move_uploaded_file($_FILES['pdf']['tmp_name'], $file);
				} else {
					$errors['image_type'] = 'El archivo elegido no esta permitido';
				}
			} else {
				$errors['image_size'] = 'El tamaño de la imagen excede 20 MB';
			}

			if (empty($_FILES['pdf']['tmp_name'])) {
				$errors['image_empty'] = 'Por favor selecciona un archivo';
			}

			if (empty($errors['image_type']) && empty($errors['image_size']) && empty($errors['image_empty'])) {

				$sql="INSERT INTO get_homework (alumnos_id,photo_perfil,name,last_name,sex,mail,date_send,homework_id,commenter,files,grado,grupo) VALUES (:alumnos_id,:avatar,:name,:last_name,:sex,:mail,:date_send,:homework_id,:commenter,:files,:grado,:grupo)";
				$statements=$base->prepare($sql);
				$statements->bindValue(":alumnos_id", $id);
				$statements->bindValue(":avatar", $avatar);
				$statements->bindValue(":name", $name);
				$statements->bindValue(":last_name", $last_name);
				$statements->bindValue(":sex", $sex);
				$statements->bindValue(":mail", $mail);
				$statements->bindValue(":date_send", $date_send);
				$statements->bindValue(":homework_id", $homework_id);
				$statements->bindValue(":commenter", $commenter);
				$statements->bindValue(":files", $files_name);
				$statements->bindValue(":grado", $grado);
				$statements->bindValue(":grupo", $grupo);
				$statements->execute();

			}
		}
		return $errors;
	}

	public function getHomeworkSend($mail, $id) {
		$base=Conectar::conexion();
		$validar=false;

		$sql = "SELECT * FROM get_homework WHERE MAIL = :mail AND HOMEWORK_ID = :id";
		$statements = $base->prepare($sql);
		$statements->bindValue(":mail", $mail);
		$statements->bindValue(":id", $id);
		$statements->execute();

		if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
			if ($registro['mail'] == $mail && $registro['homework_id'] == $id) {
				return $validar = true;
			}
		}
	}
}

?>