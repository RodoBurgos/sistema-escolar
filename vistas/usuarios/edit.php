<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/personas/listado_personas.php");
    include("../../controllers/roles/listado_roles.php");
    include("../../controllers/usuarios/ver_usuarios.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Actualizar usuario</li>
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
                        <h3 class="card-title">Formulario usuario</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/usuarios/editar_usuarios.php" method="POST">
                            <input type="text" name="id_usuario" value="<?php echo $id_usuario;?>" hidden>
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Seleccione una persona</label>
                                  <a href="<?php echo APP_URL;?>/vistas/personas/create.php" class="btn btn-primary btn-sm" style="margin-left: 183px;" title="Crear nueva persona"><i class="fas fa-plus"></i></a>
                                  <select name="persona_id" class="form-control select2" style="width: 100%;">
                                      <?php
                                          foreach ($personas as $persona)
                                          {
                                      ?>
                                              <option value="<?php echo $persona['id_personas'];?>"
                                                <?php 
                                                    if($dni_usuario == $persona['dni'] && $nombre_usuario == $persona['nombre'] && $apellido_usuario == $persona["apellido"])
                                                    {
                                                ?> 
                                                        selected="selected"
                                                <?php } ?>
                                              >
                                                <?php echo $persona['dni'].' - '.$persona['nombre'].' '.$persona['apellido'];?>
                                              </option>
                                      <?php
                                          }
                                      ?>
                                  </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" name="usuario" value="<?php echo $usuario_usuario;?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="<?php echo $email_usuario;?>" class="form-control">
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
                                            <option value="<?php echo $rol['id_roles'];?>"

                                                <?php 
                                                    if($rol_usuario == $rol['nombre'])
                                                    {
                                                ?> 
                                                        selected="selected"
                                                <?php } ?>
                                            >
                                              
                                                <?php echo $rol['nombre'];?>
                                            </option>
                                      <?php
                                          }
                                      ?>
                                  </select>
                                </div>
                            </div>
                            
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Actualizar</button>
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