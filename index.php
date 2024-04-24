<?php
    include("app/config.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME;?> | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/dist/css/adminlte.min.css">
  <!--SweetAlert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    
  </div>
  
  <div class="card">
    <div class="card-body login-card-body">
      <h3 class="text-center">Sistema escolar</h3>
      <h3 class="login-box-msg">Iniciar Sesión</h3>
      <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?t=st=1713019966~exp=1713023566~hmac=cf33aac8fa0d916427a20946b5e11062843eb77385dfbd334cc8f801146cdbb6&w=740" alt=""
      width="300px" height="200px">

      <form action="<?php echo APP_URL;?>/controllers/login/loginControllers.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="usuario" class="form-control" placeholder="Ingrese su usuario...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="contrasena" class="form-control" placeholder="Ingrese su contraseña...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
        </div>
      </form>

      <!--Mensaje de error al iniciar sesión-->
      <?php
        session_start();
        if(isset($_SESSION['mensaje']))
        {
          $mensaje = $_SESSION['mensaje'];
      ?>
          <script>
            var mensaje = '<?php echo $mensaje;?>';
            
            Swal.fire({
              position: "top-end",
              icon: "error",
              title: mensaje,
              showConfirmButton: false,
              timer: 4000
            });
          </script>

      <?php  
          session_destroy();
        }
      ?>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>