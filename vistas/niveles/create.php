<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/configuraciones/gestiones/listado_gestiones.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creación de un nuevo nivel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Creación de un nuevo nivel</li>
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
                        <h3 class="card-title">Formulario nivel</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/niveles/crear_niveles.php" method="POST">
                            <input type="text" name="usuario_id" value="<?php echo $id_sesion_usuario;?>" hidden>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Gestión escolar:</label>
                                <select name="gestion_id" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach ($gestiones as $gestion)
                                        {
                                            if($gestion["estado"] == "ACTIVO")
                                            {  
                                    ?>
                                                <option value="<?php echo $gestion['id_gestiones'];?>"><?php echo $gestion['nombre'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nivel:</label>
                                    <select name="nivel" id="lista1" class="form-control">
                                        <option value="1">INICIAL</option>
                                        <option value="2">PRIMARIO</option>
                                        <option value="3">SECUNDARIO</option>
                                        <option value="4">TERCIARIO</option>
                                    </select>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Turno:</label>
                                    <select name="turno" id="lista2" class="form-control">
                                        <option value="MAÑANA">MAÑANA</option>
                                        <option value="TARDE">TARDE</option>
                                        <option value="NOCHE">NOCHE</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Registrar</button>
                              <a href="<?php echo APP_URL;?>/vistas/niveles/" class="btn btn-secondary">Cancelar</a>
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