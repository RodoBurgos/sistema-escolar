<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/roles/rol_docente_roles.php");
    include("../../controllers/docentes/ver_docentes.php");

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar personal docente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Actualizar personal docente</li>
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
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Formulario personal docente</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/docentes/editar_docentes.php" method="POST">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">DNI:</label>
                                  <input type="number" name="dni" value="<?php echo $dni_persona;?>" class="form-control">
                                  <input type="number" name="id_persona" value="<?php echo $id_persona;?>" hidden>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre" value="<?php echo $nombre_persona;?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellido:</label>
                                    <input type="text" name="apellido" value="<?php echo $apellido_persona;?>" class="form-control">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Profesión:</label>
                                    <input type="text" name="profesion" value="<?php echo $profesion_persona;?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Celular:</label>
                                    <input type="number" name="celular" value="<?php echo $celular_persona;?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" name="f_nacimiento" value="<?php echo $f_nacimiento_persona;?>" class="form-control">
                                </div>
                            </div>                           
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Especialidad:</label>
                                <input type="text" name="especialidad" value="<?php echo $especialidad_persona;?>" class="form-control">
                                <input type="number" name="id_docente" value="<?php echo $id_docentes_persona;?>" hidden>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Antigüedad:</label>
                                <input type="text" name="antiguedad" value="<?php echo $antiguedad_persona;?>" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" name="direccion" value="<?php echo $direccion_persona;?>" class="form-control">
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
                                  <input type="number" name="id_usuario" value="<?php echo $id_usuario_persona;?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario:</label>
                                    <input type="text" name="usuario" value="<?php echo $usuario_persona;?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" value="<?php echo $email_persona;?>" class="form-control">
                                </div>
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Actualizar</button>
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