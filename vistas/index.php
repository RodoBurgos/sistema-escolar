<?php
include("../app/config.php");
include("layout/menu.php");

include("../controllers/roles/listado_roles.php");
include("../controllers/usuarios/listado_usuarios.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo APP_NAME;?></h1>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">

          <div class="small-box bg-info">
            <div class="inner">
              <?php
                $contador_roles = 0;
                foreach ($roles as $role)
                {
                  $contador_roles++;
                }
              ?>
              <h3><?php echo $contador_roles;?></h3>
              <p>Roles registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-bookmark"></i>
            </div>
            <a href="<?php echo APP_URL;?>/vistas/roles/" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-success">
            <div class="inner">
              <?php
                $contador_usuarios = 0;
                foreach ($usuarios as $usuario)
                {
                  $contador_usuarios++;
                }
              ?>
              <h3><?php echo $contador_usuarios;?></h3>
              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="<?php echo APP_URL;?>/vistas/usuarios/" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">

          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("layout/footer.php");
include("../layout/mensajes.php");
?>