<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/roles/ver_roles.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Datos del Rol: <b><?php echo $nombre_rol;?></b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL;?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Datos del rol</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Información</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre del rol:</label>
                                    <p><?php echo $nombre_rol;?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <p><span class="badge badge-success"><?php echo $estado_rol;?></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de creación:</label>
                                    <p><?php echo $fyh_creacion_rol;?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de actualización:</label>
                                    <p><?php echo $fyh_actualizacion_rol;?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo APP_URL;?>/vistas/roles/" class="btn btn-secondary">Volver</a>
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