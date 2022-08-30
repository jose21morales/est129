<?php

class Profesor {

	public function getHomework($grado,$grupo) {
		require("paginacion.php");
		require_once("conectar.php");
        $conn=Conectar::conexion();

		$homework=array();

		$sql="SELECT * FROM homeworks WHERE GRADO = :grado AND GRUPO = :grupo ORDER BY ID DESC LIMIT $empesar_desde, $post_por_pagina";
		$statements=$conn->prepare($sql);
		$statements->execute(array(':grado'=>$grado,':grupo'=>$grupo));
		while($registro=$statements->fetch(PDO::FETCH_ASSOC)){
			$homework[]=$registro;
		}

		return $homework;
	}

	public function getTeacher($id) {
		require_once("conectar.php");
		$conn=Conectar::conexion();

		$teachers=array();

		$sql="SELECT * FROM profesores WHERE ID_PROFESORES = :id";
		$statements=$conn->prepare($sql);
		$statements->execute([':id'=>$id]);
		while ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
			$teachers[]=$registro;
		}

		return $teachers;
	}

	public function getTeacherUpdate() {
		require_once("conectar.php");
		$conn=Conectar::conexion();

		$errors = array();

		$error_image_size = '';
		$error_image_type = '';

		$error_name = '';
		$error_last_name = '';
		$error_phone = '';
		$error_mail = '';

		if (isset($_POST['btn-update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id=$_POST['id'];
			$image_perfil_name = $_FILES['image_perfil']['name'];
			$image_perfil_type = $_FILES['image_perfil']['type'];
			$image_perfil_size = $_FILES['image_perfil']['size'];

			$name = htmlentities(addslashes($_POST['name']), ENT_QUOTES);
			$last_name = htmlentities(addslashes($_POST['last_name']), ENT_QUOTES);
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
			if (empty($mail)) {
				$error_mail = 'Por favor escribe tu correo';
			}

			if (empty($error_image_size) && empty($error_image_type) && empty($error_name) && empty($error_last_name) && empty($error_phone) && empty($error_mail)) {

		        $sql = "UPDATE profesores SET PHOTO_PERFIL = :photo_perfil, NAME = :name, LAST_NAME = :last_name, PHONE = :phone, MAIL = :mail WHERE ID_PROFESORES = :id";
		        $statements = $conn->prepare($sql);
		        $statements->bindValue(":id", $id);
		        $statements->bindValue(":photo_perfil", $image_perfil_name);
		        $statements->bindValue(":name", $name);
		        $statements->bindValue(":last_name", $last_name);
		        $statements->bindValue(":phone", $phone);
		        $statements->bindValue(":mail", $mail);
		        $statements->execute();

		        header('Location: ../index.php?id='.$_GET['id'].'&grado='.$_GET['grado'].'&grupo='.$_GET['grupo']);
			}

		}

		return $errors[] = ['image_size'=>$error_image_size,'image_type'=>$error_image_type,'name'=>$error_name,'last_name'=>$error_last_name,'phone'=>$error_phone,'mail'=>$error_mail];
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

			$pass_cifrado = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

			if (empty($password_actual)) {
				$errors['password_actual'] = 'Escribe la contraseña actual';
			} else {

		        $sql = "SELECT password FROM profesores WHERE id_profesores = :id";
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
			    $sql = "UPDATE profesores SET password = :password WHERE id_profesores = :id";
			    $resultado = $conn->prepare($sql);
			    $resultado->bindValue(":password", $pass_cifrado);
			    $resultado->bindValue(":id", $id);
			    $resultado->execute();

			    header('Location:../index.php?id='.$_GET['id'].'&grado='.$_GET['grado'].'&grupo='.$_GET['grupo']);
		    }
	    }

	    return $errors;
	}
}

?>