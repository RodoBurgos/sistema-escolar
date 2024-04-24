<?php
include("../../../app/config.php");
include("../../layout/menu.php");
include("../../../controllers/configuraciones/instituciones/ver_instituciones.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Actualizar datos de la Institución</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo APP_URL ?>/vistas/">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar datos de la Institución</li>
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
              <h3 class="card-title">Formulario Institución</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="<?php echo APP_URL;?>/controllers/configuraciones/instituciones/editar_instituciones.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <input type="text" name="id_instituciones" value="<?php echo $id_instituciones;?>" hidden>
                          <input type="text" name="usuario_id" value="<?php echo $id_sesion_usuario;?>" hidden>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Nombre:</label>
                              <input type="text" name="nombre" value="<?php echo $nombre_instituciones; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Email:</label>
                              <input type="email" name="email" value="<?php echo $email_instituciones; ?>" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Teléfono:</label>
                              <input type="number" name="telefono" value="<?php echo $telefono_instituciones; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Celular:</label>
                              <input type="number" name="celular" value="<?php echo $celular_instituciones; ?>" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-10">
                            <div class="form-group">
                              <label for="">Dirección:</label>
                              <input type="text" name="direccion" value="<?php echo $direccion_instituciones; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Imagen de la Institución</label>
                          <input type="file" id="file" name="imagen" value="" class="form-control">
                          <br>

                          <output id="list">
                            <img src="<?php echo APP_URL.'/public/img/logos/'.$logo_instituciones; ?>" width="100%">
                          </output>

                          <script src="mostrar_imagen_instituciones.js"></script>

                        </div>
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <button type="submit" class="btn btn-outline-success">Actualizar datos</button>
                          <a href="show.php" class="btn btn-secondary">Cancelar</a>
                        </div>
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
  </div>
</div>

<?php
include("../../layout/footer.php");
include("../../../layout/mensajes.php");
?>