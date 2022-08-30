<?php

class Nueva_Tarea {

	public function getValidate() {
		require_once("conectar.php");
		$base=Conectar::conexion();

		$errors = array();

		$error_title = '';
		$error_video_size = '';
		$error_video_type = '';
		$error_image_size = '';
		$error_image_type = '';
		$error_audio_size = '';
        $error_audio_type = '';
        $error_pdf_size = '';
        $error_pdf_type = '';

		if (isset($_POST['btn-add']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$title=htmlentities(addslashes($_POST['title']), ENT_QUOTES);
			date_default_timezone_set('America/Mexico_City');
			#$date=date('y-m-d H:i:s');
			$month = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
			$date = date('d') . " de " . $month[date('m')-1] . " de " . date('Y') . " " . date('H:i:s');
			$commenter=htmlentities(addslashes($_POST['commenter']), ENT_QUOTES);
			$link=htmlentities(addslashes($_POST['link']), ENT_QUOTES);

			if (empty($title)) {
				$error_title = 'Por favor escribe un titulo';
			}
			
			$video_name=$_FILES['video']['name'];
			$video_type=$_FILES['video']['type'];
			$video_size=$_FILES['video']['size'];
			
			$image_name=$_FILES['img']['name'];
			$image_type=$_FILES['img']['type'];
			$image_size=$_FILES['img']['size'];
			
			$audio_name=$_FILES['audio']['name'];
			$audio_type=$_FILES['audio']['type'];
			$audio_size=$_FILES['audio']['size'];
			
			$pdf_name=$_FILES['pdf']['name'];
			$pdf_type=$_FILES['pdf']['type'];
			$pdf_size=$_FILES['pdf']['size'];
			
			$grado=strtolower($_POST['grado']);
			$grupo=strtolower($_POST['grupo']);

			// Video

			if ($video_size <= 25000000) {
				if ($video_type == 'video/mp4' || $video_type == '') {
					$folder_fate = "../video/";

					$file_video = $folder_fate . basename($_FILES['video']['name']);

					move_uploaded_file($_FILES['video']['tmp_name'], $file_video);
				} else {
					$error_video_type = 'El archivo elegido no es un video';
				}
			} else {
				$error_video_size = 'El tamaño excede 30 MB';
			}

			// Imagen

			if ($image_size <= 1000000) {
				if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png' || $image_type == 'image/gif' || $image_type == '') {

					$folder_fate = "../img/";
					$file_image = $folder_fate . basename($_FILES['img']['name']);

					move_uploaded_file($_FILES['img']['tmp_name'], $file_image);
				} else {
					$error_image_type = 'El archivo elegido no es una imagen';
				}
			} else {
				$error_image_size = 'El tamaño de la imagen excede 1 MB';
			}

			// Audio

			if ($audio_size <= 5000000) {
				if ($audio_type == 'audio/mpeg' || $audio_type == '') {
					$folder_fate = "../audio/";

					$file_audio = $folder_fate . basename($_FILES['audio']['name']);

					move_uploaded_file($_FILES['audio']['tmp_name'], $file_audio);
				} else {
					$error_audio_type = 'El archivo elegido no es un audio';
				}
			} else {
				$error_audio_size = 'El tamaño del archivo excede 5 MB';
			}

			// PDF, Word, Word .docx Access, Excel, PowerPoint

			if ($pdf_size <= 10000000) {
				if ($pdf_type == 'application/pdf' || $pdf_type == 'application/msword' || $pdf_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $pdf_type == 'application/msaccess' || $pdf_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $pdf_type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || $pdf_type == '') {
					$folder_fate = "../files/";

					$file_pdf = $folder_fate . basename($_FILES['pdf']['name']);

					move_uploaded_file($_FILES['pdf']['tmp_name'], $file_pdf);
				} else {
					$error_pdf_type = 'El archivo elegido no es un PDF, Word, Access, Excel o PowerPoint';
				}
			} else {
				$error_pdf_size = 'El tamaño del archivo excede 10 MB';
			}

			if (empty($error_title) && empty($error_video_type) && empty($error_video_size) && empty($error_image_type) && empty($error_image_size) && empty($error_audio_type) && empty($error_audio_size) && empty($error_pdf_type) && empty($error_pdf_size)) {

			    $sql="INSERT INTO homeworks (title, date_hw, commenter, link, video, img, audio, pdf, grado, grupo) VALUES (:title, :date_hw, :commenter, :link, :video, :img, :audio, :pdf, :grado, :grupo)";

			    $statements=$base->prepare($sql);
			    $statements->bindValue(":title", $title);
			    $statements->bindValue(":date_hw", $date);
			    $statements->bindValue(":commenter", $commenter);
			    $statements->bindValue(":link", $link);
			    $statements->bindValue(":video", $video_name);
			    $statements->bindValue(":img", $image_name);
			    $statements->bindValue(":audio", $audio_name);
			    $statements->bindValue(":pdf", $pdf_name);
			    $statements->bindValue(":grado", $grado);
			    $statements->bindValue(":grupo", $grupo);
			    $statements->execute();

			    header('Location: ../index.php?id='.$_GET['id'].'&grado='.$_GET['grado'].'&grupo='.$_GET['grupo']);
			}
		}

		return $errors[] = ['title'=>$error_title,'video_type'=>$error_video_type,'video_size'=>$error_video_size,'image_type'=>$error_image_type,'image_size'=>$error_image_size,'audio_type'=>$error_audio_type,'audio_size'=>$error_audio_size,'pdf_type'=>$error_pdf_type,'pdf_size'=>$error_pdf_size];
	}
}

?>
