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
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Proceso </h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php
                foreach ($prospectos->result() as $prospecto) {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Crear proceso para: <?php echo $prospecto->nombre1 ?></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <form class="form-horizontal form-label-left"
                                          action="<?php echo base_url()?>proceso/guardarProceso"
                                          method="post" id="procesoCreateForm">
                                        <?php
                                        $casa = array(
                                            'name' => 'casa',
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'required' => 'required',
                                            'id' => 'casa'

                                        );
                                        $casaOptions = array(
                                            '' => ''
                                        );
                                        $proyecto_select = array(
                                            'name' => 'proyecto',
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'required' => 'required',
                                            'id' => 'proyecto'

                                        );
                                        $proyectoOptions = array(
                                        );
                                        foreach ($proyectos->result() as $proyecto) {
                                            $proyectoOptions[$proyecto->proyecto_id] = $proyecto->nombre_proyecto;
                                        }
                                        $tipo_casa = array(
                                            'name' => 'tipo_casa',
                                            'id' =>'tipo_casa',
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'required' => 'required'

                                        );
                                        $tipo_casa_Options = array(
                                            ''=>''
                                        );
                                        ?>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Proyecto<span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo form_dropdown($proyecto_select, $proyectoOptions, ''); ?>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Lote<span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo form_dropdown($casa, $casaOptions); ?>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Tipo de casa<span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo form_dropdown($tipo_casa, $tipo_casa_Options, ''); ?>
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <?php
                                            echo form_hidden('prospecto_id', $prospecto->id);
                                            $codigo = $prospecto->id . '-' . $prospecto->nombre1;
                                            echo form_hidden('codigo', $codigo);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a class="btn btn-danger" href="<?php echo base_url().'index.php/prospectos/prospectoDetalle/'.$prospecto->id ; ?>">Cancelar</a>
                                                <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<script>
    var proyecto;
    $(document).ready(function () {
        $("#proyecto").change(function () {
           //Leemos id de proyecto seleccionado y hacemos consulta ajax para popular el select de casas
            proyecto = $("#proyecto").val();
            //limpiamos el select
            $("#casa").html('');
            $("#tipo_casa").html('');
            //hacemos llamada a app2.0 para obtener un listado de tipos de casa
            $.getJSON("<?php echo base_url();?>casas/casa_de_proyecto?proyecto=" + proyecto, function (obj) {
                //print de objeto json proviniente de app 2.0
                //console.log(obj);
                $.each(obj, function (key, value) {
                    //estructura para llamado de propiedades de objeto json proviniente de app2.0
                     console.log(obj);
                    $("#casa").append("<option value='"+obj[key].casa_id+"'>" +"# " +obj[key].lote +"-"+obj[key].estado+"</option>");
                });
            });
            // cargar los tipos de casa
            $.getJSON("<?php echo base_url();?>casas/tipo_de_casa_de_proyecto?proyecto=" + proyecto, function (obj) {
                //print de objeto json proviniente de app 2.0
                //console.log(obj);
                $.each(obj, function (key, value) {
                    //estructura para llamado de propiedades de objeto json proviniente de app2.0
                    //console.log(obj[key].id);
                    $("#tipo_casa").append("<option value='"+obj[key].tipo_casa_id+"'>" +"# " + obj[key].nombre_casa + "</option>");
                });
            });


        });
    });
</script>

<?php $this->stop() ?>






