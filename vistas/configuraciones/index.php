<?php
include("../../app/config.php");
include("../layout/menu.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Configuraciones del sistema</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo APP_URL ?>/vistas/">Inicio</a></li>
                        <li class="breadcrumb-item active">Configuraciones</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa-solid fa-school"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Datos de la Institución</b></span>
                            <a href="<?php echo APP_URL;?>/vistas/configuraciones/instituciones/show.php" class="btn btn-outline-info btn-sm">Más información <i class="fas fa-arrow-circle-right"></i></a>                           
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-calendar-days"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Gestión Escolar</b></span>
                            <a href="<?php echo APP_URL;?>/vistas/configuraciones/gestiones/" class="btn btn-outline-success btn-sm">Más información <i class="fas fa-arrow-circle-right"></i></a>
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