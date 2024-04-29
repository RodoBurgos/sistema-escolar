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
            <h1 class="m-0">Listado de niveles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo APP_URL?>/vistas/">Inicio</a></li>
              <li class="breadcrumb-item active">Listado de niveles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Niveles registrados</h3>
                        <div class="card-tools">
                          <a href="create.php" class="btn btn-primary" title="Nuevo nivel"><i class="fas fa-plus"></i> Crear nuevo nivel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabla-niveles" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nº</th>
                                    <th>Gestión escolar</th>
                                    <th>Nivel</th>
                                    <th>Turno</th>
                                    <th>Fecha Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $contador = 0;
                                    foreach ($niveles as $nivel)
                                    {
                                      $id_niveles = $nivel['id_niveles'];
                                      $contador++;
                                ?>
                                        <tr>
                                            <td><?php echo $contador;?></td>
                                            <td><?php echo $nivel["gestion"];?></td>
                                            <td><?php echo $nivel["nivel"];?></td>
                                            <td><?php echo $nivel["turno"];?></td>
                                            <td class="text-center"><?php echo $nivel["fyh_creacion"];?></td>
                                            <td class="text-center">
                                                <!-- <form action="<?php echo APP_URL;?>/controllers/niveles/eliminar_niveles.php" method="POST" class="formulario-eliminar"> -->
                                                  <a href="show.php?id=<?php echo $id_niveles;?>" class="btn btn-outline-info btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                                                  <a href="edit.php?id=<?php echo $id_niveles;?>" class="btn btn-outline-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                                                  <!-- <input type="text" value="<?php //echo $id_niveles;?>" name="id_niveles" hidden>
                                                  <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                </form> -->
                                            </td>
                                        </tr>
                                <?php        
                                    }
                                ?>
                            </tbody>
                        </table>
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

<script>
  $(document).ready(function()
  {
    //Datatables niveles
    $('#tabla-niveles').DataTable(
    {
      "pageLength": 10,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "language": {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ de _END_ de _TOTAL_ registros.",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
            }
        },
      "buttons": [
            {
                extend: 'copy',
                text: '<button class="btn btn-secondary" title="Copiar"><i class="fas fa-copy"></i></button>',
            },
            {
                extend: 'excel',
                text: '<button class="btn btn-success" title="Excel"><i class="fas fa-file-excel"></i></button>',
            },
            {
                extend: 'pdf',
                text: '<button class="btn btn-danger" title="PDF"><i class="fas fa-file-pdf"></i></button>',
            },
            {
                extend: 'print',
                text: '<button class="btn btn-secondary" title="Imprimir"><i class="fas fa-print"></i></button>',
            }
        ]
    }).buttons().container().appendTo('#tabla-niveles_wrapper .col-md-6:eq(0)');

    //Eliminar rol
    $('.formulario-eliminar').submit(function(e)
    {
      e.preventDefault();

      Swal.fire({
          title: '¿Estás seguro de eliminar éste nivel?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '¡Sí, eliminar!',
          cancelButtonText:'Cancelar'
          }).then((result) => {
          if (result.isConfirmed)
          {
              this.submit();
          }
      });
    });

  });
</script>