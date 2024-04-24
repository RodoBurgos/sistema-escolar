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
                    <h1 class="m-0">Datos de la Institución</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo APP_URL ?>/vistas/">Inicio</a></li>
                        <li class="breadcrumb-item active">Datos de la Institución</li>
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
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Información de la Institución</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Institución:</label>
                                                        <p><?php echo $nombre_instituciones;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <p><?php echo $email_instituciones;?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Dirección:</label>
                                                        <p><?php echo $direccion_instituciones;?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Teléfono:</label>
                                                        <p><?php echo $telefono_instituciones;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Celular:</label>
                                                        <p><?php echo $celular_instituciones;?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Imagen de la Institución:</label>
                                                <br>
                                                <img src="<?php echo APP_URL . '/public/img/logos/'.$logo_instituciones;?>" width="100%" height="300px">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <a href="edit.php?id=<?php echo $id_instituciones;?>" class="btn btn-outline-success">Actualizar datos</a>
                                                <a href="<?php echo APP_URL ?>/vistas/configuraciones/" class="btn btn-secondary">Volver</a>
                                            </div>
                                        </div>
                                    </div>
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