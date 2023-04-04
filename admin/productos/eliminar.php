<?php
if(!isset($_GET["id_producto"])) exit();
$id = $_GET["id_producto"];
include_once "../../conexion.php";
$sentencia = $pdo->prepare("DELETE FROM producto WHERE id_producto = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) header("Location:producto.php");
else echo "Algo salió mal";
?>