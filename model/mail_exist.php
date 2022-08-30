<?php

// 1er. grado

$sql = "SELECT * FROM 1a WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
	}
}

$sql = "SELECT * FROM 1b WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 1c WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 1d WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 1e WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 1f WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

// 2do. grado

$sql = "SELECT * FROM 2a WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
	}
}

$sql = "SELECT * FROM 2b WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 2c WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 2d WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 2e WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 2f WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

// 3er. grado

$sql = "SELECT * FROM 3a WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
	}
}

$sql = "SELECT * FROM 3b WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 3c WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 3d WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 3e WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

$sql = "SELECT * FROM 3f WHERE MAIL = :mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail",$objetos->getMail());
$statements->execute();

if ($registro = $statements->fetch(PDO::FETCH_ASSOC)) {
	if ($registro == true) {
		$error_mail_exist = 'El correo ya existe en la base de datos';
    }
}

?>