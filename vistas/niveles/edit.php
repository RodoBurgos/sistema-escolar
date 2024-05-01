<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/niveles/ver_niveles.php");
    include("../../controllers/configuraciones/gestiones/listado_gestiones.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar nivel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Actualizar nivel</li>
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
                        <h3 class="card-title">Formulario nivel</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/niveles/editar_niveles.php" method="POST">
                            <input type="text" name="id_niveles" value="<?php echo $id_niveles;?>" hidden>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Gestión escolar:</label>
                                <select name="gestion_id" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach ($gestiones as $gestion)
                                        {
                                            if($gestion["estado"] == 1)
                                            {  
                                    ?>
                                                <option value="<?php echo $gestion['id_gestiones'];?>"
                                                <?php 
                                                    if($gestion_nivel == $gestion['nombre'])
                                                    {
                                                ?> 
                                                        selected="selected"
                                                <?php } ?>
                                                >
                                                    <?php echo $gestion['nombre'];?>
                                                </option>
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
                                        <option value="INICIAL"
                                            <?php 
                                                if($nivel_nivel == "INICIAL")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            INICIAL
                                        </option>
                                        <option value="PRIMARIO"
                                            <?php 
                                                if($nivel_nivel == "PRIMARIO")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            PRIMARIO
                                        </option>
                                        <option value="SECUNDARIO"
                                            <?php 
                                                if($nivel_nivel == "SECUNDARIO")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>  
                                        >
                                            SECUNDARIO
                                        </option>
                                    </select>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Turno:</label>
                                    <select name="turno" id="lista2" class="form-control">
                                        <option value="MAÑANA"
                                            <?php 
                                                if($turno_nivel == "MAÑANA")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            MAÑANA
                                        </option>
                                        <option value="TARDE"
                                            <?php 
                                                if($turno_nivel == "TARDE")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            TARDE
                                        </option>
                                        <option value="NOCHE"
                                        <?php 
                                                if($turno_nivel == "NOCHE")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            NOCHE
                                        </option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Actualizar</button>
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