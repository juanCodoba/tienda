<?php 
$contrasena = "1234";
$usuario = "root";
$nombrebd = "producto";
try{
	$pdo = new PDO('mysql:host=localhost;dbname=' . $nombrebd, $usuario, $contrasena);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>
