<?php
if (!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['email']) || !isset($_POST['clave']))
 exit();
			# code...
	require_once "../../conexion.php";
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$clave = $_POST["clave"];
    $rol = 2;
	

	$sentencia = $pdo->prepare("INSERT INTO usuario(nombre, apellido, correo, password,rol_id_rol) VALUES (?,?, ?, ?,?);");
	$resultado = $sentencia->execute([$nombre, $apellido, $email, $clave,$rol]);

	if($resultado === TRUE) {
        for ($i = 3; $i >= 1; $i--) {
            sleep(1); 
			include("../../componentes/alert.html");
        }
        
        header("Location:/producto/login.php");
    }
   
	else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>