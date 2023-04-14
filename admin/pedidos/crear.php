<?php
if (!isset($_POST['direccion']) || !isset($_POST['fecha']) || !isset($_POST['usuario']) || !isset($_POST['producto']))
exit();
		# code...
	require_once "../../conexion.php";
	$direccion = $_POST["direccion"];
	$fecha = $_POST["fecha"];
	$usuario = $_POST["usuario"];
    $producto= $_POST["producto"];


	$sentencia = $pdo->prepare("INSERT INTO pedido(direccion, fecha, usuario_id_usuario, producto_id_producto) VALUES (?,?, ?, ?);");
	$resultado = $sentencia->execute([$direccion, $fecha, $usuario, $producto]);

	if($resultado === TRUE) {
      
        header("Location:pedido.php");
    }
   
	else header("Location:../../logout.php")


?>