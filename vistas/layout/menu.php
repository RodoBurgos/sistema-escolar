<?php
  session_start();

  if (isset($_SESSION['usuario']))
  {
    //echo "Paso x el login";
    $usuario_sesion = $_SESSION['usuario'];
    $query_sesion = $pdo->prepare("SELECT * FROM usuarios WHERE usuario='$usuario_sesion' AND estado='Activo';");
    $query_sesion->execute();

    $datos_sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datos_sesion_usuarios as $datos_sesion_usuario)
    {
      $id_sesion_usuario = $datos_sesion_usuario['id_usuarios'];
      $nombre_sesion_usuario = $datos_sesion_usuario['nombre'].' '.$datos_sesion_usuario['apellido'];
    }
  }
  else
  {
    //echo "No paso por el login";
    header('location:'.APP_URL);
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/dist/css/adminlte.min.css">
  <!--SweetAlert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo APP_URL;?>/vistas/" class="nav-link"><?php echo APP_NAME;?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user" title="Cerrar Sesión"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Datos personales
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo APP_URL?>/controllers/login/cerrarSesion.php" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo APP_URL;?>/vistas/" class="brand-link">
      <img src="https://cdn.pixabay.com/photo/2018/02/17/00/06/school-3158985_1280.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gestión Escolar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre_sesion_usuario;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL?>/vistas/roles/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo APP_URL?>/vistas/roles/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crea nuevo rol</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL?>/vistas/usuarios/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo APP_URL?>/vistas/usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crea nuevo usuario</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-gear"></i>
              <p>
                Configuraciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL?>/vistas/configuraciones/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de configuraciones</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>