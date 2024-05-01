<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/niveles/listado_niveles.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creación de un nuevo grado</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Creación de un nuevo grado</li>
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
                        <h3 class="card-title">Formulario grado</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/grados/crear_grados.php" method="POST">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Nivel escolar:</label>
                                <select name="nivel_id" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach ($niveles as $nivele)
                                        {
                                            if($nivele["estado"] == 1)
                                            {  
                                    ?>
                                                <option value="<?php echo $nivele['id_niveles'];?>"><?php echo $nivele['nivel'].' - '.$nivele["turno"];?></option>
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
                                    <label for="">Curso:</label>
                                    <input type="text" name="curso" class="form-control">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Paralelo:</label>
                                    <select name="paralelo" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Registrar</button>
                              <a href="<?php echo APP_URL;?>/vistas/grados/" class="btn btn-secondary">Cancelar</a>
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