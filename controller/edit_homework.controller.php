<?php

require("../model/profesor.model.php");
require("../model/edit_homework.model.php");

$teacher = new Profesor();
$update_homework = new Update_homework();

$teacher_array=$teacher->getTeacher($_GET['id']);
$update_homework->getHomework($_GET['id_hw']);

require("../view/edit_homework.view.php");

?>