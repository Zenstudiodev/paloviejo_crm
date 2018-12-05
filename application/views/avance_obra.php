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

$proceso = $proceso->row();

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Ion.RangeSlider -->
<link href="<?php echo base_url() ?>ui/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="<?php echo base_url() ?>ui/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="<?php echo base_url() ?>ui/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Avance de obra</h3>
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
                        <?php if ($proceso) { ?>
                            <div class="x_panel" style="">
                                <div class="x_title">
                                    <h2>Porcentaje de avance de la obra</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row grid_slider">

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p></p>
                                            <input type="text" id="range_31" value="" name="range"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


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
<script src="<?php echo base_url() ?>ui/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<script>
    /* ION RANGE SLIDER */

    function init_IonRangeSlider() {

        if (typeof ($.fn.ionRangeSlider) === 'undefined') {
            return;
        }
        console.log('init_IonRangeSlider');
        var $range = $("#range_31");

        $range.ionRangeSlider({
            type: "single",
            min: 0,
            max: 100,
            from: 0,
            to: 100,
            grid: true
        });

        $range.on("change", function () {
            var $this = $(this),
                value = $this.prop("value");

            console.log("Value: " + value);
            if(value > 60){

                console.log('es mayor a 60');

                //llamar url para enviar notificación
                window.open("https://zenstudiogt.com/avance_obra.php", "_blank", "toolbar=no,scrollbars=no,resizable=yes,top=5,left=5,width=4,height=4");


                /*var xhttp = new XMLHttpRequest();

                xhttp.open("GET", "https://zenstudiogt.com/avance_obra.php", true);
                xhttp.send();*/



//                var jqxhr = $.ajax( "https://zenstudiogt.com/avance_obra.php" )
//                    .done(function(data) {
//                        console.log( data );
//                    })
//                    .fail(function() {
//                        alert( "error" );
//                    })
//                    .always(function() {
//                       // alert( "complete" );
//                    });

            }
        });

    };

    $(document).ready(function () {
        init_IonRangeSlider();
    });
</script>

<?php $this->stop() ?>





