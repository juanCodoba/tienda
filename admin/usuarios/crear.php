<?php
 header('Content-Type: text/html; charset=UTF-8');
if (!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['email']) || !isset($_POST['clave']) || !isset($_POST['rol']))
exit();
		# code...
	require_once "../../conexion.php";
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$clave = $_POST["clave"];
    $rol =  $_POST["rol"];
	

	$sentencia = $pdo->prepare("INSERT INTO usuario(nombre, apellido, correo, password,rol_id_rol) VALUES (?,?, ?, ?,?);");
	$resultado = $sentencia->execute([$nombre, $apellido, $email, $clave, $rol]);

	if($resultado === TRUE) {
      
        header("Location:../admin.php");
    }
   
	else header("Location:../../logout.php")


?>