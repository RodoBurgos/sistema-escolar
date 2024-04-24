<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/roles/listado_roles.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creación de un nuevo usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Creación de un nuevo usuario</li>
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
                        <h3 class="card-title">Formulario usuario</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/usuarios/crear_usuarios.php" method="POST">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">DNI</label>
                                <input type="number" name="dni" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" name="apellido" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" name="usuario" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="password" name="contrasena" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Repetir contraseña</label>
                                    <input type="password" name="contrasena2" class="form-control">
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Registrar</button>
                              <a href="<?php echo APP_URL;?>/vistas/usuarios/" class="btn btn-secondary">Cancelar</a>
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