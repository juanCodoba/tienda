<?php
if(!isset($_GET["id_pedido"])) exit();
$id = $_GET["id_pedido"];
include_once "../../conexion.php";
$sentencia = $pdo->prepare("DELETE FROM pedido WHERE id_pedido = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) header("Location:pedido.php");
else echo "Algo salió mal";
?>