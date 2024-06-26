<?php
include("../../app/config.php");
include("../layout/menu.php");
include("../../controllers/niveles/ver_niveles.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos del nivel: <b><?php echo $nivel_nivel.' - '.$turno_nivel;?></b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo APP_URL ?>/vistas/">Inicio</a></li>
                        <li class="breadcrumb-item active">Datos del nivel</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gestión escolar:</label>
                                        <p><?php echo $gestion_nivel;?></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fecha de creación:</label>
                                        <p><?php echo $fyh_creacion_nivel;?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nivel:</label>
                                        <p><?php echo $nivel_nivel;?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fecha de actualización:</label>
                                        <p><?php echo $fyh_actualizacion_nivel;?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Turno:</label>
                                        <p><?php echo $turno_nivel;?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Estado:</label>
                                        <?php
                                            if($estado_nivel == 1)
                                            {
                                                echo '<p><span class="badge badge-success">ACTIVO</span></p>';
                                            }
                                            else
                                            {
                                                echo '<p><span class="badge badge-danger">INACTIVO</span></p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo APP_URL; ?>/vistas/niveles/" class="btn btn-secondary">Volver</a>
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
include("../layout/footer.php");
//include("../../layout/mensajes.php");
?>