<?php

// Profesores

$sql="SELECT * FROM profesores WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador++;
	  }
}

if ($contador != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_profesores']."&grado=1&grupo=a");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

# ====================================================================

// 1° A

$sql="SELECT * FROM 1a WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['1a']++;
	  }
}

if ($contador_first['1a'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_1a']." & grado=1&grupo=a");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 1° B

$sql="SELECT * FROM 1b WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['1b']++;
	  }
}

if ($contador_first['1b'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_1b']." & grado=1&grupo=b");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 1° C

$sql="SELECT * FROM 1c WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['1c']++;
	  }
}

if ($contador_first['1c'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_1c']." & grado=1&grupo=c");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 1° D

$sql="SELECT * FROM 1d WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['1d']++;
	  }
}

if ($contador_first['1d'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_1d']." & grado=1&grupo=d");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 1° E

$sql="SELECT * FROM 1e WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['1e']++;
	  }
}

if ($contador_first['1e'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_1e']." & grado=1&grupo=e");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 1° F

$sql="SELECT * FROM 1f WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['1f']++;
	  }
}

if ($contador_first['1f'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_1f']." & grado=1&grupo=f");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 2 GRADO

// 2° A

$sql="SELECT * FROM 2a WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['2a']++;
	  }
}

if ($contador_first['2a'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_2a']." & grado=2&grupo=a");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 2° B

$sql="SELECT * FROM 2b WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['2b']++;
	  }
}

if ($contador_first['2b'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_2b']." & grado=2&grupo=b");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 2° C

$sql="SELECT * FROM 2c WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['2c']++;
	  }
}

if ($contador_first['2c'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_2c']." & grado=2&grupo=c");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 2° D

$sql="SELECT * FROM 2d WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['2d']++;
	  }
}

if ($contador_first['2d'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_2d']." & grado=2&grupo=d");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 2° E

$sql="SELECT * FROM 2e WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['2e']++;
	  }
}

if ($contador_first['2e'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_2e']." & grado=2&grupo=e");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 2° F

$sql="SELECT * FROM 2f WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['2f']++;
	  }
}

if ($contador_first['2f'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_2f']." & grado=2&grupo=f");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 3 GRADO

// 3° A

$sql="SELECT * FROM 3a WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['3a']++;
	  }
}

if ($contador_first['3a'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_3a']." & grado=3&grupo=a");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 3° B

$sql="SELECT * FROM 3b WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['3b']++;
	  }
}

if ($contador_first['3b'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_3b']." & grado=3&grupo=b");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 3° C

$sql="SELECT * FROM 3c WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['3c']++;
	  }
}

if ($contador_first['3c'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_3c']." & grado=3&grupo=c");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 3° D

$sql="SELECT * FROM 3d WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['3d']++;
	  }
}

if ($contador_first['3d'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_3d']." & grado=3&grupo=d");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 3° E

$sql="SELECT * FROM 3e WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['3e']++;
	  }
}

if ($contador_first['3e'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_3e']." & grado=3&grupo=e");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

// 3° F

$sql="SELECT * FROM 3f WHERE MAIL=:mail";
$statements = $conn->prepare($sql);
$statements->bindValue(":mail", $objetos->getLogin());
$statements->execute();
	       	   
if ($registro=$statements->fetch(PDO::FETCH_ASSOC)) {
	  if (password_verify($objetos->getPassword(), $registro['password'])) {
	    $contador_first['3f']++;
	  }
}

if ($contador_first['3f'] != 0) {
	  session_start();
	  $_SESSION['usuario'] = $registro['rol_id'];
	  header("Location:index.php?id=".$registro['id_3f']." & grado=3&grupo=f");
} else {
	  $error_login_incorrect='Error. Usuario o contraseña incorrectos';
}

?>