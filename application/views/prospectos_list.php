<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//cargamos plantilla master y pasamos variables globales


$this->layout('master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
    'notificaciones' => $notificaciones,
    'notificaciones_s' =>$notificaciones_supervisor,
    'alertas' => $alertas,
    'alertas_s' => $alertas_supervisor
]);
setlocale(LC_ALL,"es_ES");
?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
      rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Prospectos</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">

                <div class="x_panel">
                    <?php if ($prospectos){ ?>
                    <div class="x_title">
                        <h2><?php echo $title;?></h2>


                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if(puede_ver($rol, array('0','1','2','3'))){;?>
                        <form class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" id="estado_select">
                                        <option>Seleccionar estado</option>
                                        <option>Activo</option>
                                        <option>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <?php }?>
                        <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <?php if(puede_ver($rol, array('0','1','2','3'))){ ?>
                                        <th>usuario</th>
                                    <?php }?>
                                    <th>Nombre</th>
                                    <th>Medio</th>
                                    <th>Creado</th>
                                    <th>Actualizado en</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <?php if(puede_ver($rol, array('0','1','2','3'))){ ?>
                                        <th>usuario</th>
                                    <?php }?>
                                    <th>Nombre</th>
                                    <th>Medio</th>
                                    <th>Creado</th>
                                    <th>Actualizado en</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php

                                foreach ($prospectos->result() as $prospecto) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $prospecto->id; ?>
                                        </td>
                                        <?php if(puede_ver($rol, array('0','1','2','3','4','5','6'))){ ?>
                                            <td>
                                                <?php echo id_to_nombre($prospecto->user_id); ?>
                                            </td>
                                        <?php }?>
                                        <td>
                                            <a href="prospectoDetalle/<?php echo $prospecto->id; ?>"><?php echo $prospecto->nombre1; ?></a>
                                        </td>
                                        <td><?php echo $prospecto->medio ?></td>
                                        <td>
                                            <?php
                                            $creado_en = new DateTime($prospecto->creado_en);
                                            echo $creado_en->format('d-m-Y H:i:s') ?>
                                        </td>
                                        <td>
                                            <?php

                                            $ActualizadoEn = new DateTime($prospecto->actualizado_en);
                                            echo $ActualizadoEn->format('d-m-Y') ?>
                                        </td>
                                        <td>
                                            <a href="prospectoDetalle/<?php echo $prospecto->id; ?>"
                                               class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                                            <a href="prospectoCita/<?php echo $prospecto->id; ?>"
                                               class="btn btn-info btn-xs"><i class="fa fa-calendar"></i> Cita </a>
                                            <a href="prospectoTarea/<?php echo $prospecto->id; ?>"
                                               class="btn btn-info btn-xs"><i class="fa fa-file-text-o"></i> Tarea </a>

                                            <?php
                                            // control de acciones
                                            if(puede_ver($rol, array('0','1','2','3'))){ ?>
                                                <a href="<?php echo base_url().'prospectos/prospectoEditar/'.$prospecto->id; ?>"
                                                   class="btn btn-warning btn-xs"><i class="fa fa-file-text-o"></i> Editar </a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>


                        <?php
                        } else {
                            echo 'Aun no hay prospectos';
                        } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/pdfmake/build/vfs_fonts.js"></script>

<script>

    /*ACTIVO O INACTIVO */
    var estado;
    $("#estado_select").change(function () {
        estado = $(this).val();
        switch(estado) {
            case 'Activo':
                window.location.replace('<?php echo base_url().'index.php/prospectos/prospectosList'?>');
                break;
            case 'Inactivo':
                window.location.replace('<?php echo base_url().'index.php/prospectos/prospectosInactivoList'?>');
                break;
            default:
                window.location.replace('<?php echo base_url().'index.php/prospectos/prospectosList'?>');
        }
    });

    /* DATA TABLES */



    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#datatable-responsive tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
        });

        // DataTable
        var table = $('#datatable-responsive').DataTable();

        // Apply the search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });

</script>


<?php $this->stop() ?>




