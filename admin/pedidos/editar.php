<?php
if(!isset($_GET["id_pedido"])) exit();
$id = $_GET["id_pedido"];
include_once "../../conexion.php";
$sentencia = $pdo->prepare("SELECT * FROM pedido WHERE id_pedido = ?;");
$sentencia->execute([$id]);
$pedido = $sentencia->fetch(PDO::FETCH_OBJ);
if($pedido === FALSE){
	
	echo "¡No existe algun producto con ese ID!";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/edit.css">
    <title>edit</title>
</head>

<body>
    <div class="container-fluid col-sm-8 main-section">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-12">
                <h1 class="title">Actualización</h1>
            </div>
        </div>
        <div class="row  justify-content-around">
            <div class=" col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-6 white-background">
                <form action="actualizar.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                            <label for="exampleInputEmail1">Identificador</label>
                            <input type="number" class="form-control" name="id_pedido"
                                value="<?php echo $pedido->id_pedido?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="address" class="form-control" name="direccion" id="exampleInputEmail1"
                            value="<?php echo $pedido->direccion?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input type="date" class="form-control" required="" name="fecha" id="exampleInputEmail1"
                            value="<?php echo $pedido->fecha?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../js/fontawesome-all.js"></script>
<script type="text/javascript" src="../../js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="../../js/popper.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>

</html>