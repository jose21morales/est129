<?php

require("../model/recuperar_password.model.php");

$recupera_password = new Recupera_Password();
$errors = $recupera_password->getPassword();

require("../view/recuperar_password.view.php");

?>