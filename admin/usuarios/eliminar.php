<?php
if(!isset($_GET["id_usuario"])) exit();
$id = $_GET["id_usuario"];
include_once "../../conexion.php";
$sentencia = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?;");
$resultado = $sentencia->execute([$id]);

if($resultado === TRUE) {
      
    header("Location:../admin.php");
}

else header("Location:../../logout.php")
?>