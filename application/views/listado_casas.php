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
                <h3>Proyectos</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">

                <div class="x_panel">
                    <?php if ($casas){ ?>
                    <div class="x_title">
                        <h2><?php echo $title;?></h2>


                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if(puede_ver($rol, array('0','1','2','3'))){ ?>
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
                        <a class="btn btn-success" href="<?php echo base_url().'admin/crear_proyecto'?>">Crear proyecto</a>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lote</th>
                                <th>tipo</th>
                                <th>descripcion</th>
                                <th>estado</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($casas->result() as $casa) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $casa->casa_id; ?>
                                    </td>
                                    <td>
                                        <?php echo $casa->lote; ?>
                                    </td>
                                    <td>
                                        <?php echo $casa->proyecto_id; ?>
                                    </td>
                                    <td>
                                        <?php echo $casa->tipo_casa_id; ?>
                                    </td>
                                    <td>
                                        <?php echo $casa->estado; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url().'admin/editar_proyecto/'.$casa->casa_id; ?>"
                                           class="btn btn-info btn-xs"><i class="fa fa-file-text-o"></i> Editar </a>
                                        <a href="<?php echo base_url().'admin/desactivar_proyecto/'.$casa->casa_id; ?>"
                                           class="btn btn-success btn-xs"><i class="fa fa-file-text-o"></i> Reseervar </a>


                                    </td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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

    function init_DataTables() {

        console.log('run_datatables');

        if (typeof ($.fn.DataTable) === 'undefined') {
            return;
        }
        console.log('init_DataTables');

        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[1, 'asc']],
            'columnDefs': [
                {orderable: false, targets: [0]}
            ]
        });
        $datatable.on('draw.dt', function () {
            $('checkbox input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();

    };

    $(document).ready(function () {
        init_DataTables();
    });

</script>


<?php $this->stop() ?>




