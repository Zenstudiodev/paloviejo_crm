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
    'notificaciones_s' => $notificaciones_supervisor,
    'alertas' => $alertas,
    'alertas_s' => $alertas_supervisor

]);

?>


<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">

    <?php

    if ($prospectos) {
        foreach ($prospectos->result() as $prospecto) {
            ?>


            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> <?php echo $prospecto->nombre1 ?></h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">


                            <div class="x_content">

                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <?php

                                    if ($procesos) {
                                        echo '<h4>Procesos</h4>';
                                        foreach ($procesos->result() as $proceso) {
                                            ?>

                                            <table class="table table-striped table-responsive projects">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Lote</th>
                                                    <th>Proyecto</th>
                                                    <th>
                                                        <div class="pull-right">Etapa</div>
                                                    </th>
                                                    <th>Accion</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td><?php echo $proceso->id ?></td>

                                                    <td>
                                                        <?php echo $proceso->casa ?>
                                                    </td>
                                                    <td style="width: 20%">
                                                        <?php echo $proceso->nombre_proyecto ?>
                                                    </td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <button type="button" class="btn btn-success btn-xs <?php
                                                            //TODO get etapa class
                                                            //echo $this->Proceso_model->etapaProsceso($proceso->id);
                                                            ?>"><?php echo $proceso->etapa ?></button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="btn-group">
                                                                <button data-toggle="dropdown"
                                                                        class="btn btn-primary dropdown-toggle btn-xs"
                                                                        type="button" aria-expanded="false">
                                                                    Documentos<span class="caret"></span>
                                                                </button>
                                                                <ul role="menu" class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>documentos/subirDocumento/<?php echo $prospecto->id . '/' . $proceso->id; ?>">
                                                                            <i class="fa fa-pencil"></i>Subir Documentos</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>documentos/verDocumentos/<?php echo $prospecto->id . '/' . $proceso->id; ?>"><i
                                                                                    class="fa fa-folder "></i>
                                                                            ver documentos</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <a href="<?php echo base_url(); ?>documentos/subirPlano/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                               class="btn btn-primary btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                                Subir plano o cotización
                                                            </a>
                                                            <button type="button" class="btn btn-primary btn-xs"
                                                                    data-toggle="modal"
                                                                    data-target="#modal_proceso_<?php echo $proceso->id ?>">
                                                                <i class="fa fa-pencil"></i> Llenar formulario Master
                                                            </button>
                                                        </div>
                                                        <div class="row">
                                                            <div class="btn-group">
                                                                <button data-toggle="dropdown"
                                                                        class="btn btn-primary dropdown-toggle btn-xs"
                                                                        type="button" aria-expanded="false">Formulario
                                                                    Ive <span class="caret"></span>
                                                                </button>
                                                                <ul role="menu" class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>formulario/llenar_ive/<?php echo $prospecto->id . '/' . $proceso->id; ?>">
                                                                            <i class="fa fa-pencil"></i> Llenar Ive</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>formulario/imprimir_ive/<?php echo $prospecto->id . '/' . $proceso->id; ?>"><i
                                                                                    class="fa fa-print"></i> imprimir
                                                                            ive</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button data-toggle="dropdown"
                                                                        class="btn btn-primary dropdown-toggle btn-xs"
                                                                        type="button" aria-expanded="false">Formulario
                                                                    SIB <span class="caret"></span>
                                                                </button>
                                                                <ul role="menu" class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>formulario/llenar_sib/<?php echo $prospecto->id . '/' . $proceso->id; ?>">
                                                                            <i class="fa fa-pencil"></i> Llenar SIB
                                                                            1</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>formulario/imprimir_sib/<?php echo $prospecto->id . '/' . $proceso->id; ?>"><i
                                                                                    class="fa fa-print"></i> imprimir
                                                                            SIB 1</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>formulario/llenar_sib2/<?php echo $prospecto->id . '/' . $proceso->id; ?>">
                                                                            <i class="fa fa-pencil"></i> Llenar SIB
                                                                            2</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>formulario/imprimir_sib2/<?php echo $prospecto->id . '/' . $proceso->id; ?>"><i
                                                                                    class="fa fa-print"></i> imprimir
                                                                            SIB 2</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="btn-group">
                                                                <button data-toggle="dropdown"
                                                                        class="btn btn-primary dropdown-toggle btn-xs"
                                                                        type="button" aria-expanded="false">Cotizaciones<span class="caret"></span>
                                                                </button>
                                                                <ul role="menu" class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>proceso/cotizador/<?php echo $prospecto->id . '/' . $proceso->id; ?>">
                                                                            <i class="fa fa-pencil"></i> Cotizador</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>proceso/ver_cotizaciones_proceso/<?php echo $prospecto->id . '/' . $proceso->id; ?>"><i
                                                                                    class="fa fa-print"></i> Cotizaciones</a>
                                                                    </li>
                                                                </ul>
                                                            </div>


                                                            <a href="<?php echo base_url(); ?>proceso/avance_obra/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                               class="btn btn-info btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                                Avance de obra
                                                            </a>
                                                            <a href="<?php echo base_url(); ?>proceso/hoja_de_acabados/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                               class="btn btn-warning btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                                Hoja de acabados
                                                            </a>
                                                            <a href="<?php echo base_url(); ?>proceso/lista_revision/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                               class="btn btn-info btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                                Hoja de entrega
                                                            </a>
                                                            <div class="btn-group">
                                                                <button data-toggle="dropdown"
                                                                        class="btn btn-primary dropdown-toggle btn-xs"
                                                                        type="button" aria-expanded="false">Reclamos y garantias<span class="caret"></span>
                                                                </button>
                                                                <ul role="menu" class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>Reclamos/crear_reclamo/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                           class="btn btn-info btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                            Crear Reclamo
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url(); ?>Reclamos/revisar_reclamo/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                           class="btn btn-info btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                            Revisar Reclamo
                                                                        </a>
                                                                        <a href="<?php echo base_url(); ?>Reclamos/historial_reclamo/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                           class="btn btn-info btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                            Historial de Reclamos
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Tipo de casa</td>
                                                    <td colspan="6"><?php echo $proceso->nombre_casa ?> </td>
                                                </tr>
                                                </tbody>
                                            </table>


                                            <div id="modal_proceso_<?php echo $proceso->id ?>"
                                                 class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">Formulario
                                                                master</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Seleccione la sección que desea llenar</h4>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url(); ?>formulario/master_1/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                        DATOS GENERALES

                                                                    </a>
                                                                    <?php if(lleno_master_1($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/master_2/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                        DETALLES DE LA PROPIEDAD

                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_2($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/master_3/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                        FORMA DE PAGO

                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_3($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/master_4/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                        SI INCLUYE
                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_4($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/master_5/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                        NO INCLUYE
                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_5($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/master_6/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                        DATOS DE REGISTRO
                                                                    </a>
                                                                    <?php }?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <?php if(lleno_master_1($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/imprimir_master_1/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-success btn-xs" target="_blank">
                                                                        <i class="fa fa-print"></i>
                                                                        DATOS GENERALES

                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_2($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/imprimir_master_2/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-success btn-xs" target="_blank">
                                                                        <i class="fa fa-print"></i>
                                                                        DETALLES DE LA PROPIEDAD

                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_3($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/imprimir_master_3/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-success btn-xs" target="_blank">
                                                                        <i class="fa fa-print"></i>
                                                                        FORMA DE PAGO

                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_4($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/imprimir_master_4/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-success btn-xs" target="_blank">
                                                                        <i class="fa fa-print"></i>
                                                                        SI INCLUYE
                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_5($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/imprimir_master_5/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-success btn-xs" target="_blank">
                                                                        <i class="fa fa-print"></i>
                                                                        NO INCLUYE
                                                                    </a>
                                                                    <?php }?>
                                                                    <?php if(lleno_master_6($proceso->id)){?>
                                                                    <a href="<?php echo base_url(); ?>formulario/imprimir_master_6/<?php echo $prospecto->id . '/' . $proceso->id; ?>"
                                                                       class="btn btn-success btn-xs" target="_blank">
                                                                        <i class="fa fa-print"></i>
                                                                        DATOS DE REGISTRO
                                                                    </a>
                                                                    <?php }?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cerrar
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php }
                                    } else {
                                        echo '<h4>Aún no ha iniciado un proceso</h4>';
                                    }

                                    ?>

                                    <h4>Citas</h4>
                                    <!-- end of user messages -->
                                    <ul class="messages">
                                        <?php
                                        if ($citas) {
                                            foreach ($citas->result() as $cita) {
                                                ?>
                                                <li>
                                                    <div class="message_date">
                                                        <h3 class="date text-info"><?php
                                                            $date = date_create($cita->fecha);
                                                            echo date_format($date, 'd');

                                                            ?></h3>
                                                        <p class="month">
                                                            <?php echo date_format($date, 'M'); ?>
                                                            <?php echo date_format($date, 'g A'); ?>
                                                        </p>

                                                    </div>
                                                    <div class="message_wrapper">
                                                        <h4 class="heading"><?php echo $cita->tipo_cita ?></h4>
                                                        <blockquote class="message">
                                                            <?php echo $cita->observaciones; ?>



                                                            <?php if ($resultado_citas) { ?>
                                                                <div class="content ">

                                                                    <?php foreach ($resultado_citas->result() as $resultado) {
                                                                        ?>
                                                                        <?php if ($resultado->cita_id == $cita->id) { ?>

                                                                            <p>
                                                                                <b>resultado:</b>
                                                                                | <?php echo $resultado->resultado ?>
                                                                            </p>

                                                                        <?php } ?>


                                                                    <?php } ?>


                                                                </div>
                                                                <?php
                                                            } ?>


                                                            <p>
                                                                <?if($cita->tipo_cita =='Cierre'){
                                                                    if(puede_ver($rol, array('0','1','2','3','4','5','6'))){?>
                                                                        <a href="<?php echo base_url() . 'citas/ResultadoCita/' . $prospecto->id . '/' . $cita->id; ?>"
                                                                   class="btn  btn-success">Resultado de
                                                                    reunión</a>
                                                                 <?php   } ?>

                                                                <?php }else{?>
                                                                <a href="<?php echo base_url() . 'citas/ResultadoCita/' . $prospecto->id . '/' . $cita->id; ?>"
                                                                   class="btn  btn-success">Resultado de
                                                                    reunión</a></p>
                                                                    <?php }?>
                                                    </div>
                                                </li>
                                            <?php }
                                        } else {
                                            echo '<p>Aún No hay citas programadas</p>';
                                        } ?>
                                    </ul>
                                    <!-- end of user messages -->

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Tareas
                                                </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">

                                                <div class="">
                                                    <ul class="to_do">
                                                        <?php
                                                        if ($tareas) {
                                                            foreach ($tareas->result() as $tarea) {
                                                                ?>
                                                                <li>
                                                                    <p>
                                                                        <?php
                                                                        $date = date_create($tarea->fecha);
                                                                        echo $tarea->tarea . ' | ' . date_format($date, 'd/n ') . ' | ' . date_format($date, 'g A') . ' | ' . $tarea->observaciones;
                                                                        ?>
                                                                        <a href="<?php echo base_url() . 'tareas/ResultadoTarea/' . $prospecto->id . '/' . $tarea->id; ?>"
                                                                           class="btn  btn-success btn-xs pull-right tarea">Resultado
                                                                            de tarea</a>
                                                                    </p>

                                                                    <?php if ($resultado_tareas) { ?>
                                                                        <div class="content ">

                                                                            <?php foreach ($resultado_tareas->result() as $resultado) {
                                                                                ?>
                                                                                <?php if ($resultado->tarea_id == $tarea->id) { ?>

                                                                                    <p>
                                                                                        <b>resultado:</b>
                                                                                        | <?php echo $resultado->resultado ?>
                                                                                    </p>

                                                                                <?php } ?>


                                                                            <?php } ?>


                                                                        </div>
                                                                        <?php
                                                                    } ?>
                                                                </li>
                                                            <?php }// end loop
                                                        }// end if isset
                                                        else { ?>
                                                            <p>Aún no tiene tareas</p>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- start project-detail sidebar -->
                                <div class="col-md-3 col-sm-3 col-xs-12">

                                    <section class="panel">

                                        <div class="x_title">
                                            <h2>Detalles de Propecto</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <h3 class="green"><i
                                                        class="fa fa-user"></i> <?php echo $prospecto->nombre1 ?>
                                            </h3>
                                            <a href="<?php echo base_url() . 'prospectos/prospectoEditar/' . $prospecto->id ?>"
                                               class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"> </i> Editar prospecto
                                            </a>


                                            <div class="project_detail">

                                                <ul class="list-unstyled user_data">
                                                    <li><i class="fa fa-map-marker user-profile-icon"></i>
                                                        <?php echo $prospecto->nombre1 ?>
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-briefcase user-profile-icon"></i>
                                                        <?php echo $prospecto->celular1 ?>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-briefcase user-profile-icon"></i>
                                                        <?php echo $prospecto->email1 ?>
                                                    </li>

                                                </ul>
                                                <ul class="list-unstyled user_data">
                                                    <li><i class="fa fa-map-marker user-profile-icon"></i>
                                                        <?php echo $prospecto->nombre2 ?>
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-briefcase user-profile-icon"></i>
                                                        <?php echo $prospecto->celular2 ?>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-briefcase user-profile-icon"></i>
                                                        <?php echo $prospecto->email2 ?>
                                                    </li>

                                                </ul>
                                            </div>


                                            <div class=" mtop20">
                                                <!--
<a href="#" class="btn btn-sm btn-primary">Ver Documento</a>
<a href="#" class="btn btn-sm btn-primary">Crear Documentos</a>-->
                                                <a href=<?php echo base_url()?>proceso/crearProceso/<?php echo $prospecto->id; ?>"
                                                   class="btn btn-sm btn-primary">crear proceso</a>

                                                <a href="<?php echo base_url()?>prospectos/prospectoCita/<?php echo $prospecto->id; ?>"
                                                   class="btn btn-sm btn-primary">Agendar cita</a>
                                                <a href="<?php echo base_url()?>prospectos/prospectoTarea/<?php echo $prospecto->id; ?>"
                                                   class="btn btn-sm btn-primary">Agregar Tarea</a>
                                            </div>
                                        </div>

                                    </section>

                                </div>
                                <!-- end project-detail sidebar -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo 'no existe ese prospecto';
    } ?>
</div>
<!-- /page content -->
<?php $this->stop() ?>


<script>
    $(document).ready(function () {
        $(".to_do li:first-child").addClass('tarea_activa');
    });
</script>







