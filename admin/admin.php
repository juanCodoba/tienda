<?php
include_once("../conexion.php");
$nombre = 'santiago';
$apellido = 'caicedo';
$sentencia = $pdo->prepare("SELECT * FROM usuario u inner join rol r on u.rol_id_rol=r.id_rol");
$sentencia->execute();
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/user.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <section><i class="fas fa-user-circle fa-6x"></i>
                <br></br>
                <h5>Administrador</h5>
            </section>
            <ul>
                <li><a href="admin.php"><i class="fas fa-users"></i> Agregar</a></li>
                <li><a href="#"><i class="fas fa-shopping-cart"></i> Productos</a></li>
                <li><a href="#"><i class="fas fa-paper-plane"></i> Envios</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">
                <!-- Sign up -->
                <ul>
                    <li class="nav">
                        <a class="exit" href="../logout.php">
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
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th colspan="2">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($personas as $persona){ ?>
                        <tr>
                            <td><?php echo $persona->id_usuario ?></td>
                            <td><?php echo $persona->nombre ?></td>
                            <td><?php echo $persona->apellido ?></td>
                            <td><?php echo $persona->correo ?></td>
                            <td><?php echo $persona->password ?></td>
                            <td><?php echo $persona->nombre_rol ?></td>
                            <td><a href="<?php echo "editar.php?idcliente=" . $persona->idcliente?>"><button
                                        class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                            <td><a href="#"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="usuarios/crear.php" method="post">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" required="" name="nombre"
                                    id="exampleInputEmail1" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido</label>
                                <input type="text" class="form-control" required="" name="apellido"
                                    id="exampleInputEmail1" placeholder="Ingresa tu apellido">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" required=""
                                    name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" class="form-control" required="" name="clave"
                                    id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Rol</label>
                                <select class="form-control" name="rol" id="exampleFormControlSelect1">
                                    <option value="1">Administrador</option>
                                    <option value="2">Cliente</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg btn-block">Crear</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>
<script src="../js/fontawesome-all.js"></script>
<script type="text/javascript" src="../js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

</html>