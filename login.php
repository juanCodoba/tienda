<?php 

  session_start();

  include("conexion.php");
  //var_dump($_REQUEST);
  if (isset($_REQUEST['correo']) && isset($_REQUEST['password'])) {
    $query = "Select * from usuario where password = '".$_REQUEST['password']."' and correo = '".$_REQUEST['correo']."' ";
  $result= $pdo->prepare($query);
  $result->execute();
  $result2 = $result->fetchAll(PDO::FETCH_ASSOC);

  //var_dump($result2);
  if ($result->rowCount()>=1) {
    $_SESSION['ingreso']='Hello';
    switch ($result2[0]['rol_id_rol']) {
      case '1':
        header("Location:admin/admin.php");
        break;
      
      case '2':
        header("Location:cliente/cliente.php");
        break;
    }
    
  }
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <title>Login</title>
</head>

<body style="background: url(img/basketball-1081882_1920.jpg) no-repeat center center fixed;
background-size: cover">
  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="img/Avatar-PNG-Download-Image.png" />
        </div>
        <form class="col-12" action="login.php" method="post">
          <div class="form-group" id="user-group">
            <input type="text" class="form-control" placeholder="Ingresa tu correo" name="correo" />
          </div>
          <div class="form-group" id="contrasena-group">
            <input type="password" class="form-control" placeholder="Ingresa tu clave" name="password" />
          </div>
          <div class="form-group">
            <a style="color: white;" class="signup" href="signup.html">Registrate</a>
          </div>

          <button type="submit" name="btn_login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/fontawesome-all.js"></script>
</body>

</html>