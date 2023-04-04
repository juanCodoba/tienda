<?php
if(!isset($_GET["id_usuario"])) exit();
$id = $_GET["id_usuario"];
include_once "../../conexion.php";
$sentencia = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = ?;");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
if($persona === FALSE){
	
	echo "¡No existe alguna persona con ese ID!";
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
                <form action="actualizar.php" method="post">

                    <div class="form-group">
                            <label for="exampleInputEmail1">Identificador</label>
                            <input type="number" class="form-control" name="id_usuario"
                                value="<?php echo $persona->id_usuario?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="exampleInputEmail1"
                            value="<?php echo $persona->nombre?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" class="form-control" required="" name="apellido" id="exampleInputEmail1"
                            value="<?php echo $persona->apellido?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" required="" name="email"
                            aria-describedby="emailHelp" value="<?php echo $persona->correo?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" required="" name="clave" id="exampleInputPassword1"
                            value="<?php echo $persona->password?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Rol</label>
                        <select class="form-control" name="rol" id="exampleFormControlSelect1">
                            <option value="1">Administrador</option>
                            <option value="2">Cliente</option>
                        </select>
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