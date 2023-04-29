<?php
if (!isset($_POST['nombre']) || !isset($_POST['tipo']) || !isset($_POST['cantidad']) || !isset($_FILES['imagen']))
exit();
		# code...
	require_once "../../conexion.php";
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$cantidad = $_POST["cantidad"];
	$imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
    $id="1";


	$sentencia = $pdo->prepare("INSERT INTO producto(nombre, tipo, cantidad, imagen, usuario_id_usuario) VALUES (?,?,?, ?, ?);");
	$resultado = $sentencia->execute([$nombre, $tipo, $cantidad, $imagen, $id]);

	if($resultado === TRUE) {
      
        header("Location:producto.php");
    }
   
	else header("Location:../../logout.php")


?>