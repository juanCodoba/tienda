<?php
 header('Content-Type: text/html; charset=UTF-8');
if (!isset($_POST['id_producto']) || !isset($_POST['nombre']) || !isset($_POST['tipo']) || !isset($_POST['cantidad'])) 
exit();

#Si todo va bien, se ejecuta esta parte del código...

require_once "../../conexion.php";
	$id_producto= $_POST["id_producto"];
	$nombre = $_POST["nombre"];
	$cantidad = $_POST["cantidad"];
	$tipo = $_POST["tipo"];

	$sentencia = $pdo->prepare("UPDATE producto SET nombre = ?,tipo = ?, cantidad = ? WHERE id_producto= ?;");
	$resultado = $sentencia->execute([$nombre, $tipo, $cantidad, $id_producto]);

	if($resultado === TRUE) {
      
        header("Location:producto.php");
    }
   
	else header("Location:../../logout.php")

?>