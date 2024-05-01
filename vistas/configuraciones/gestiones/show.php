<?php
    include("../../../app/config.php");
    include("../../layout/menu.php");
    include("../../../controllers/configuraciones/gestiones/ver_gestiones.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Datos de la Gestión Escolar: <b><?php echo $nombre_gestiones;?></b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL;?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Datos de la Gestión Escolar</li>
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
                                    <label for="">Nombre de la gestión:</label>
                                    <p><?php echo $nombre_gestiones;?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <?php
                                      if($estado_gestiones == 1)
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de creación:</label>
                                    <p><?php echo $fyh_creacion_gestiones;?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de actualización:</label>
                                    <p><?php echo $fyh_actualizacion_gestiones;?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo APP_URL;?>/vistas/configuraciones/gestiones/" class="btn btn-secondary">Volver</a>
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
  include("../../layout/footer.php");
  include("../../../layout/mensajes.php");
?>