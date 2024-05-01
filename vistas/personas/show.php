<?php
include("../../app/config.php");
include("../layout/menu.php");
include("../../controllers/personas/ver_personas.php")
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos de la persona: <b><?php echo $nombre_persona.' '.$apellido_persona;?></b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo APP_URL ?>/vistas/">Inicio</a></li>
                        <li class="breadcrumb-item active">Datos de la persona</li>
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
                            <h3 class="card-title">Información</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">DNI:</label>
                                        <p><?php echo $dni_persona;?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre:</label>
                                        <p><?php echo $nombre_persona;?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellido:</label>
                                        <p><?php echo $apellido_persona;?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dirección:</label>
                                        <p><?php echo $direccion_persona;?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <p><?php echo $celular_persona;?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <p><?php echo $f_nacimiento_persona;?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Profesión</label>
                                        <p><?php echo $profesion_persona;?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de creación:</label>
                                        <p><?php echo $fyh_creacion_persona;?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de actualización:</label>
                                        <p><?php echo $fyh_actualizacion_persona;?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col md 4">
                                    <div class="form-group">
                                        <label for="">Estado:</label>
                                        <?php
                                            if($estado_persona == 1)
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
                                    <a href="<?php echo APP_URL; ?>/vistas/personas/" class="btn btn-secondary">Volver</a>
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