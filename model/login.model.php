<?php
require("login.objetos.php");

class Login {
	private $errors=array();

	public function validaLogin() {

		$error_login_empty='';
		$error_login_incorrect='';

		$contador_profesor = 0;
		$contador_alumno = 0;
	    
		if (isset($_POST['btn-login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	       $objetos=new Login_Objetos();

	       $objetos->setLogin(htmlentities(addslashes($_POST['mail']),ENT_QUOTES));
	       $objetos->setPassword(htmlentities(addslashes($_POST['password']),ENT_QUOTES));

	       if ($objetos->getLogin() == '' || $objetos->getPassword() == '') {
	       	   $error_login_empty='Por favor llene todos los campos';
	       } else {
	       	   require_once("conectar.php");
               $conn=Conectar::conexion();

               // Profesores
               $sql="SELECT * FROM profesores WHERE MAIL=:mail";
               $statements_prof = $conn->prepare($sql);
               $statements_prof->bindValue(":mail", $objetos->getLogin());
               $statements_prof->execute();
	       	   
               // Alumnos
               $sql="SELECT * FROM alumnos WHERE EMAIL=:email";
               $statements_alum = $conn->prepare($sql);
               $statements_alum->bindValue(":email", $objetos->getLogin());
               $statements_alum->execute();

               // Verifica si la contraseña coincide con el correo - Profesor
               // Incrementa la variable
	       	   
               if ($registro_prof=$statements_prof->fetch(PDO::FETCH_ASSOC)) {
	                 if (password_verify($objetos->getPassword(), $registro_prof['password'])) {
	                   $contador_profesor++;
	                 }
               }

               // Verifica si la contraseña coincide con el correo - Alumno
               // Incrementa la variable

               if ($registro_alum=$statements_alum->fetch(PDO::FETCH_ASSOC)) {
	                 if (password_verify($objetos->getPassword(), $registro_alum['password'])) {
	                   $contador_alumno++;
	                 }
               }

               if ($contador_profesor == 0 && $contador_alumno == 0) {
	                $error_login_incorrect='Error. Usuario o contraseña incorrectos';
               }

               // Inicia sesión - Profesor

               if ($contador_profesor == 1) {
	                 session_start();
	                 $_SESSION['usuario'] = $registro_prof['rol_id'];
	                 header("Location:index.php?id=".$registro_prof['id_profesores']."&grado=1&grupo=a");
               }

               // Inicia sesión - Alumno

               if ($contador_alumno == 1) {
               	
               	if ($registro_alum['verify_mail'] == 0) {
               		header('Location:view/email_confirm.php');
               	} else {

	                session_start();
	                $_SESSION['usuario'] = $registro_alum['rol_id'];

	                header("Location:index.php?id=".$registro_alum['id_alumnos']."&grado=".$registro_alum['grado']."&grupo=".$registro_alum['grupo']);
	            }

               }
	       }
        }

        return $errors[]=array("login_empty"=>$error_login_empty,"login_incorrect"=>$error_login_incorrect);
	}
}

?>