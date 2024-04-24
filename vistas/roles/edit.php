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
            <h1 class="m-0">Actualizar rol</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Actualizar rol</li>
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
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Formulario rol</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/roles/editar_roles.php" method="POST">
                            <input type="text" name="id" value="<?php echo $id_rol;?>" hidden>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Nombre del rol</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre_rol;?>" placeholder="Nombre del rol" required>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Actualizar</button>
                              <a href="<?php echo APP_URL;?>/vistas/roles/" class="btn btn-secondary">Cancelar</a>
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
  include("../layout/footer.php");
  include("../../layout/mensajes.php");
?>