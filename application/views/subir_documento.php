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
//setlocale(LC_ALL, 'es_ES.UTF-8');
?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <!-- page content -->
    <div class="right_col" role="main">

        <?php

        $documento = array(
            'name' => 'documento',
            'type' => 'file',
            'accept' => 'image/*,application/pdf',
            'required' => 'required'
        );

        $tipoDocumento = array(
            'name' => 'tipo_documento',
            'class' => 'form-control col-md-7 col-xs-12',
            'required' => 'required'

        );
        $tipoDocumentoOptions = array(
            'plan de venta página 1' => 'Plan de venta página 1',
            'plan de venta página 2' => 'Plan de venta página 2',
            'plan de venta página 3' => 'Plan de venta página 3',
            'plan de venta página 4' => 'Plan de venta página 4',
            'plan de venta página 5' => 'Plan de venta página 5',
            'plan de venta página 6' => 'Plan de venta página 6',
            'plan de venta página 7' => 'Plan de venta página 7',
            'plan de venta página 8' => 'Plan de venta página 8',
            'DPI o Pasaporte' => 'DPI o Pasaporte',
            'NIT o RTU' => 'NIT o RTU'
        );

        $tipoActor = array(
            'name' => 'tipo_actor',
            'class' => 'form-control col-md-7 col-xs-12',
            'required' => 'required'

        );
        $tipoactorOptions = array(
            'Promitente comprador' => 'Promitente comprador',
            'Sucesor' => 'Sucesor',
            'Propietario' => 'Propietario',
            'Mandatario' => 'Mandatario',
            'Gestor de negocios' => 'Gestor de negocios',

        );


        ?>


        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Subir Documento </h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <?php if ($prospectos) {
                            foreach ($prospectos->result() as $prospecto) { ?>

                            <?php if ($procesos) {
                            foreach ($procesos->result() as $proceso) { ?>
                            <?php echo form_open_multipart('documentos/guardarDocumento','class="form-horizontal form-label-left"');?>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Documento
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo form_input($documento) ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Actor
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo form_dropdown($tipoActor, $tipoactorOptions) ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Documento
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo form_dropdown($tipoDocumento, $tipoDocumentoOptions) ?>
                                    </div>
                                </div>

                                <div class="ln_solid">
                                    <?php
                                    echo form_hidden('prospecto_id', $prospecto->id);
                                    echo form_hidden('proceso_id', $proceso->id);

                                    ?>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo base_url().'index.php/prospectos/prospectoDetalle/'.$prospecto->id?>" class="btn btn-danger">Cancelar</a>
                                        <!--<a class="btn btn-success"
                                           href="http://www.paloviejosa.com/crm/index.php/documentos/verDocumentos/1">Guardar</a>-->
                                        <input type="submit" class="btn btn-success" name="guardarDocumento" value="Guardar" >

                                    </div>
                                </div>
                        </div>
                        </form>

                        <?php
                        }
                        }
                        ?>


                        <?php
                        }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>





