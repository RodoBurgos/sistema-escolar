<?php
    include("../../../app/config.php");
    include("../../layout/menu.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creación de una nueva Gestión Escolar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Creación de una nueva Gestión Escolar</li>
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
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario gestión escolar</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/configuraciones/gestiones/crear_gestiones.php" method="POST">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Nombre de la gestión:</label>
                                <input type="text" class="form-control" name="nombre">
                                <input type="text" name="usuario_id" value="<?php echo $id_sesion_usuario;?>" hidden>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <select name="estado" class="form-control">
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Registrar</button>
                              <a href="<?php echo APP_URL;?>/vistas/configuraciones/gestiones/" class="btn btn-secondary">Cancelar</a>
                            </div>
                          </div>
                        </form>
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