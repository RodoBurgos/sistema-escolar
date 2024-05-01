<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/usuarios/ver_usuarios.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Datos del usuario: <b><?php echo $nombre_usuario.' '.$apellido_usuario;?></b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL;?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Datos del usuario</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Información</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">DNI:</label>
                                    <p><?php echo $dni_usuario;?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre y Apellido:</label>
                                    <p><?php echo $nombre_usuario.' '.$apellido_usuario;?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Rol:</label>
                                    <p><?php echo $rol_usuario;?></p>
                                </div>
                            </div>                          
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario:</label>
                                    <p><?php echo $usuario_usuario;?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <p><?php echo $email_usuario;?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <?php
                                        if($estado_usuario)
                                        {
                                    ?>
                                            <p><span class="badge badge-success">ACTIVO</span></p>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                            <p><span class="badge badge-danger">INACTIVO</span></p>
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                            </div>                         
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de creación:</label>
                                    <p><?php echo $fyh_creacion_usuario;?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de actualización:</label>
                                    <p><?php echo $fyh_actualizacion_usuario;?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo APP_URL;?>/vistas/usuarios/" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php 
  include("../layout/footer.php");
  include("../../layout/mensajes.php");
?>