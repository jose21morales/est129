<?php

require("model/login.model.php");

$login=new Login();

$errors=$login->validaLogin();

$login = $_POST['mail'];

require("view/login.view.php");

?>