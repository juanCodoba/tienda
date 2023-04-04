<?php
 header('Content-Type: text/html; charset=UTF-8');
if (!isset($_POST['id_producto']) || !isset($_POST['nombre']) || !isset($_POST['cantidad'])) 
exit();

#Si todo va bien, se ejecuta esta parte del código...

require_once "../../conexion.php";
	$id_producto= $_POST["id_producto"];
	$nombre = $_POST["nombre"];
	$cantidad = $_POST["cantidad"];


	$sentencia = $pdo->prepare("UPDATE producto SET nombre = ?, cantidad = ? WHERE id_producto= ?;");
	$resultado = $sentencia->execute([$nombre, $cantidad, $id_producto]);

	if($resultado === TRUE) {
      
        header("Location:producto.php");
    }
   
	else header("Location:../../logout.php")

?>