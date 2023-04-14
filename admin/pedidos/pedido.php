<?php
    include_once("../../conexion.php");
    $sentencia = $pdo->prepare("SELECT * FROM pedido");
    $sentencia->execute();
    $pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                <li><a href="../productos/producto.php"><i class="fas fa-shopping-cart"></i> Productos</a></li>
                <li><a href="pedido.php"><i class="fas fa-paper-plane"></i> Pedidos</a></li>
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
                            <th>ID Pedido</th>
                            <th>Direccion</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th colspan="2">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pedidos as $pedido){ ?>
                        <tr>
                            <td><?php echo $pedido->id_pedido ?></td>
                            <td><?php echo $pedido->direccion ?></td>
                            <td><?php echo $pedido->fecha ?></td>
                            <td><?php echo $pedido->usuario_id_usuario ?></td>
                            <td><?php echo $pedido->producto_id_producto ?></td>
                            <td><a href="<?php echo "editar.php?id_pedidio=" . $pedido->id_pedido?>"><button
                                        class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                            <td><a href="<?php echo "eliminar.php?id_pedido=" . $pedido->id_pedido?>"><button
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
                                <label for="exampleInputEmail1">Direccion</label>
                                <input type="text" class="form-control" required="" name="direccion"
                                    id="exampleInputEmail1" placeholder="Ingresa la direccion">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha</label>
                                <input type="date" class="form-control" required="" name="fecha"
                                    id="exampleInputEmail1" placeholder="Ingresa la fecha">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="number" class="form-control" required="" name="usuario"
                                    id="exampleInputEmail1" placeholder="Ingresa el ID del usuario">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Producto</label>
                                <input type="number" class="form-control" required="" name="producto"
                                    id="exampleInputEmail1" placeholder="Ingresa el ID del producto">
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