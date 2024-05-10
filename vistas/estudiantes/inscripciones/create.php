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
            <h1 class="m-0">Inscripción <?php echo $ano_actual;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Inscripción <?php echo $ano_actual;?></li>
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
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario persona</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/personas/crear_personas.php" method="POST">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">DNI:</label>
                                  <input type="number" name="dni" class="form-control" maxlength="10" pattern=".{10,}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellido:</label>
                                    <input type="text" name="apellido" class="form-control">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Dirección:</label>
                                  <input type="text" name="direccion" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="number" name="celular" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento</label>
                                    <input type="date" name="f_nacimiento" class="form-control">
                                </div>
                            </div>                           
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Profesión</label>
                                    <input type="text" name="profesion" class="form-control">
                                </div>
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Registrar</button>
                              <a href="<?php echo APP_URL;?>/vistas/personas/" class="btn btn-secondary">Cancelar</a>
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