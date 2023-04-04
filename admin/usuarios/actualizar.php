<?php
 header('Content-Type: text/html; charset=UTF-8');
if (!isset($_POST['id_usuario']) || !isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['email']) || !isset($_POST['clave']) || !isset($_POST['rol'])) 
exit();

#Si todo va bien, se ejecuta esta parte del código...

require_once "../../conexion.php";
	$id_usuario= $_POST["id_usuario"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$password = $_POST["clave"];
	$rol = $_POST["rol"];


	$sentencia = $pdo->prepare("UPDATE usuario SET nombre = ?, apellido = ?, correo = ?, password = ?, rol_id_rol = ? WHERE id_usuario= ?;");
	$resultado = $sentencia->execute([$nombre, $apellido, $email, $password, $rol, $id_usuario]);

	if($resultado === TRUE) {
      
        header("Location:../admin.php");
    }
   
	else header("Location:../../logout.php")

?>