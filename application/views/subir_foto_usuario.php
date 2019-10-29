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

$usuario = $usuario->row();


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
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendors/cropperjs/cropper.min.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Usuario</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Subir fotos</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col s12 m3">
                            <div class="card upl_card">
                                <div class="card-image">
                                    <label class="" title="img_1">

                                        <?php
                                        if (file_exists('/home5/destino7/public_html/pv/crm/uploads/fotos_perfil/' . $usuario->id . '.jpg')) { ?>
                                            <img src="<?php echo base_url() . 'uploads/fotos_perfil/' . $usuario->id . '.jpg' ?>"
                                                 id="img_1_placeholder">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/1.jpg"
                                                 id="img_1_placeholder">
                                        <?php } ?>

                                        <input type="file" class="sr-only" id="input_img_1" name="input_img_1"
                                               accept="image/*">
                                    </label>
                                </div>
                                <div class="card-content">
                                    <div class="progress" id="progress_img_1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             id="progress_bar_img_1" role="progressbar"
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                        </div>
                                    </div>
                                    <div class="alert" role="alert" id="alert_img_1"></div>
                                </div>
                                <div class="card-action">
                                    subir imágen (toque la imágen)
                                </div>
                            </div>
                        </div>

                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>admin/actualizar_usuario"
                              method="post" novalidate>

                            <input type="hidden" value="<?php echo $usuario->id; ?>" name="user_id">


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url()?>admin/administrar_usuarios" class="btn btn-primary">Volver</a>
                                    <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                    <a id="send"  class="btn btn-success" href="<?php echo base_url()?>admin/administrar_usuarios">Guardar</a>
                                </div>
                            </div>
                        </form>
                        <div id="modal1" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" >Ajustar Imagen</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <a class="waves-effect waves-light btn" id="zoom_in_btn">
                                            <i class="fas fa-search-plus"></i>Acercar
                                        </a>
                                        <a class="waves-effect waves-light btn" id="zoom_off_btn">
                                            <i class="fas fa-search-minus"></i>Alejar
                                        </a>
                                        <a class="waves-effect waves-light btn" id="rotate_btn">
                                            <i class="fas fa-sync-alt"></i>Girar
                                        </a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-light btn"
                                           id="crop">
                                            Subir imagenes
                                        </a>

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
<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
<script src="<?php echo base_url() ?>/ui/vendors/cropperjs/cropper.min.js"></script>

<script>
    $(document).ready(function () {
    });


</script>
<script>

    var img_placeholder;
    var input_id;
    var imagen_number;
    var progress;
    var alert;


    function open_modal() {
    }
    function detectBrowser() {
        var N = navigator.appName;
        var UA = navigator.userAgent;
        var temp;
        var browserVersion = UA.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (browserVersion && (temp = UA.match(/version\/([\.\d]+)/i)) != null)
            browserVersion[2] = temp[1];
        browserVersion = browserVersion ? [browserVersion[1], browserVersion[2]] : [N, navigator.appVersion, '-?'];
        return browserVersion;
    };

    $(document).ready(function () {
        $(".iframe-container-bottom").remove();
        console.log('removido');
        detectBrowser();
        $(".progress").hide();
        $(".alert").hide();
    });
    window.addEventListener('DOMContentLoaded', function () {
        var img_1 = document.getElementById('img_1_placeholder');
        var input_1 = document.getElementById('input_img_1');
        var progress_img_1 = $('#progress_img_1');
        var progress_bar_img_1 = $('#progress_bar_img_1');
        var alert_img_1 = $('#alert_img_1');

        var avatar = document.getElementById('avatar');
        var image = document.getElementById('image');
        var input = document.getElementById('input');
        var $progress = $('.progress');
        var $progressBar = $('.progress-bar');
        var $alert = $('.alert');
        var modal = $('#modal1');
        var cropper;

        //herramientas zoom
        $("#zoom_in_btn").click(function () {
            cropper.zoom(0.1);
        });
        $("#zoom_off_btn").click(function () {
            cropper.zoom(-0.1);
        });
        $("#rotate_btn").click(function () {
            cropper.rotate(90);
        });

        $('[data-toggle="tooltip"]').tooltip();
        //img 1 event listener
        input_1.addEventListener('change', function (e) {
            img_placeholder = 'img_1_placeholder';
            imagen_number = 1;
            progress = progress_img_1;
            alert = alert_img_1;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                console.log(input_1.id);
                $('#modal1').modal('show', {
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        //alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 2,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function () {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            $('#modal1').on('show.bs.modal', function (e) {
                cropper = new Cropper(image, {
                    aspectRatio: '1',
                    viewMode: 2,
                    autoCropArea: 1,
                    dragMode: 'move',
                    minContainerHeight: '400',
                    minContainerWidth: '400',
                });
            });

            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 2 event listener

        //crop and upload
        document.getElementById('crop').addEventListener('click', function () {
            var initialAvatarURL;
            var canvas;
            //$modal.modal('close');
            $('#modal1').modal('hide');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 638,
                    height: 359,
                });
                console.log(img_placeholder);
                avatar = document.getElementById(img_placeholder);
                initialAvatarURL = avatar.src;
                avatar.src = canvas.toDataURL();

                $progress = progress;
                $progress.show();

                $alert = alert;
                $alert.removeClass('alert-success alert-warning');
                canvas.toBlob(function (blob) {
                    var formData = new FormData();
                    formData.append('imagen', blob);
                    formData.append('id_usuario', '<?php echo $usuario->id;  ?>');
                    formData.append('img_number', imagen_number);
                    //$.ajax('https://jsonplaceholder.typicode.com/posts', {
                    $.ajax('<?php echo base_url()?>admin/procesar_foto', {
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        xhr: function () {
                            var xhr = new XMLHttpRequest();
                            xhr.upload.onprogress = function (e) {
                                var percent = '0';
                                var percentage = '0%';
                                if (e.lengthComputable) {
                                    percent = Math.round((e.loaded / e.total) * 100);
                                    percentage = percent + '%';
                                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                                }
                            };
                            return xhr;
                        },
                        success: function (msg) {
                            console.log(msg);
                            $alert.show().addClass('alert-success').text('Upload success');
                        },
                        error: function () {
                            avatar.src = initialAvatarURL;
                            $alert.show().addClass('alert-warning').text('Upload error');
                        },
                        complete: function () {
                            $progress.hide();
                        },
                    });
                });
            }
        });
    });
</script>


<?php $this->stop() ?>



