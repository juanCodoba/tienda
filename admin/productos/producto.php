<?php
    include_once("../../conexion.php");
    $sentencia = $pdo->prepare("SELECT * FROM producto");
    $sentencia->execute();
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/user.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <section><i class="fas fa-user-circle fa-6x"></i>
                <br></br>
                <h5>Administrador</h5>
            </section>
            <ul>
                <li><a href="../admin.php"><i class="fas fa-users"></i> Agregar</a></li>
                <li><a href="producto.php"><i class="fas fa-shopping-cart"></i> Productos</a></li>
                <li><a href="#"><i class="fas fa-paper-plane"></i> Pedidos</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">
                <!-- Sign up -->
                <ul>
                    <li class="nav">
                        <a class="exit" href="../../logout.php">
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
            <div class="info">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <td colspan="9"><button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fas fa-plus"></i></button></td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                            <th colspan="2">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $producto){ ?>
                        <tr>
                            <td><?php echo $producto->id_producto ?></td>
                            <td><?php echo $producto->nombre ?></td>
                            <td><?php echo $producto->cantidad ?></td>
                            <td><img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($producto->imagen); ?>"/></td>
                            <td><a href="<?php echo "editar.php?id_producto=" . $producto->id_producto?>"><button
                                        class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                            <td><a href="<?php echo "eliminar.php?id_producto=" . $producto->id_producto?>"><button
                                        class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

         <!-- Modal New -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="crear.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" required="" name="nombre"
                                    id="exampleInputEmail1" placeholder="Ingresa el nombre del producto">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cantidad</label>
                                <input type="number" class="form-control" required="" name="cantidad"
                                    id="exampleInputEmail1" placeholder="Ingresa la cantidad">
                            </div>
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" class="form-control" required=""
                                    name="imagen" placeholder="Adjunta la imagen">
                            </div>

                            <button type="submit" class="btn btn-success btn-lg btn-block">Crear</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>
<script src="../../js/fontawesome-all.js"></script>
<script type="text/javascript" src="../../js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="../../js/popper.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>

</html>