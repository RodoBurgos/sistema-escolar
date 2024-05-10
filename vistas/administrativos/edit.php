<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/roles/listado_roles.php");
    include("../../controllers/administrativos/ver_administrativos.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar personal administrativo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Actualizar personal administrativo</li>
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
                        <h3 class="card-title">Formulario personal administrativo</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/administrativos/editar_administrativos.php" method="POST">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">DNI:</label>
                                  <input type="text" name="id_persona" value="<?php echo $id_persona;?>" hidden>
                                  <input type="number" name="dni" value="<?php echo $dni_persona;?>" class="form-control">
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
                                    <label for="">Profesión</label>
                                    <input type="text" name="profesion" value="<?php echo $profesion_persona;?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="number" name="celular" value="<?php echo $celular_persona;?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento</label>
                                    <input type="date" name="f_nacimiento" value="<?php echo $f_nacimiento_persona;?>" class="form-control">
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
                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario;?>" hidden>
                                  <label for="">Seleccione un rol</label>
                                  <a href="<?php echo APP_URL;?>/vistas/roles/create.php" class="btn btn-primary btn-sm" style="margin-left: 230px;" title="Crear nuevo rol"><i class="fas fa-plus"></i></a>
                                  <select name="rol_id" class="form-control select2" style="width: 100%;">
                                      <?php
                                          foreach ($roles as $rol)
                                          {
                                      ?>
                                              <option value="<?php echo $rol['id_roles'];?>"><?php echo $rol['nombre'];?></option>
                                      <?php
                                          }
                                      ?>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" name="usuario" value="<?php echo $usuario_persona;?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="<?php echo $email_persona;?>" class="form-control">
                                </div>
                            </div>
                          </div>

                          <input type="text" name="id_administrativo" value="<?php echo $id_administrativo;?>" hidden>

                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Actualizar</button>
                              <a href="<?php echo APP_URL;?>/vistas/administrativos/" class="btn btn-secondary">Cancelar</a>
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