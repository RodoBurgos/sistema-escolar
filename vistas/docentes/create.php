<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/roles/rol_docente_roles.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creación de un nuevo docente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Creación de un nuevo docente</li>
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
                        <h3 class="card-title">Formulario personal docente</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/docentes/crear_docentes.php" method="POST">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">DNI:</label>
                                  <input type="number" name="dni" class="form-control">
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
                                    <label for="">Profesión:</label>
                                    <input type="text" name="profesion" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Celular:</label>
                                    <input type="number" name="celular" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" name="f_nacimiento" class="form-control">
                                </div>
                            </div>                           
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Especialidad:</label>
                                <input type="text" name="especialidad" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Antigüedad:</label>
                                <input type="text" name="antiguedad" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" name="direccion" class="form-control">
                                </div>
                            </div>
                          </div>

                            <hr>
                          <h3 class="card-title">Formulario usuario</h3>
                          <br>
                          <hr>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Rol:</label>
                                  <input type="text" name="rol_id" value="<?php echo $rol["id_roles"];?>" hidden>
                                  <input type="text" value="<?php echo $rol["rol"];?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario:</label>
                                    <input type="text" name="usuario" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Contraseña:</label>
                                    <input type="password" name="contrasena" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Repetir contraseña:</label>
                                    <input type="password" name="contrasena2" class="form-control">
                                </div>
                            </div>                           
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Registrar</button>
                              <a href="<?php echo APP_URL;?>/vistas/docentes/" class="btn btn-secondary">Cancelar</a>
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

<script>
    $(document).ready(function()
    {
        $('.select2').select2()
    });
</script>