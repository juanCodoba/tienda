<?php
 header('Content-Type: text/html; charset=UTF-8');
if (!isset($_POST['id_pedido']) || !isset($_POST['direccion']) || !isset($_POST['fecha'])) 
exit();

#Si todo va bien, se ejecuta esta parte del código...

require_once "../../conexion.php";
	$id_pedido= $_POST["id_pedido"];
	$direccion = $_POST["direccion"];
	$fecha = $_POST["fecha"];


	$sentencia = $pdo->prepare("UPDATE pedido SET direccion = ?, fecha = ? WHERE id_pedido= ?;");
	$resultado = $sentencia->execute([$direccion, $fecha, $id_pedido]);

	if($resultado === TRUE) {
      
        header("Location:pedido.php");
    }
   
	else header("Location:../../logout.php")

?>