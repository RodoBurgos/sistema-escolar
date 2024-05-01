<?php
    include("../../app/config.php");
    include("../layout/menu.php");
    include("../../controllers/niveles/listado_niveles.php");
    include("../../controllers/grados/ver_grados.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar grado</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Actualizar grado</li>
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
                        <h3 class="card-title">Formulario grado</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/controllers/grados/editar_grados.php" method="POST">
                            <input type="text" name="id_grados" value="<?php echo $id_grados;?>" hidden>
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
                                                <option value="<?php echo $nivele['id_niveles'];?>"
                                                <?php 
                                                    if($nivel_grados == $nivele["nivel"] && $turno_grados == $nivele["turno"])
                                                    {
                                                ?> 
                                                        selected="selected"
                                                <?php } ?>
                                                >
                                                    <?php echo $nivele['nivel'].' - '.$nivele["turno"];?>
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
                                    <label for="">Curso:</label>
                                    <input type="text" name="curso" value="<?php echo $curso_grados;?>" class="form-control">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Paralelo:</label>
                                    <select name="paralelo" class="form-control">
                                        <option value="A"
                                            <?php 
                                                if($paralelo_grados == "A")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            A
                                        </option>
                                        <option value="B"
                                            <?php 
                                                if($paralelo_grados == "B")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            B
                                        </option>
                                        <option value="C"
                                            <?php 
                                                if($paralelo_grados == "C")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            C
                                        </option>
                                        <option value="D"
                                            <?php 
                                                if($paralelo_grados == "D")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            D
                                        </option>
                                        <option value="E"
                                            <?php 
                                                if($paralelo_grados == "E")
                                                {
                                            ?>
                                                    selected="selected"
                                            <?php        
                                                }
                                            ?>
                                        >
                                            E
                                        </option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Actualizar</button>
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