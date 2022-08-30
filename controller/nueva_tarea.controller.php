<?php

// Video:wmv
#video/x-ms-wmv

// Video:mp4
#video/mp4

// Audio
#audio/mpeg

// Word .docx
#application/vnd.openxmlformats-officedocument.wordprocessingml.document

// Word .doc
#application/msword

// Access
#application/msaccess

// PDF
#application/pdf

// PowerPoint
#application/vnd.openxmlformats-officedocument.presentationml.presentation

// Excel
#application/vnd.openxmlformats-officedocument.spreadsheetml.sheet

require("../model/nueva_tarea.model.php");
require("../model/profesor.model.php");

$nueva_tarea = new Nueva_Tarea();
$teacher = new Profesor();

$errors = $nueva_tarea->getValidate();
$teacher_array = $teacher->getTeacher($_GET['id']);

require("../view/nueva_tarea.view.php");

?>