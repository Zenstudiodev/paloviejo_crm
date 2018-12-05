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
//setlocale(LC_ALL, 'es_ES.UTF-8');
?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Ion.RangeSlider -->
<link href="<?php echo base_url(); ?>/ui/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/ui/vendors/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cotizdor</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        Seleccionar elementos
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <form name="cotizafor_form" id="cotizafor_form" method="post"
                              action="<?php echo base_url() ?>index.php/proceso/guardar_cotizacion">

                            <input type="text" name="items" id="items" data-role="tagsinput">
                            <input type="hidden" name="prospecto_id" value="<?php echo $segmento_p; ?>">
                            <input type="hidden" name="proceso_id" value="<?php echo $segmento_pr; ?>">
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<!-- Ion.RangeSlider -->
<script src="<?php echo base_url(); ?>/ui/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/vendors/typeahead/typeahead.bundle.min.js"></script>

<script>
    var cities = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nombre'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: 'https://crm.paloviejosa.com/cotizador/items_cotizador_json/'
    });
    var promise = cities.initialize();
    promise
        .done(function() { console.log('ready to go!'); })
        .fail(function() { console.log('err, something went wrong :('); });
    var elt = $("#items");
    console.log(cities);
    //console.log(cities.ttAdapter());
    elt.tagsinput({
        itemValue: 'nombre',
        itemText: 'nombre',
        typeaheadjs: {
            name: 'nombre',
            displayKey: 'nombre',
            source: cities
        }
    });
    $("#items").val();
</script>
<?php $this->stop() ?>