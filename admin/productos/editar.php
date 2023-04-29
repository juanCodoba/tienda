<?php
if(!isset($_GET["id_producto"])) exit();
$id = $_GET["id_producto"];
include_once "../../conexion.php";
$sentencia = $pdo->prepare("SELECT * FROM producto WHERE id_producto = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	
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
                            <input type="number" class="form-control" name="id_producto"
                                value="<?php echo $producto->id_producto?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="exampleInputEmail1"
                            value="<?php echo $producto->nombre?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="exampleInputEmail1"
                            value="<?php echo $producto->tipo?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cantidad</label>
                        <input type="number" class="form-control" required="" name="cantidad" id="exampleInputEmail1"
                            value="<?php echo $producto->cantidad?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Imagen</label>
                        <img height="100px" src="data:image/jpg;base64, <?php echo base64_encode($producto->imagen); ?>"/>
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